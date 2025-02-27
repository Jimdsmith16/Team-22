<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Order;
use App\Models\Basket;
use Carbon\Carbon;

class OrderController extends Controller
{
    //Shows all previous order for the logged in user.
    public function getPreviousOrderInfo()
    {
        $userId = auth()->id();
        $orders = Order::with('products')->where('user_id', $userId)->get();

        $totalPrice = $orders->flatMap->products->sum(fn($product) => $product->pivot->quantity * $product->price);
        $totalOrders = $orders->count();

        return view('previousOrders', compact('orders', 'totalPrice', 'totalOrders'));
    }

    //Process order after checkout form is submitted.
    public function processCheckout(Request $request)
    {
        $request->validate([
            'customer_name' => 'required|string',
            'address_line1' => 'required|string',
            'address_line2' => 'nullable|string',
            'postcode' => 'required|string',
            'country' => 'required|string',
        ]);
    
        $basket = Basket::where('user_id', auth()->id())->first();
        $products = $basket->products()->withPivot('quantity')->get();
        $totalPrice = $products->sum(fn($product) => $product->price * $product->pivot->quantity);
    
        //Store the order outside of the transaction
        $order = DB::transaction(function () use ($request, $basket, $products, $totalPrice) {
            //Insert the address into the addresses table.
            $addressId = DB::table('addresses')->insertGetId([
                'address_line1' => $request->address_line1,
                'address_line2' => $request->address_line2,
                'postcode' => $request->postcode,
                'country' => $request->country,
            ]);
    
            //Create the order and associate the address with it.
            $order = Order::create([
                'user_id' => auth()->id(),
                'address_id' => $addressId,
                'estimated_delivery_date' => Carbon::now()->addDays(5),
            ]);
    
            //Attach products to the order with quantity and price.
            foreach ($products as $product) {
                $order->products()->attach($product->id, [
                    'quantity' => $product->pivot->quantity,
                    'price' => $product->price,
                ]);
            }
    
            //Clear the basket after placing the order.
            $basket->products()->detach();
    
            //Return order from the transaction
            return $order;
        });

        //Store total price and order in current session
        session(['total_price' => $totalPrice]);
        session(['order_id' => $order->id]);
    
        return redirect()->route('payment.page');
    }


    public function orderConfirmation($orderId)
    {
        $order = Order::with('products')->findOrFail($orderId);

        return view('GVOrderConfirmation', compact('order'));
    }

    public function showPaymentPage()
    {
        $totalPrice = session('total_price');

        return view('payment', compact('totalPrice'));
    }

    public function processPayment(Request $request)
    {
        $orderId = session('order_id');

        return redirect()->route('order.confirmation', ['order' => $orderId]);
    }
}

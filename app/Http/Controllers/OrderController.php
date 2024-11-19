<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Order;

class OrderController extends Controller
{
    public function show($id) {
        $order = Order::find($id);
        return view("previousOrders", array("order" => $order));
    }

    public function list() {
        return view("previousOrders", array("orders" => Order::all()));
    }
  
     public function addOrder(Request $request) {
        Order::create($request->all());
        return response()->json(['message' => 'Order added successfully.']);
     }

     public function getPreviousOrderInfo($userid) {
        $orders = DB::table("orders")->join("products_in_order", "orders.id", "=", "products_in_order.order_id")->join("products", "products.id", "=", "products_in_order.product_id")->select("products.*", "orders.estimated_delivery_date")->where("orders.user_id", "=", $userid)->get();
        $totalPrice = $orders->sum("price");
        $totalOrders = $orders->count();
        $mergedOrders = $orders->merge(["total_price" => $totalPrice, "total_orders" => $totalOrders]);
        return view("previousOrders", array("orders" => $orders));
     }
}

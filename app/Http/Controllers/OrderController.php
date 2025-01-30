<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Order;

class OrderController extends Controller
{
   //Shows the order linked to the given ID.
    public function show($id) {
      $order = Order::find($id);
      return view("previousOrders", array("order" => $order));
   }

   //Shows all orders.
   public function list() {
      return view("previousOrders", array("orders" => Order::all()));
   }
  
   //Adds a new order to the database.
   public function addOrder(Request $request) {
      Order::create($request->all());
      return response()->json(['message' => 'Order added successfully.']);
   }

   //Gets the previous orders linked to the given User ID.
   public function getPreviousOrderInfo($userid) {
      //Joins the orders, products and products_in_order table to gather all the relevant data.
      $orders = DB::table("orders")->join("products_in_order", "orders.id", "=", "products_in_order.order_id")->join("products", "products.id", "=", "products_in_order.product_id")->select("products.*", "orders.estimated_delivery_date")->where("orders.user_id", "=", $userid)->get();
      //Sums the total price and gets the total number of orders.
      $totalPrice = $orders->sum("price");
      $totalOrders = $orders->count();
      return view("previousOrders", ["orders" => $orders, "total_orders" => $totalOrders, "total_price" => $totalPrice]);
   }

   //Updates the order corresponding to the given ID.
   public function updateOrder($id, Request $request){
      //Get the relevant order from the database.
      $order=Order::find($id);
      //Updates the relevant columns in the database.
      $order->estimated_delivery_date = $request->input('estimated_delivery_date', $order->estimated_delivery_date); 
      $order->shipping_address = $request->input('shipping_address', $order->shipping_address);
      //Commits changes.
      $order->save(); 
      return response()->json(['message' => 'Order updated successfully.']);
   }
}

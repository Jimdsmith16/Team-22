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
}

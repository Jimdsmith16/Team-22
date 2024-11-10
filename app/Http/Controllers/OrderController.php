<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Order;

class OrderController extends Controller
{
    public function show($id) {
        $project = Order::find($id);
        return view("previousOrders", array("order" => $order));
    }

    public function list() {
        return view("previousOrders", array("orders" => Order::all()));
    }
}

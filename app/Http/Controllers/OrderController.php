<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Order;

class OrderController extends Controller
{
    public function show($id) {
        $project = Order::find($id);
        return view("/show", array("order" => $order));
    }

    public function list() {
        return view("/list", array("orders" => Order::all()));
    }
}

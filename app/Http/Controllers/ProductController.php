<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;

class ProductController extends Controller
{
    public function show($id) {
        $project = Product::find($id);
        return view("ProductDisplayPage", array("product" => $product));
    }

    public function list() {
        return view("ProductDisplayPage", array("products" => Product::all()));
    }
}

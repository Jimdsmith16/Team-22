<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;

class ProductController extends Controller
{
    public function show($id) {
        $product = Product::find($id);
        return view("ProductDisplayPage", array("product" => $product));
    }

    public function list() {
        return view("ProductDisplayPage", array("products" => Product::all()));
    }

    public function findByName($name) {
        $products = DB::table("products")->where("name", "like", "%" . $name. "%")->distinct()->get();
        return view("ProductDisplayPage", array("products" => $products));
    }

    public function findByCategory($category) {
        $categoryID = DB::table("categories")->where("name", "=", $category)->value("id");
        $products = DB::table("products")->where("category_id", "=", $categoryID)->distinct()->get();
        return view("ProductDisplayPage", array("products" => $products));
    }
}

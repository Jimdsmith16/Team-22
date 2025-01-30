<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;

class ProductController extends Controller
{
    //Shows the product corresponding to the given ID.
    public function show($id) {
        $product = Product::find($id);
        return view("SingleProduct", array("product" => $product));
    }

    //Shows all products.
    public function list() {
        return view("ProductDisplayPage", array("products" => Product::all()));
    }

    //Finds all unique products with names similar to the given name.
    public function findByName($name) {
        $products = DB::table("products")->where("name", "like", "%" . $name. "%")->distinct()->get();
        return view("ProductDisplayPage", array("products" => $products));
    }

    //Finds all unique products under the given category.
    public function findByCategory($category) {
        $categoryID = DB::table("categories")->where("name", "=", $category)->value("id");
        $products = DB::table("products")->where("category_id", "=", $categoryID)->distinct()->get();
        return view("ProductDisplayPage", array("products" => $products));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    // Shows all products along with categories for dropdown menu.
    public function list() {
        $products = Product::all();
        $categories = Category::all();
        return view("ProductDisplayPage", compact("products", "categories"));
    }

    // Finds all unique products with names similar to the given name.
    public function findByName($name) {
        $products = DB::table("products")->where("name", "like", "%" . $name . "%")->distinct()->get();
        $categories = Category::all();
        return view("ProductDisplayPage", compact("products", "categories"));
    }

    // Finds all unique products under the given category.
    public function findByCategory(Request $request) {
        $category = $request->input('category');

        if ($category) {
            $categoryID = DB::table("categories")->where("name", "=", $category)->value("id");
            $products = DB::table("products")->where("category_id", "=", $categoryID)->distinct()->get();
        } else {
            $products = Product::all(); // If no category is selected, show all products.
        }

        $categories = Category::all();
        return view("ProductDisplayPage", compact("products", "categories"));
    }
}

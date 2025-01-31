<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    // Shows the product corresponding to the given ID.
    public function show($id) {
        $product = Product::find($id);
        return view("SingleProduct", compact("product"));
    }

    // Shows all products along with categories for dropdown menu.
    public function list() {
        $products = Product::all();
        $categories = Category::all();
        return view("ProductDisplayPage", compact("products", "categories"));
    }

    // Finds all unique products with names similar to the given name.
    public function findByName($name) {
        $products = Product::where("name", "like", "%" . $name . "%")->distinct()->get();
        $categories = Category::all();
        return view("ProductDisplayPage", compact("products", "categories"));
    }

    // Finds all unique products under the given category.
    public function findByCategory($category) {
        $categoryID = Category::where("name", $category)->value("id");

        if ($categoryID) {
            $products = Product::where("category_id", $categoryID)->distinct()->get();
        } else {
            $products = Product::all(); // If category doesn't exist, show all products.
        }

        $categories = Category::all();
        return view("ProductDisplayPage", compact("products", "categories"));
    }
}

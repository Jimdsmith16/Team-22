<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    // Shows the product corresponding to the given ID.
    public function show($id)
    {
        $product = Product::find($id);
        return view("SingleProduct", compact("product"));
    }

    // Shows all products along with categories for dropdown menu.
    public function list()
    {
        $products = Product::all();
        $categories = Category::all();
        return view("ProductDisplayPage", compact("products", "categories"));
    }

    // Finds all unique products with names similar to the given name.
    public function findByName($name)
    {
        $products = Product::where("name", "like", "%" . $name . "%")->distinct()->get();
        $categories = Category::all();
        return view("ProductDisplayPage", compact("products", "categories"));
    }

    // Finds all unique products under the given category.
    public function filterByCategory(Request $request)
    {
        $categoryId = $request->input('category');
        $products = $categoryId
            ? Product::where('category_id', $categoryId)->get()
            : Product::all();
        $categories = Category::all();
        return view('ProductDisplayPage', compact('products', 'categories'));
    }

    // Finds all products with similar names.
    public function search(Request $request)
    {
        $search = $request->input('search');
        $products = Product::where('name', 'like', '%' . $search . '%')->get();
        $categories = Category::all();
        return view("ProductDisplayPage", compact("products", "categories"));
    }
    // Method to show all products for the admin
    public function showInventory()
    {
        // Fetch all products
        $products = Product::all();

        // Check if products are fetched
        dd($products);

        return view('adminsettings', compact('products'));
    }
}

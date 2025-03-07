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

    public function findByCategory($id) {
        $products = $id
            ? Product::where('category_id', $id)->get()
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

    public function destroy($id)
    {
        try {
            $product = Product::findOrFail($id);
            $product->delete();
            
            return response()->json(['success' => true, 'message' => 'Product deleted successfully.']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'An error occurred while deleting the product.']);
        }
    }
    

    public function store(Request $request)
    {
    $request->validate([
        'name' => 'required|string|max:100',
        'price' => 'required|numeric|min:0',
        'description' => 'required|string',
        'alt_text' => 'required|string|max:255',
        'number_of_stock' => 'required|integer|min:0',
        'image_link' => 'required|string|max:255',
        'average_rating' => 'required|integer|min:1|max:5',
        'category_id' => 'required|integer|exists:categories,id',
    ]);

    Product::create([
        'name' => $request->name,
        'price' => $request->price,
        'description' => $request->description,
        'alt_text' => $request->alt_text,
        'number_of_stock' => $request->number_of_stock,
        'image_link' => $request->image_link,
        'average_rating' => $request->average_rating,
        'category_id' => $request->category_id,
    ]);

    return redirect()->back()->with('success', 'Product added successfully!');
    }

}

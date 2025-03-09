<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use App\Models\Product;
use App\Models\Review;

class ReviewController extends Controller
{
    //Shows the review linked to the given ID. Needs to be overwritten.
    public function show($product_id) {
        $product = Product::findOrFail($product_id);
        $reviews = Review::where('product_id', $product_id)->get();
        return view("SingleProduct", compact('product', 'reviews'));
    }

    //Shows all reviews.
    public function list() {
        return view("/list", array("reviews" => Review::all()));
    }

    public function store(Request $request) {
        $request->validate([
            'user_id' => 'required|numeric|exists:users,id',
            'product_id' => 'required|integer|exists:products,id',
            'description' => 'required|string',
            'rating' => 'required|numeric|min:1|max:5',
        ]);
        Review::create($request->all());

        return redirect()->route('product.show', ['id' => $request->product_id])->with('success', 'Review submitted successfully!');
    }

    //Delete a review
    public function destroy($id) {
        $review = Review::findOrFail($id);
        $product_id = $review->product_id;
        $review->delete();
        
        return redirect()->route('product.show', ['id' => $product_id])->with('success', 'Review deleted successfully!');
    }
}

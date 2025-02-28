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
    public function show($id) {
        $project = Review::find($id);
        return view("/show", array("review" => $review));
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
        Review::create([
            'user_id' => $request->user_id,
            'product_id' => $request->product_id,
            'description' => $request->description,
            'rating' => $request->rating,
        ]);
        return view("SingleProduct", compact(Product::find($request->product_id)));
    }

    public function destroy($id) {
        try {
            $review = Review::findOrFail($id);
            $product_id = $review->product_id;
            $review->delete();
            return view("SingleProduct", compact(Product::find($product_id)));
        } catch (\Exception $e) {
            return view("ProductDisplayPage", compact(Product::all(), Category::all()));
        }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Basket;
use App\Models\Product;

class BasketController extends Controller
{
    //Adds product to basket.
    public function addToBasket(Request $request)
    {
        //Validates the soon-to-be-added product.
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1'
        ]);

        //Creates or gets the first basket depending on if one exists.
        $basket = Basket::firstOrCreate(['user_id' => auth()->id()]);

        //Adds product to basket.
        $basket->products()->attach($validated['product_id'], ['quantity' => $validated['quantity']]);

        return response()->json(['message' => 'Item added to basket successfully.'], 200);
    }
}
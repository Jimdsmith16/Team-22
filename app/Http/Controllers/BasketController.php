<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Basket;
use App\Models\Product;

class BasketController extends Controller
{
    // add item to basket
    public function addToBasket(Request $request)
    {
        // validation
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1'
        ]);

        // create basket
        $basket = Basket::firstOrCreate(['user_id' => auth()->id()]);

        // add product to basket
        $basket->products()->attach($validated['product_id'], ['quantity' => $validated['quantity']]);

        return response()->json(['message' => 'Item added to basket successfully.'], 200);
    }
}
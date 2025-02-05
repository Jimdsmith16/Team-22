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

        //Checks if product is already in the basket.
        $existingProduct = $basket->products()->where('product_id', $validated['product_id'])->first();

        if ($existingProduct) {
            //Updates the quantity of the product if it is already in the basket.
            $basket->products()->updateExistingPivot($validated['product_id'], [
                'quantity' => \DB::raw("quantity + {$validated['quantity']}")
            ]);
        } else {
            //Adds product to basket if it isn't already in the basket.
            $basket->products()->attach($validated['product_id'], ['quantity' => $validated['quantity']]);
            
        }    
        //Returns you back to the page and returns a message to show the product was successfully added to the basket.    
        return redirect()->back()->with('message', 'Item added to basket successfully.');
    }

    //Retrieve the basket contents for the basket page
    public function viewBasket()
    {
        $basket = Basket::where('user_id', auth()->id())->first();
        $products = $basket ? $basket->products()->withPivot('quantity')->get() : collect();
        
        $total = $products->sum(fn($product) => $product->price * $product->pivot->quantity);
        
        return view('basketpage', compact('products', 'total'));
    }

     //Remove a product from the basket
     public function removeFromBasket(Request $request)
     {
         $validated = $request->validate([
             'product_id' => 'required|exists:products,id'
         ]);
 
         $basket = Basket::where('user_id', auth()->id())->first();
         
         if ($basket) {
            $product = $basket->products()->where('product_id', $validated['product_id'])->first();
            if ($product) {
                $quantity = $product->pivot->quantity;
    
                if ($quantity > 1) {
                    //Decrement a product's quantity in the basket if the quantity is more than 1
                    $basket->products()->updateExistingPivot($validated['product_id'], [
                        'quantity' => \DB::raw("quantity - 1")
                    ]);
                } else {
                    //Remove product from basket if quantity is 1
                    $basket->products()->detach($validated['product_id']);
                }
            }
        }
 
         //Returns you back to the page and returns a message to show the product was successfully removed from the basket.
         return redirect()->back()->with('message', 'Item removed from basket.');
     }
}
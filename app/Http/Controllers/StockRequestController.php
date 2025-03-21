<?php

namespace App\Http\Controllers;

use App\Models\StockRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class StockRequestController extends Controller
{
    public function index()
    {
        $stockRequests = StockRequest::where('status', 'pending')->get();
        \Log::info('Stock Requests: ', $stockRequests->toArray());
        return view('stockRequests.index', compact('stockRequests'));
    }

    public function approve($id)
    {
        $stockRequest = StockRequest::findOrFail($id);

        $stockRequest->status = 'approved';

        $product = $stockRequest->product;
        $product->number_of_stock += $stockRequest->quantity;

        $stockRequest->save();
        $product->save();

        return redirect()->to(route('admin.settings') . '#Stock')
            ->with('success', 'Stock request approved and stock updated.');
    }

}

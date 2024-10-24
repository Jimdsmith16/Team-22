<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Review;

class ReviewController extends Controller
{
    public function show($id) {
        $project = Review::find($id);
        return view("/show", array("review" => $review));
    }

    public function list() {
        return view("/list", array("reviews" => Review::all()));
    }
}

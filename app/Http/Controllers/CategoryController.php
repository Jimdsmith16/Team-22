<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Category;

class CategoryController extends Controller
{
    public function show($id) {
        $project = Category::find($id);
        return view("/show", array("category" => $category));
    }

    public function list() {
        return view("/list", array("categories" => Category::all()));
    }
}

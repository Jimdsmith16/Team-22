<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// routing for about us page
Route::get('/about', function() {
    return view('about');
});

// routing for login page
Route::get('/login', function() {
    return view('login');
});

// routing for product display page
Route::get('/products', function() {
    return view('products');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

?>


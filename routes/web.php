<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;

// routing for about us page
Route::get('/about', function() {
    return view('about');
});

// routing for login page
Route::get('/login', function() {
    return view('login');
});

// routing for register page
Route::get('/register', function() {
    return view('register');
});

// routing for product display page
// displays all products
Route::get('/products', [ProductController::class, 'list']);

// displays products by id
Route::get('/products/{id}', [ProductController::class, 'show']);

// displays products by name
Route::get('/products/name/{name}', [ProductController::class, 'findByName']);

// displays products by category
Route::get('/products/category/{category}', [ProductController::class, 'findByCategory']);

// routing for basket page
Route::get('/basket', function() {
    return view('basket');
});

// displays previous orders
Route::get('/previous-orders', [OrderController::class, 'list']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/orders', [OrderController::class, 'newOrder']);

?>


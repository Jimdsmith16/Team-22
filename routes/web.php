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
// Routing for User Settings
Route::get('/usersettings', function () {
    return view('usersettings');
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


// routing for updating orders 
Route::patch('/orders/update-{id}', [OrderController::class, 'updateOrder']);

// displays previous orders
Route::get('/previous-orders/{userid}', [OrderController::class, 'getPreviousOrderInfo']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/orders', [OrderController::class, 'addOrder']);

// Logout route
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

// Authentication Routes
Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login')->middleware('guest'); 
Route::post('/login', [AuthenticatedSessionController::class, 'store'])->name('login.store'); 

// Registration Route
Route::get('/register', function () {
    return view('auth.register');  
})->name('register')->middleware('guest'); 
Route::post('/register', [AuthenticatedSessionController::class, 'store'])->name('register.store');

require __DIR__.'/auth.php';


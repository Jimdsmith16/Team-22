<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\BasketController;

// routing for home page
Route::get('/', function() {
    return view('GVMain');
});

// routing for about us page
Route::get('/about', function() {
    return view('AboutUs');
});

// routing for checkout page
Route::get('/checkout', function() {
    return view('Checkout');
});

// routing for dummy payment page, amount to be changed later
Route::get('payment', function() {
    $amount = 20;
    return view('payment', ['amount' => $amount]);
});

// routing for order confirmation page
Route::get('/order-confirmation', function() {
    return view('GVOrderConfirmation');
});

// routing for contact a tutor page
Route::get('/tutor', function() {
    return view('GVTutor');
});

// routing for contact us page
Route::get('/contact', function() {
    return view('ContactUs');
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
})->middleware('auth');

// routing for admin settings
Route::get('/adminsettings', function () {
    return view('adminsettings');
})->middleware('auth');

// routing for product display page
// displays all products
Route::get('/products', [ProductController::class, 'list']);

// displays products by id
Route::get('/products/{id}', [ProductController::class, 'show']);

// displays products by name
Route::get('/products/name/{name}', [ProductController::class, 'findByName']);

// displays products by category
Route::get('/products/category/{category}', [ProductController::class, 'findByCategory']);

// routing for a single product
Route::get('/product/{id}', function($id) {
    $product = App\Models\Product::find($id);
    if (!$product) {
        abort(404, 'Product not found');
    }
    return view('SingleProduct', ['product' => $product]);
});

// routing for basket page
Route::get('/basket', function() {
    return view('basket');
});

Route::post('/basket/add', [BasketController::class, 'addToBasket'])->middleware('auth');

// routing for updating orders 
Route::patch('/orders/update-{id}', [OrderController::class, 'updateOrder']);

// displays previous orders
Route::get('/previous-orders/{userid}', [OrderController::class, 'getPreviousOrderInfo']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/orders', [OrderController::class, 'addOrder']);

Route::put('/password/reset', [ResetPasswordController::class, 'updatePassword'])->name('password.update');

Route::put('/user/update', [ProfileController::class, 'update'])->name('profile.update')->middleware('auth');

?>
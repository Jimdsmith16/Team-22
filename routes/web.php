<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\BasketController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\StockRequestController;

// Publicly accessible product-related routes
Route::get('/products', [ProductController::class, 'list']);
Route::get('/products/name/{name}', [ProductController::class, 'findByName']);
Route::get('/products/category/{category}', [ProductController::class, 'findByCategory'])->name('products.category');
Route::get('/products/filter', [ProductController::class, 'filterByCategory'])->name('products.byCategory');
Route::get('/products/{id}', [ProductController::class, 'show'])->where('id', '[0-9]+')->name('product.show');

// Product management routes
Route::post('/product/store', [ProductController::class, 'store'])->name('product.store');
Route::put('/product/{id}', [ProductController::class, 'update'])->where('id', '[0-9]+')->name('product.update');
Route::delete('/product/{id}', [ProductController::class, 'destroy'])->where('id', '[0-9]+')->name('product.destroy');

// Reviews
Route::post('/review/store', [ReviewController::class, 'store'])->name('review.store');
Route::delete('/review/{id}', [ReviewController::class, 'destroy'])->name('review.destroy');

// Public pages
Route::view('/', 'GVMain');
Route::view('/about', 'AboutUs');
Route::view('/tutor', 'GVTutor');
Route::view('/contact', 'ContactUs');
Route::view('/login', 'login');
Route::view('/register', 'register');

// Protected routes requiring authentication
Route::middleware(['auth'])->group(function () {
    // Checkout process
    Route::get('/checkout', [BasketController::class, 'viewCheckout'])->name('checkout.page');
    Route::post('/checkout/process', [OrderController::class, 'processCheckout'])->name('checkout.process');

    // Payment page
    Route::get('/payment', [OrderController::class, 'showPaymentPage'])->name('payment.page');
    Route::post('/payment/process', [OrderController::class, 'processPayment'])->name('payment.process');

    // Basket routes
    Route::get('/basket', [BasketController::class, 'viewBasket']);
    Route::post('/basket/add', [BasketController::class, 'addToBasket'])->name('basket.add');
    Route::post('/basket/remove', [BasketController::class, 'removeFromBasket'])->name('basket.remove');

    // Orders
    Route::get('/orders/previous', [OrderController::class, 'getPreviousOrderInfo'])->name('previous.orders');
    Route::patch('/orders/update-{id}', [OrderController::class, 'updateOrder']);
    Route::post('/orders', [OrderController::class, 'addOrder']);
    Route::get('/order-confirmation/{order}', [OrderController::class, 'orderConfirmation'])->name('order.confirmation');

    // Stock Request Routes
    Route::resource('stockRequests', StockRequestController::class);
    Route::put('stockRequests/{id}/approve', [StockRequestController::class, 'approve'])->name('stockRequests.approve');

    // Order Product Requests
    Route::post('/request-stock', [OrderController::class, 'addProductToOrder'])->name('stock.request');

    // User settings
    Route::view('/usersettings', 'usersettings')->name('usersettings');

    // Profile updates
    Route::put('/user/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/address/update', [ProfileController::class, 'updateAddress'])->name('address.update');
});

// Admin-only routes
Route::middleware(['auth'])->group(function () {
    Route::get('/adminsettings', [ProfileController::class, 'showAdminDashboard'])
        ->name('admin.settings');
});

// Authentication and profile routes
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::put('/adminsettings/password', [ProfileController::class, 'updatePassword'])->name('admin.password.update');
Route::put('/usersettings/password', [ProfileController::class, 'updatePassword'])->name('user.password.update');
Route::post('/user/add', [ProfileController::class, 'store'])->name('user.add');
Route::put('/user/update/{id}', [ProfileController::class, 'update'])->where('id', '[0-9]+')->name('user.update');
Route::delete('/user/destroy/{id}', [ProfileController::class, 'destroyUser'])->where('id', '[0-9]+')->name('user.destroy');
Route::get('/admin/orders', [OrderController::class, 'index'])->name('admin.orders.index');

// Search route (publicly accessible)
Route::get('/search', [ProductController::class, 'search'])->name('products.search');

// Authentication routes
Auth::routes();

?>
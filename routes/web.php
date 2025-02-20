<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\BasketController;

// Route to filter products by category
Route::get('/products/filter', [ProductController::class, 'filterByCategory'])->name('products.byCategory');

//Routing for Home page.
Route::get('/', function () {
    return view('GVMain');
});

//Routing for About Us page.
Route::get('/about', function () {
    return view('AboutUs');
});

//Routing for Checkout page.
Route::middleware(['auth'])->group(function () {
    Route::get('/checkout', [BasketController::class, 'viewCheckout'])->name('checkout.page');
    Route::post('/checkout/process', [OrderController::class, 'processCheckout'])->name('checkout.process');

// Routing for Payment page with placeholder amount.
Route::get('payment', function () {
    $amount = 20;
    return view('payment', ['amount' => $amount]);
});

//Routing for Order Confirmation page.
Route::get('/order-confirmation/{order}', [OrderController::class, 'orderConfirmation'])->name('order.confirmation');

Route::get('/tutor', function () {
    return view('GVTutor');
});

//Routing for Contact Us page.
Route::get('/contact', function () {
    return view('ContactUs');
});

//Routing for Home page.
Route::get('/login', function () {
    return view('login');
});

////Routing for Register page.
Route::get('/register', function () {
    return view('register');
});
////Routing for User Settings page. Requires authorisation.
Route::get('/usersettings', function () {
    return view('usersettings');
})->middleware('auth');

////Routing for Admin Settings page. Requires authorisation.
Route::get('/adminsettings', function () {
    if (auth()->user() && auth()->user()->type === 'admin') {
        return view('adminsettings');
    }
    return redirect('/');
})->middleware('auth');


//Routing for Product Display page.
Route::get('/products', [ProductController::class, 'list']);

//Routing for Singular Product page.
Route::get('/products/{id}', [ProductController::class, 'show']);

//Routing for finding products by name. Shows Product Display page.
Route::get('/products/name/{name}', [ProductController::class, 'findByName']);

//Routing for finding products by category. Shows Product Display page.
Route::get('/products/category/{category}', [ProductController::class, 'findByCategory']);

//Routing for Basket page.
Route::get('/basket', function () {
    return view('basketpage');
});

Route::get('/basket', [BasketController::class, 'viewBasket'])->middleware('auth');
Route::post('/basket/add', [BasketController::class, 'addToBasket'])->middleware('auth')->name('basket.add');
Route::post('/basket/remove', [BasketController::class, 'removeFromBasket'])->middleware('auth')->name('basket.remove');

//Routing for orders.
Route::patch('/orders/update-{id}', [OrderController::class, 'updateOrder']);

Route::post('/orders', [OrderController::class, 'addOrder']);

//Routing for Previous Orders page.
Route::get('/orders/previous', [OrderController::class, 'getPreviousOrderInfo'])->name('previous.orders');
});

//Auth routes.
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::put('/password/reset', [ResetPasswordController::class, 'updatePassword'])->name('password.update');

Route::put('/user/update', [ProfileController::class, 'update'])->name('profile.update')->middleware('auth');

Route::put('/address/update', [ProfileController::class, 'updateAddress'])->name('address.update')->middleware('auth');

Route::get('/search', [ProductController::class, 'search'])->name('products.search');

Route::post('/user/add', [ProfileController::class, 'store'])->name('user.add');

Route::put('/user/update/{id}', [ProfileController::class, 'update'])->name('user.update');

Route::delete('/user/destroy/{id}', [ProfileController::class, 'destroyUser'])->name('user.destroy');

Route::get('/adminsettings', [ProfileController::class, 'showAdminDashboard'])->name('admin.settings');

Auth::routes();

?>
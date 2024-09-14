<?php

// Frontend Controllers

use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Checkout\CheckoutController;
use App\Http\Controllers\Frontend\Auth\AuthController;
use App\Http\Controllers\Frontend\Invokable\AboutUsController;
use App\Http\Controllers\Frontend\Invokable\CartController;
use App\Http\Controllers\Frontend\Invokable\ContactUsController;
use App\Http\Controllers\Frontend\Invokable\HomeController;
use App\Http\Controllers\Frontend\Orders\OrderController;
use App\Http\Controllers\Frontend\Products\ProductController;
use App\Models\Governorate;
// Facades
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Admin
Route::get('/admin/login', function () {
    return view('admin.login');
})->name('admin.login');

Auth::routes(['register' => false]);

Route::name('admin.')->middleware('auth')->prefix('admin')->group(function () {

    Route::get('/home', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('home');
    //Products
    Route::resource('/products', App\Http\Controllers\Admin\ProductController::class);
    //Get Orders By state
    Route::get('/orders/pending',[App\Http\Controllers\Admin\OrderController::class,'pendingOrders'])->name('orders.pending');
    Route::get('/orders/accepted',[App\Http\Controllers\Admin\OrderController::class,'acceptedOrders'])->name('orders.accepted');
    Route::get('/orders/delivered',[App\Http\Controllers\Admin\OrderController::class,'deliveredOrders'])->name('orders.delivered');
    //Set Orders Actions
    Route::put('/order/accept/{id}',[App\Http\Controllers\Admin\OrderController::class,'setAccept'])->name('order.accept');
    Route::put('/order/reject/{id}',[App\Http\Controllers\Admin\OrderController::class,'setReject'])->name('order.reject');
    Route::put('/order/delivered/{id}',[App\Http\Controllers\Admin\OrderController::class,'setDelivered'])->name('order.set.delivered');
});


// =========================== Frontend Routes ===========================
// Invokable Controllers
Route::name('frontend.')->group(function() {
    Route::get('/home', HomeController::class)->name('home');
    Route::get('/contact-us', ContactUsController::class)->name('contact-us');
    Route::get('/about-us', AboutUsController::class)->name('about-us');
    Route::get('/cart', CartController::class)->name('cart');

    // Resource Controllers
    Route::resource('/products', ProductController::class);

    // Add to Cart
    Route::get('/add-to-cart/{id}',[App\Http\Controllers\Frontend\Cart\CartController::class,'addToCart'])->name('add.cart');
    Route::get('/remove-cart/{id}',[App\Http\Controllers\Frontend\Cart\CartController::class,'removeCart'])->name('remove.cart');

    //Client Auth Controllers
    Route::get('/sign-up', [AuthController::class, 'signUp'])->name('sign-up');
    Route::post('/sign-up', [AuthController::class, 'signUpAction'])->name('register');

    Route::get('/sign-in', [AuthController::class, 'signIn'])->name('sign-in')->middleware('guest:client');
    Route::post('/sign-in', [AuthController::class, 'signInAction'])->name('login')->middleware('guest:client');

    Route::get('/logout', [AuthController::class, 'signOut'])->name('logout');

    // //Thank-You-View
    // Route::get('/thank-you', [CheckoutController::class,'thankYou'])->name('thank.you');

    Route::group(['middleware' => ['auth:client']], function () {
        //client Profile
            Route::get('/profile', [AuthController::class, 'profile'])->name('profile');
            Route::patch('/profile', [AuthController::class, 'updateProfile'])->name('profile.update');
        //Client Orders
        Route::get('/my-orders', [OrderController::class, 'getMyOrders'])->name('my.orders');
        Route::delete('/order/delete/{id}', [OrderController::class, 'deleteOrder'])->name('order.delete');
        // Checkout Routes
            Route::get('/checkout',[CheckoutController::class,'index'])->name('get.checkout');
            Route::post('/checkout/order',[CheckoutController::class,'addOrder'])->name('checkout.order');
        //Thank-You-View
        Route::get('/thank-you', [CheckoutController::class,'thankYou'])->name('thank.you');
    });
});

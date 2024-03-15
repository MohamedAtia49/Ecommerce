<?php

use App\Http\Controllers\Frontend\Auth\AuthController;
use App\Http\Controllers\Frontend\Invokable\{ContactUsController, HomeController, AboutUsController, CartController};
use App\Http\Controllers\Frontend\Products\ProductController;
use Illuminate\Support\Facades\Route;

// Invokable Controllers
Route::get('/home', HomeController::class)->name('home');
Route::get('/contact-us', ContactUsController::class)->name('contact-us');
Route::get('/about-us', AboutUsController::class)->name('about-us');

// Resource Controllers
Route::resource('/products', ProductController::class);

// Checkout Routes
Route::get('/checkout', function () {
    return view('pages.checkout');
})->name('checkout');

// Auth Controllers
Route::get('/sign-up', [AuthController::class, 'signUp'])->name('sign-up');
Route::post('/sign-up', [AuthController::class, 'signUpAction'])->name('register');

Route::get('/sign-in', [AuthController::class, 'signIn'])->name('sign-in');
Route::post('/sign-in', [AuthController::class, 'signInAction'])->name('login');


Route::middleware(['auth'])->group(function() {

    Route::post('/sign-out', [AuthController::class, "signOut"])->name('sign-out');
    
    Route::get('/profile', [AuthController::class, 'profile'])->name('profile');
    Route::patch('/profile', [AuthController::class, 'updateProfile'])->name('profile.update');
});

Route::get('/cart', CartController::class)->name('cart');
<?php

// Frontend Controllers
use App\Http\Controllers\Frontend\Auth\AuthController;
use App\Http\Controllers\Frontend\Invokable\AboutUsController;
use App\Http\Controllers\Frontend\Invokable\CartController;
use App\Http\Controllers\Frontend\Invokable\ContactUsController;
use App\Http\Controllers\Frontend\Invokable\HomeController;
use App\Http\Controllers\Frontend\Products\ProductController;

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

Route::get('/admin/login', function () {
    return view('admin.login');
})->name('admin.login');

Auth::routes(['register' => false]);

Route::middleware('auth')->prefix('admin')->group(function () {

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

});


// =========================== Frontend Routes ===========================
// Invokable Controllers
Route::prefix('frontend')->group(function() {
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
});
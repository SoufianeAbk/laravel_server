<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JerseyController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\ProfileController;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Home
Route::get('/', [HomeController::class, 'index'])->name('home');

// Jerseys
Route::prefix('jerseys')->name('jerseys.')->group(function () {
    Route::get('/', [JerseyController::class, 'index'])->name('index');
    Route::get('/featured', [JerseyController::class, 'featured'])->name('featured');
    Route::get('/search', [JerseyController::class, 'search'])->name('search');
    Route::get('/{id}', [JerseyController::class, 'show'])->name('show');
    Route::get('/{id}/quick-view', [JerseyController::class, 'quickView'])->name('quick-view');
});

// Cart
Route::prefix('cart')->name('cart.')->group(function () {
    Route::get('/', [CartController::class, 'index'])->name('index');
    Route::post('/add', [CartController::class, 'add'])->name('add');
    Route::put('/update/{id}', [CartController::class, 'update'])->name('update');
    Route::delete('/remove/{id}', [CartController::class, 'remove'])->name('remove');
    Route::post('/clear', [CartController::class, 'clear'])->name('clear');
    Route::get('/count', [CartController::class, 'count'])->name('count');
});

// Authentication required routes
Route::middleware(['auth'])->group(function () {

    // Checkout
    Route::prefix('checkout')->name('checkout.')->group(function () {
        Route::get('/', [CheckoutController::class, 'index'])->name('index');
        Route::post('/process', [CheckoutController::class, 'process'])->name('process');
        Route::get('/success/{order}', [CheckoutController::class, 'success'])->name('success');
    });

    // Orders
    Route::prefix('orders')->name('orders.')->group(function () {
        Route::get('/', [OrderController::class, 'index'])->name('index');
        Route::get('/{order}', [OrderController::class, 'show'])->name('show');
        Route::post('/{order}/cancel', [OrderController::class, 'cancel'])->name('cancel');
        Route::get('/{order}/invoice', [OrderController::class, 'invoice'])->name('invoice');
    });

    // Wishlist
    Route::prefix('wishlist')->name('wishlist.')->group(function () {
        Route::get('/', [WishlistController::class, 'index'])->name('index');
        Route::post('/add', [WishlistController::class, 'add'])->name('add');
        Route::delete('/remove/{id}', [WishlistController::class, 'remove'])->name('remove');
        Route::post('/move-to-cart/{id}', [WishlistController::class, 'moveToCart'])->name('move-to-cart');
    });

    // Profile
    Route::prefix('profile')->name('profile.')->group(function () {
        Route::get('/', [ProfileController::class, 'index'])->name('index');
        Route::get('/edit', [ProfileController::class, 'edit'])->name('edit');
        Route::put('/update', [ProfileController::class, 'update'])->name('update');
        Route::get('/addresses', [ProfileController::class, 'addresses'])->name('addresses');
        Route::post('/addresses', [ProfileController::class, 'addAddress'])->name('addresses.add');
        Route::delete('/addresses/{id}', [ProfileController::class, 'deleteAddress'])->name('addresses.delete');
    });
});

/*
|--------------------------------------------------------------------------
| Static Pages (with Contact form support)
|--------------------------------------------------------------------------
*/

// About Us
Route::view('/about', 'pages.about')->name('about');

// Contact
Route::get('/contact', function () {
    return view('pages.contact');
})->name('contact');

Route::post('/contact', function (Request $request) {
    $request->validate([
        'first_name' => 'required|string|max:255',
        'last_name'  => 'required|string|max:255',
        'email'      => 'required|email',
        'phone'      => 'nullable|string|max:20',
        'subject'    => 'required|string',
        'message'    => 'required|string|min:10',
    ]);

    // Example: send email or save to DB
    // Mail::to('support@yourapp.com')->send(new ContactMessage($request->all()));

    return redirect()->route('contact')->with('success', 'Thank you for your message! We will get back to you soon.');
})->name('contact.send');

// Customer Service Pages
Route::view('/shipping', 'pages.shipping')->name('shipping');
Route::view('/returns', 'pages.returns')->name('returns');
Route::view('/terms', 'pages.terms')->name('terms');
Route::view('/privacy', 'pages.privacy')->name('privacy');
Route::view('/size-guide', 'pages.size-guide')->name('size-guide');

// FAQ Page (if you want to add this too)
Route::view('/faq', 'pages.faq')->name('faq');

// Authentication routes (Laravel Breeze/Jetstream will handle these)
require __DIR__.'/auth.php';
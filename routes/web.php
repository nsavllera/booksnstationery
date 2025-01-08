<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CartItemsController;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

// Authentication routes
Route::get('/login', function () {
    return view('auth.login');
})->middleware(['guest'])->name('login');

Route::get('/register', function () {
    return view('auth.register');
})->middleware(['guest'])->name('register');

Route::get('/password/reset', function () {
    return view('auth.forgot-password');
})->middleware(['guest'])->name('password.request');

Route::post('/login', [AuthenticatedSessionController::class, 'store'])
    ->middleware(['guest'])
    ->name('login');

Route::post('/register', [RegisteredUserController::class, 'store'])
    ->middleware(['guest'])
    ->name('register');

Route::post('/password/email', [PasswordResetLinkController::class, 'store'])
    ->middleware(['guest'])
    ->name('password.email');

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->middleware(['auth'])
    ->name('logout');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () { 
    return view('dashboard'); 
})->middleware(['auth'])->name('dashboard');

Route::get('/aboutus', [AboutUsController::class, 'index'])->name('aboutus');

Route::get('/contactus', [ContactUsController::class, 'index'])->name('contactus');

Route::post('/send-message', [ContactUsController::class, 'store']);

Route::middleware(['auth'])->group(function () { 
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit'); 
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update'); 
    Route::post('/profile/delete', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/admin/product', [ProductController::class, 'index'])->name('product.index');

// Create product
Route::get('/admin/product/create', [ProductController::class, 'create'])->name('product.create'); 
Route::post('/admin/product', [ProductController::class, 'store'])->name('product.store');

// Edit product
Route::get('/admin/product/{id}/edit', [ProductController::class, 'edit'])->name('product.edit');
Route::put('/admin/product/{id}', [ProductController::class, 'update'])->name('product.update');

Route::delete('/admin/product/{id}', [ProductController::class, 'destroy'])->name('product.destroy');

Route::get('/products', [ProductController::class, 'customerIndex'])->name('product.customerIndex');
Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show');

Route::middleware(['auth'])->group(function () {
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add/{id}', [CartItemsController::class, 'add'])->name('cart.add');
    Route::delete('/cart/remove/{id}', [CartItemsController::class, 'destroy'])->name('cart.destroy');
    Route::post('/cart/update/{id}', [CartItemsController::class, 'update'])->name('cart.update');
    Route::post('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
    Route::post('/order/place', [OrderController::class, 'place'])->name('order.place');
});

Route::get('/myorders', [OrderController::class, 'myOrders'])->name('myorders');

Route::get('/admin/orders', [OrderController::class, 'index'])->name('admin.orders');
Route::post('/admin/orders/{order}/update-status', [OrderController::class, 'updateStatus'])->name('admin.orders.update-status');


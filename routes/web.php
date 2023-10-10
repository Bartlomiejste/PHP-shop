<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [WelcomeController::class, 'index']);

Route::middleware(['auth', 'verified'])->group(function() {
    Route::middleware(['can:isAdmin'])->group(function() {
        Route::get('/products/{product}/download', [ProductController::class, 'downloadImage'])->name('products.downloadImage');
        Route::resource('products', ProductController::class);

        Route::resource('users', UserController::class)->only([
            'index','edit','update','destroy'
        ]);
    });
        Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
        Route::post('/cart/{product}', [CartController::class, 'store'])->name('cart.store');
        Route::delete('/cart/{product}', [CartController::class, 'destroy'])->name('cart.destroy');

        Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
        Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');
        
        Route::get('/home', [HomeController::class, 'index'])->name('home');
});

// Route::get('/products', [ProductController::class, 'index'])->name(name:'products.index')->middleware('auth');

// Route::get('/products/create', [ProductController::class, 'create'])->name(name:'products.create')->middleware('auth');
// Route::get('/products/{product}', [ProductController::class, 'show'])->name(name:'products.show')->middleware('auth');

// Route::post('/products', [ProductController::class, 'store'])->name(name:'products.store')->middleware('auth');

// Route::get('/products/edit/{product}', [ProductController::class, 'edit'])->name(name:'products.edit')->middleware('auth');
// Route::post('/products/{product}', [ProductController::class, 'update'])->name(name:'products.update')->middleware('auth');
// Route::delete('/products/{product}', [ProductController::class, 'destroy'])->middleware('auth');



Auth::routes(['verify' => true]);

Route::get('language/{lang}', [App\Http\Controllers\LanguageController::class, 'switchLang'])->name('language.switch');
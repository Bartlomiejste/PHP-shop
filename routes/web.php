<?php

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
    Route::resource('products', ProductController::class); 
    Route::get('/users/list', [UserController::class, 'index'])->middleware('auth');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->middleware('auth');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
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
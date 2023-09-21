<?php

use App\Http\Controllers\HelloController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/products', [ProductController::class, 'index'])->name(name:'products.index')->middleware('auth');
Route::get('/products/create', [ProductController::class, 'create'])->name(name:'products.create')->middleware('auth');
Route::post('/products', [ProductController::class, 'store'])->name(name:'products.store')->middleware('auth');

Route::get('/users/list', [UserController::class, 'index'])->middleware('auth');
Route::delete('/users/{user}', [UserController::class, 'destroy'])->middleware('auth');

Route::get('/hello', [HelloController::class, 'show']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
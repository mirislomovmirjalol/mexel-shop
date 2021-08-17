<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/product/{id}', [App\Http\Controllers\ProductController::class, 'show'])->name('product.show');

Route::get('/category', [App\Http\Controllers\CategoryController::class, 'index'])->name('category.index');
Route::get('/category/{id}', [App\Http\Controllers\CategoryController::class, 'show'])->name('category.show');

Route::get('/cart', [App\Http\Controllers\HomeController::class, 'showCart'])->name('cart.show');
Route::get('/profile', [App\Http\Controllers\HomeController::class, 'showProfile'])->name('profile.show');
Route::get('/HistoryOrders', [App\Http\Controllers\HomeController::class, 'showHistoryOrders'])->name('historyOrders.show');
Route::get('/HistoryOrders/{id}', [App\Http\Controllers\HomeController::class, 'showOrder'])->name('order.show');

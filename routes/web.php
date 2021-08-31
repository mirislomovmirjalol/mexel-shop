<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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
    return view('home');
})->name('home');

Route::post('/test', function (Request $request) {
    return $request;
})->name('test');

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [App\Http\Controllers\HomeController::class, 'showProfile'])->name('profile.show');
    Route::get('/HistoryOrders', [App\Http\Controllers\HomeController::class, 'showHistoryOrders'])->name('historyOrders.show');
    Route::get('/HistoryOrders/{id}', [App\Http\Controllers\HomeController::class, 'showOrder'])->name('order.show');

    Route::get('/cart', [App\Http\Controllers\CartController::class, 'index'])->name('cart.show');
    Route::post('/cart/add/{productId}', [App\Http\Controllers\CartController::class, 'addToCart'])->name('cart.add');
    Route::post('/cart/remove/{productId}', [App\Http\Controllers\CartController::class, 'removeFromCart'])->name('cart.remove');
    Route::post('/cart/reduce/{productId}', [App\Http\Controllers\CartController::class, 'reduceFromCart'])->name('cart.reduce');

    Route::get('/address', [App\Http\Controllers\CartController::class, 'address'])->name('cart.address');
});

Route::get('/product/{id}', [App\Http\Controllers\ProductController::class, 'show'])->name('product.show');
Route::get('/category', [App\Http\Controllers\CategoryController::class, 'index'])->name('category.index');
Route::get('/category/{id}', [App\Http\Controllers\CategoryController::class, 'show'])->name('category.show');

Route::get('/admin/', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.index');

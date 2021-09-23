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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/home', function () {
    return redirect()->route('home');
});

Route::post('/test', function (Request $request) {
    return $request;
})->name('test');

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [App\Http\Controllers\HomeController::class, 'showProfile'])->name('profile.show');
    Route::get('/historyOrders', [App\Http\Controllers\OrderController::class, 'historyOrders'])->name('historyOrders.show');
    Route::get('/activeOrders', [App\Http\Controllers\OrderController::class, 'activeOrders'])->name('activeOrders.show');
    Route::get('/orders/{id}', [App\Http\Controllers\OrderController::class, 'showOrder'])->name('order.show');

    Route::get('/cart', [App\Http\Controllers\CartController::class, 'index'])->name('cart.show');
    Route::post('/cart/add/{productId}', [App\Http\Controllers\CartController::class, 'addToCart'])->name('cart.add');
    Route::post('/cart/remove/{productId}', [App\Http\Controllers\CartController::class, 'removeFromCart'])->name('cart.remove');
    Route::post('/cart/reduce/{productId}', [App\Http\Controllers\CartController::class, 'reduceFromCart'])->name('cart.reduce');

    Route::post('/order', [App\Http\Controllers\OrderController::class, 'orderConfirmed'])->name('orderConfirmed');
    Route::get('/cart/address', [App\Http\Controllers\CartController::class, 'address'])->name('cart.address');
});

Route::get('/product/{id}', [App\Http\Controllers\ProductController::class, 'show'])->name('product.show');
Route::get('/category', [App\Http\Controllers\CategoryController::class, 'index'])->name('category.index');
Route::get('/category/{id}', [App\Http\Controllers\CategoryController::class, 'show'])->name('category.show');
Route::post('/search', [App\Http\Controllers\HomeController::class, 'search'])->name('search');

Route::prefix('/admin/')->name('admin.')->middleware(['is_admin', 'auth'])->group(function () {
    Route::get('/', [App\Http\Controllers\AdminController::class, 'index'])->name('index');

    Route::get('/category', [App\Http\Controllers\AdminController::class, 'category'])->name('category');
    Route::get('/category/create', [App\Http\Controllers\CategoryController::class, 'create'])->name('category.create');
    Route::post('/category/create', [App\Http\Controllers\CategoryController::class, 'store'])->name('category.store');
    Route::get('/category/{id}', [App\Http\Controllers\AdminController::class, 'category'])->name('category.show');
    Route::get('/category/{id}/edit', [App\Http\Controllers\CategoryController::class, 'edit'])->name('category.edit');
    Route::post('/category/edit', [App\Http\Controllers\CategoryController::class, 'update'])->name('category.update');
    Route::get('/category/{id}/destroy', [App\Http\Controllers\CategoryController::class, 'destroy'])->name('category.destroy');

    Route::get('/admin', [App\Http\Controllers\AdminController::class, 'admin'])->name('admin');
    Route::get('/client', [App\Http\Controllers\AdminController::class, 'client'])->name('client');
    Route::get('/users', [App\Http\Controllers\AdminController::class, 'users'])->name('users');
    Route::get('/admin/create', [App\Http\Controllers\AdminController::class, 'create'])->name('admin.create');
    Route::post('/admin/create', [App\Http\Controllers\AdminController::class, 'store'])->name('admin.store');
    Route::get('/admin/{id}', [App\Http\Controllers\AdminController::class, 'category'])->name('admin.show');
    Route::get('/admin/{id}/edit', [App\Http\Controllers\AdminController::class, 'edit'])->name('admin.edit');
    Route::post('/admin/edit', [App\Http\Controllers\AdminController::class, 'update'])->name('admin.update');
    Route::get('/admin/{id}/destroy', [App\Http\Controllers\AdminController::class, 'destroy'])->name('admin.destroy');

    Route::get('/product', [App\Http\Controllers\AdminController::class, 'product'])->name('product');
    Route::get('/product/create', [App\Http\Controllers\ProductController::class, 'create'])->name('product.create');
    Route::post('/product/create', [App\Http\Controllers\ProductController::class, 'store'])->name('product.store');
    Route::get('/product/{id}/edit', [App\Http\Controllers\ProductController::class, 'edit'])->name('product.edit');
    Route::post('/product/edit', [App\Http\Controllers\ProductController::class, 'update'])->name('product.update');
    Route::get('/product/{id}/destroy', [App\Http\Controllers\ProductController::class, 'destroy'])->name('product.destroy');

    Route::get('/order', [App\Http\Controllers\OrderController::class, 'order'])->name('order');
    Route::get('/activeOrder', [App\Http\Controllers\OrderController::class, 'activeOrderForAdmin'])->name('activeOrder');
    Route::get('/historyOrder', [App\Http\Controllers\OrderController::class, 'historyOrderForAdmin'])->name('historyOrder');
    Route::get('/order/create', [App\Http\Controllers\OrderController::class, 'create'])->name('order.create');
    Route::get('/order/{id}', [App\Http\Controllers\OrderController::class, 'show'])->name('order.show');
    Route::post('/order/create', [App\Http\Controllers\OrderController::class, 'store'])->name('order.store');
    Route::get('/order/{id}/edit', [App\Http\Controllers\OrderController::class, 'edit'])->name('order.edit');
    Route::post('/order/edit', [App\Http\Controllers\OrderController::class, 'update'])->name('order.update');
    Route::get('/order/{id}/destroy', [App\Http\Controllers\OrderController::class, 'destroy'])->name('order.destroy');
    Route::post('/order/{order}/add/{productId}', [App\Http\Controllers\OrderController::class, 'addToCart'])->name('order.add');
    Route::post('/order/{order}/remove/{productId}', [App\Http\Controllers\OrderController::class, 'removeFromCart'])->name('order.remove');
    Route::post('/order/{order}/reduce/{productId}', [App\Http\Controllers\OrderController::class, 'reduceFromCart'])->name('order.reduce');
    Route::post('/order/{order}/cancel', [App\Http\Controllers\OrderController::class, 'cancelOrder'])->name('order.cancel');
    Route::post('/order/{order}/confirm', [App\Http\Controllers\OrderController::class, 'confirmOrder'])->name('order.confirm');
    Route::post('/order/{order}/delivered', [App\Http\Controllers\OrderController::class, 'deliveredOrder'])->name('order.delivered');
});

<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\ImageNotDIController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/about', [HomeController::class, 'about'])->name('home.about');

Route::get('/products', [ProductController::class, 'index'])->name('product.index');
Route::get('/products/create', [ProductController::class, 'create'])->name('product.create');
Route::post('/products/save', [ProductController::class, 'save'])->name('product.save');
Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('product.edit');
Route::put('/products/{id}', [ProductController::class, 'update'])->name('product.update');
Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('product.destroy');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('product.show');

Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::get('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
Route::get('/cart/removeAll/', [CartController::class, 'removeAll'])->name('cart.removeAll');

Route::get('/image', [ImageController::class, 'index'])->name('image.index');
Route::post('/image/save', [ImageController::class, 'save'])->name('image.save');

Route::get('/image-not-di', [ImageNotDIController::class, 'index'])->name('imagenotdi.index');
Route::post('/image-not-di/save', [ImageNotDIController::class, 'save'])->name('imagenotdi.save');

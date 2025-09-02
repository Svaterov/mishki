<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ProductController::class, 'index'])->name('home');
Route::get('/products', [ProductController::class, 'allProducts'])->name('products.all');
Route::get('/products/cars', [ProductController::class, 'cars'])->name('products.cars');
Route::get('/products/motorcycles', [ProductController::class, 'motorcycles'])->name('products.motorcycles');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');


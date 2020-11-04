<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia\Inertia::render('Dashboard');
})->name('dashboard');

// Route::get('products', [ProductController::class, 'index'])
//     ->name('products');

// Route::get('product/{id}', [ProductController::class, 'showOne'])
//     ->name('product');

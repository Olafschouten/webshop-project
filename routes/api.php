<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/products', 'App\Http\Controllers\ProductController@index');

Route::get('/product/{id}', 'App\Http\Controllers\ProductController@showOne');

Route::get('/categories', 'App\Http\Controllers\CategoryController@index');

Route::get('/category/{id}', 'App\Http\Controllers\CategoryController@showOne');
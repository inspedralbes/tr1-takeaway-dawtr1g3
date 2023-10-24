<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ProductesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::resource('productes',ProductesController::class);

Route::get('/categories/search/{nom}', [CategoriesController::class, 'search']);

Route::resource('categories', CategoriesController::class);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

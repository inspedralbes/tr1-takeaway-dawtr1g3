<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductesController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ComandesController;

Route::resource('productes',ProductesController::class);
Route::resource('categories',CategoriesController::class);
Route::resource('comandes',ComandesController::class);

Route::get('/productes/search/{title}', [ProductesController::class, 'search']);
Route::get('/categories/search/{nom}', [CategoriesController::class, 'search']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

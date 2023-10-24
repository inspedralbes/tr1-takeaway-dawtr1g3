<?php

use App\Http\Controllers\ProductsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductesController;

Route::get("/products/search/{title}", [ProductsController::class,"search"]);
Route::put("/products/{id}", [ProductsController::class,"update"]);
Route::delete("/products/{id}", [ProductsController::class,"destroy"]);

Route::resource('productes',ProductesController::class);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

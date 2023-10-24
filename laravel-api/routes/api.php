<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductesController;
use App\Http\Controllers\CategoriesController;

Route::get("/products/search/{title}", [ProductsController::class,"search"]);
Route::put("/products/{id}", [ProductsController::class,"update"]);
Route::delete("/products/{id}", [ProductsController::class,"destroy"]);

Route::resource('productes',ProductesController::class);
Route::resource('categories',CategoriesController::class);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

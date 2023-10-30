<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductesController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ComandesController;
use App\Http\Controllers\LineaComandesController;
use App\Http\Controllers\TipusUsuariController;
use App\Http\Controllers\UsuariController;

Route::resource('productes',ProductesController::class);
Route::resource('categories',CategoriesController::class);
Route::resource('comandes',ComandesController::class);
Route::resource('lineacomandes',LineaComandesController::class);
Route::resource('tipususuari',TipusUsuariController::class);
Route::resource('usuari',UsuariController::class);

Route::get('lineacomandes/orderclient/{comandaID}', [LineaComandesController::class,'getLineasPorIdComanda']);
Route::get('/productes/search/{nom}', [ProductesController::class, 'search']);
Route::get('/categories/search/{nom}', [CategoriesController::class, 'search']);
Route::get('/comandes/search/{nom}', [ComandesController::class, 'search']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

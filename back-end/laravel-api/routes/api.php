<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductesController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ComandesController;
use App\Http\Controllers\LineaComandesController;

//  Public API routes
Route::get('/productes', [ProductesController::class, 'index']);
Route::get('/categories', [CategoriesController::class,'index']);
Route::post('/comandes', [ComandesController::class,'store']);
Route::post('/lineacomandes', [LineaComandesController::class,'store']);

Route::post('/register', [AuthController::class,'register']);
Route::post('/login', [AuthController::class,'login']);

Route::get('/pdf', [LineaComandesController::class, 'getpdf']);
Route::get('/correu', [LineaComandesController::class, 'enviarCorreu']);


// Protected API routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/comandes/orderclient/{user}', [ComandesController::class, 'getComandesUser']);
    Route::get('/lineacomandes/orderclient/{comandaID}', [LineaComandesController::class,'getLineasPorIdComanda']);
    // Sessions
    Route::post('/logout', [AuthController::class,'logout']);
});

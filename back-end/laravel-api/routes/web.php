<?php

use App\Http\Controllers\ComandesController;
use App\Http\Controllers\ProductesController;
use App\Models\Comanda;
use Illuminate\Support\Facades\Route;

Route::get("/admin", function () {
    return view('admin.index');
});

//comandes
Route::get('/admin/comandes', function() {
    $comandes = Comanda::all();
    return view('admin.comandes')->with('comandes', $comandes);
})->name('comandes');

Route::get('/admin/comandes/{id}', function($id) {
    $comanda = Comanda::find($id);
    return view('admin.updateComanda')->with('comanda', $comanda);
})->name('comanda');

// Route::get('/admin/comandes/edit', [ComandesController::class,'show'])->name('comanda');


//productes
Route::get('/admin/productes', [ProductesController::class,'index'])->name('productes');

Route::get('/', function () {
    return view('welcome');
});

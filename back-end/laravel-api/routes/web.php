<?php

use App\Http\Controllers\ComandesController;
use App\Http\Controllers\ProductesController;
use App\Models\Product;
use App\Models\Comanda;
use Illuminate\Support\Facades\Route;

Route::get("/admin", function () {
    return view('admin.index');
})->name('index');

//comandes
Route::get('/admin/comandes', function() {
    $comandes = Comanda::where('estat', '<>', 'Llest per recollir')->get();
    return view('admin.comandes')->with('comandes', $comandes);
})->name('comandes');

Route::get('/admin/comandes/{id}', function($id) {
    $comanda = Comanda::find($id);
    $estadosPosibles = ['Rebut', 'En preparació', 'Llest per recollir'];
    return view('admin.updateComanda')->with(['comanda' => $comanda, 'estats' => $estadosPosibles]);
})->name('comanda');

Route::patch('/admin/comandes/{id}', [ComandesController::class, 'update'])->name('comandaupdate');

//productes
Route::get('/admin/productes', function() {
    $productes = Product::all();
    return view('admin.productes')->with('productes', $productes);
})->name('productes');

Route::get('/admin/producte/{id}', function($id) {
    $comanda = Comanda::find($id);
    return view('admin.updateProducte')->with(['comanda' => $comanda]);
})->name('producte');

// Route::patch('/admin/comandes/{id}', [ComandesController::class, 'update'])->name('comandaupdate');

Route::get('/', function () {
    return view('welcome');
});

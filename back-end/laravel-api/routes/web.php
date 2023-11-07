<?php

use App\Http\Controllers\ComandesController;
use App\Http\Controllers\ProductesController;
use App\Models\Categoria;
use App\Models\Product;
use App\Models\Comanda;
use Illuminate\Support\Facades\Route;

Route::get("/admin", function () {
    return view('admin.index');
})->name('index');

// Comanda
Route::get('/admin/comandes', function() {
    $comandes = Comanda::where('estat', '<>', 'Llest per recollir')->get();
    return view('admin.comandes')->with('comandes', $comandes);
})->name('comandes');

// Route::get('/admin/comandes/{id}', function($id) {
//     $comanda = Comanda::find($id);
//     $estadosPosibles = ['Rebut','En preparacio','Llest per recollir'];
//     return view('admin.updateComanda')->with(['comanda' => $comanda, 'estats' => $estadosPosibles]);
// })->name('comanda');

// Route::patch('/admin/comandes/{id}', [ComandesController::class, 'update'])->name('comandaupdate');

// Product

Route::get('/admin/productes', function() {
    $productes = Product::all();
    return view('admin.productes')->with('productes', $productes);
})->name('productes');

// Route::get('/admin/producte/{id}', function($id) {
//     $producte = Product::find($id);
//     $categories = Categoria::all();
//     return view('admin.updateProducte')->with(['producte' => $producte, 'categories'=> $categories]);
// })->name('producte');

// Route::patch('/admin/producte/{id}', [ProductesController::class, 'update'])->name('producteupdate');

// Route::delete('/admin/productes/{id}', function($id) {
//     Product::destroy($id);
//     $productes = Product::all();
//     return view('admin.productes')->with('productes', $productes);
// })->name('productedestroy');

// Route::get('/admin/productes/create', function() {
//     $categories = Categoria::all();
//     return view('admin.createProducte')->with(['categories'=> $categories]);
// })->name('productecreateview');

// Route::post('/admin/productes/create', [ProductesController::class, 'store'])->name('productecreate');


Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => ['auth:sanctum']], function () {

    // Comanda
    Route::get('/admin/comandes/{id}', function($id) {
        $comanda = Comanda::find($id);
        $estadosPosibles = ['Rebut','En preparacio','Llest per recollir'];
        return view('admin.updateComanda')->with(['comanda' => $comanda, 'estats' => $estadosPosibles]);
    })->name('comanda');

    Route::patch('/admin/comandes/{id}', [ComandesController::class, 'update'])->name('comandaupdate');


    // Product
    Route::get('/admin/producte/{id}', function($id) {
        $producte = Product::find($id);
        $categories = Categoria::all();
        return view('admin.updateProducte')->with(['producte' => $producte, 'categories'=> $categories]);
    })->name('producte');

    Route::patch('/admin/producte/{id}', [ProductesController::class, 'update'])->name('producteupdate');

    Route::delete('/admin/productes/{id}', function($id) {
        Product::destroy($id);
        $productes = Product::all();
        return view('admin.productes')->with('productes', $productes);
    })->name('productedestroy');

    Route::get('/admin/productes/create', function() {
        $categories = Categoria::all();
        return view('admin.createProducte')->with(['categories'=> $categories]);
    })->name('productecreateview');

    Route::post('/admin/productes/create', [ProductesController::class, 'store'])->name('productecreate');


});

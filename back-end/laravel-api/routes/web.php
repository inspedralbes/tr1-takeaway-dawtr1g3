<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ComandesController;
use App\Http\Controllers\ProductesController;
use App\Models\Categoria;
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
    $estadosPosibles = ['Rebut','En preparacio','Llest per recollir'];
    return view('admin.updateComanda')->with(['comanda' => $comanda, 'estats' => $estadosPosibles]);
})->name('comanda');

Route::patch('/admin/comandes/{id}', [ComandesController::class, 'update'])->name('comandaupdate');

//productes
Route::get('/admin/productes', function() {
    $productes = Product::all();
    return view('admin.productes')->with('productes', $productes);
})->name('productes');

Route::get('/admin/producte/{id}', function($id) {
    $producte = Product::find($id);
    $categories = Categoria::all();
    return view('admin.updateProducte')->with(['producte' => $producte, 'categories'=> $categories]);
})->name('producte');

Route::patch('/admin/producte/{id}', [ProductesController::class, 'update'])->name('producteupdate');

Route::delete('/admin/productes/{id}', function($id) {
    Product::destroy($id);
    return view('productes');
})->name('productedestroy');

Route::get('/admin/productes/create', function() {
    $categories = Categoria::all();
    return view('admin.createProducte')->with(['categories'=> $categories]);
})->name('productecreateview');

Route::post('/admin/productes/create', [ProductesController::class, 'store'])->name('productecreate');

//categories
Route::get('/admin/categories',function(){
    $categories = Categoria::all();
    return view('admin.categories')->with('categories', $categories);
})->name('categories');

Route::get('/admin/categoria/{id}', function($id) {
    $categoria = Categoria::find($id);
    return view('admin.updateCategoria')->with(['categoria' => $categoria]);
})->name('categoria');

Route::patch('/admin/categoria/{id}', [CategoriesController::class, 'update'])->name('categoriaupdate');

Route::get('/admin/categories/create', function() {
    return view('admin.createCategoria');
})->name('categoriacreateview');

Route::post('/admin/categories/create', [CategoriesController::class, 'store'])->name('categoriacreate');

Route::get('/', function () {
    return view('welcome');
});

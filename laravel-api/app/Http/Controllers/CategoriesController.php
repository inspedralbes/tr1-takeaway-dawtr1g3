<?php

namespace App\Http\Controllers;
use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{

    public function update(Request $request, string $id)
    {
        $categoria = Categoria::find($id);
        $categoria->update($request->all());
        return $categoria;
    }

    public function destroy(string $id)
    {
        return Categoria::destroy($id);
    }

    public function search(string $nom)
    {
        return Categoria::where('nom', 'like', '%'.$nom.'%')->get();
    }
}

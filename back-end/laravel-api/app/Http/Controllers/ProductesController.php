<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Categoria;
use Illuminate\Support\Facades\Validator;

class ProductesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Product::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nom' => 'required',
            'descripcio' => 'required',
            'preu' => 'required',
            'categoria_id' => 'required'
        ]);

        if ($validator->fails()) {
            return 'error';
        } else {
            $product = new Product;
            $product->nom = $request->nom;
            $product->descripcio = $request->descripcio;
            $product->preu = $request->preu;
            $product->categoria_id = $request->categoria_id;
            $product->imatge = null;
            if ($request->hasFile('imatge')) {
                $imatgePath = $request->file('imatge')->storeAs('/img', $request->file('imatge')->getClientOriginalName());
                $image = $request->file('imatge');
                $imageName = $image->getClientOriginalName();
                $image->move(public_path('img'), $imageName);
                $product->imatge = $imatgePath;
            }
            $product->save();

            return redirect()->route('productes');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::find($id);
        return $product;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::find($id);

        $product->nom = $request->nom;
        $product->descripcio = $request->descripcio;
        $product->preu = $request->preu;
        $product->categoria_id = $request->categoria_id;
        if ($request->hasFile('imatge')) {
            $imatgePath = $request->file('imatge')->storeAs('/img', $request->file('imatge')->getClientOriginalName());
            $image = $request->file('imatge');
            $imageName = $image->getClientOriginalName();
            $image->move(public_path('img'), $imageName);
            $product->imatge = $imatgePath;
        }
        $product->update();

        return redirect()->route('productes');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return Product::destroy($id);
    }

    public function search(string $nom)
    {
        return Product::where('nom', 'like', '%' . $nom . '%')->get();
    }
}

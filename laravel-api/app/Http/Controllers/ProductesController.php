<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Categoria;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;


class ProductesController extends Controller
{
    public function index(){
        return Product::all();
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'nom' => 'required',
            'preu' => 'required',
            'categoria_id' =>'required'
        ]);

        if ($validator->fails()) {
            return 'error';
        }else{
            $product = new Product;
            $product->nom = $request->nom;
            $product->preu = $request->preu;
            $product->categoria_id = $request->categoria_id;
            $product->save();
            return $product;
        }
    }

}

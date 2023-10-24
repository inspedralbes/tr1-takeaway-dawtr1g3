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
            'categoria' =>'required'
        ]);

        if ($validator->fails()) {
            return 'No es pot guardar aquesta categoria perquè ja existeix';
        }else{
            $user = Product::create($request->all());
            return $user;
        }
    }

}

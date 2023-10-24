<?php

namespace App\Http\Controllers;
use App\Models\Categoria;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index(){
        return Categoria::all();
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'nom' => 'required|unique:categories,nom',
        ]);

        if ($validator->fails()) {
            return 'error';
        }else{
            $categoria = Categoria::create($request->all());
            return $categoria;
        }
    }
}

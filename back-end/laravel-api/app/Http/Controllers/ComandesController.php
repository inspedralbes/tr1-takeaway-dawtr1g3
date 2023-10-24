<?php

namespace App\Http\Controllers;
use App\Models\Comanda;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class ComandesController extends Controller
{

    public function store(Request $request){

        $validator = Validator::make($request->all(),[
            'total' => 'required',
        ]);
        if ($validator->fails()) {
            return 'error';
        }else{
            $comanda = Comanda::create($request->all());
            return $comanda;
        }

    }
    public function update(Request $request, $id){
        $validator = Validator::make($request->all(),[
            'estat'=> 'required',
        ]);
        if ($validator->fails()) {
            return 'error';
        }else{
            $comanda = Comanda::find($id);
            $comanda->update($request->all());
            return $comanda;
        }
    }
}

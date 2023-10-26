<?php

namespace App\Http\Controllers;
use App\Models\Comanda;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class ComandesController extends Controller
{

    public function index(){
        return Comanda::all();
    }

    public function store(Request $request){

        $dades = json_decode($request->getContent(), true);
        $total = $dades[1]["total"];

        $comanda = Comanda::create([
            'total'=> $total,
        ]);

        return redirect()->action([LineaComandesController::class, 'store']);
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

    public function show($id){
        $comanda = Comanda::find($id);
        return $comanda;
    }

    public function search($id){
        return Comanda::where('id', 'like', '%'.$id.'%')->get();
    }
}

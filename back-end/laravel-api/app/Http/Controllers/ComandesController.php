<?php

namespace App\Http\Controllers;
use App\Models\Comanda;
use Illuminate\Http\Request;

class ComandesController extends Controller
{

    public function index(){
        return Comanda::all();
    }

    public function store(Request $request){

        $dades = json_decode($request->getContent(), true);
        $user = $dades[1]["usuari"];
        $total = $dades[0]["total"];

        $comanda = new Comanda;
        $comanda->total = $total;
        $comanda->usuari = $user;
        $comanda->save();

        $comandaID = $comanda->id;

        return response()->json(['comandaID' => $comandaID]);
    }

    public function update(Request $request, $id){
        $comanda = Comanda::find($id);
        $comanda->update($request->all());

        return redirect()->route('comandes');
    }

    public function show($id){
        $comanda = Comanda::find($id);

        return response()->json(['comanda' => $comanda]);
    }

    public function search($id){
        return Comanda::where('id', 'like', '%'.$id.'%')->get();
    }
}

<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Lineadecomanda;
use Illuminate\Support\Facades\Validator;

class LineaComandesController extends Controller
{
    
    public function index()
    {
        return Lineadecomanda::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'id_comanda' => 'required',
            'id_producte' => 'required',
            'nom_producte' => 'required',
            'desc_producte' => 'required',
            'quantitat' => 'required',
            'preu' => 'required',
        ]);
        if ($validator->fails()) {
            return 'error';
        }else{
            $lineacomanda = new Lineadecomanda;
            $lineacomanda->id_comanda = $request->id_comanda;
            $lineacomanda->id_producte = $request->id_producte;
            $lineacomanda->nom_producte = $request->nom_producte;
            $lineacomanda->desc_producte = $request->desc_producte;
            $lineacomanda->quantitat = $request->quantitat;
            $lineacomanda->preu = $request->preu;
            $lineacomanda->save();
            return $lineacomanda;
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

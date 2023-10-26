<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Lineadecomanda;

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
        $dades = json_decode($request->getContent(), true);
        $comandaID = $dades[1]["idComanda"];
        $items = $dades[0]["items"];

        foreach ($items as $item) {
            $lineacomanda = new Lineadecomanda;
            $lineacomanda->id_comanda = $comandaID;
            $lineacomanda->id_producte = $item['id'];
            $lineacomanda->nom_producte = $item['nom'];
            $lineacomanda->desc_producte = $item['descripcio'];
            $lineacomanda->quantitat = $item['counter'];
            $lineacomanda->preu = $item['preu'];
            $lineacomanda->save();
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

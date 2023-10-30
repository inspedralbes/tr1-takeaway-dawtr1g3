<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Lineadecomanda;
use PDF;

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
        $usuari = $dades[2]["usuari"];

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
        return redirect()->action([LineaComandesController::class, 'getpdf'])->with('dades',$dades);
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

    public function getpdf(){
        $data = Lineadecomanda::where('id_comanda',1)->get();
        $pdf = PDF::loadView('pdf', compact('dades'));
        return $pdf->stream('invoice.pdf');
    }
}

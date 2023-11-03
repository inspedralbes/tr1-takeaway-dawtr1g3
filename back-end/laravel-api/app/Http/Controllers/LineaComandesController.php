<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Lineadecomanda;
use PDF;
use Illuminate\Support\Facades\Mail;
use App\Mail\Correu;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

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
        $dades["codiQR"] =  base64_encode(QrCode::format('svg')->size(150)->errorCorrection('H')->generate($comandaID,));

        foreach ($items as $item) {
            $lineacomanda = new Lineadecomanda;
            $lineacomanda->id_comanda = $comandaID;
            $lineacomanda->id_producte = $item['id'];
            $lineacomanda->nom_producte = $item['nom'];
            $lineacomanda->desc_producte = $item['descripcio'];
            $lineacomanda->imatge_producte = $item['imatge'];
            $lineacomanda->quantitat = $item['counter'];
            $lineacomanda->preu = $item['preu'];
            $lineacomanda->save();
        }

        $pdf = PDF::loadView('pdf',compact('dades'));
        Mail::to($dades[2]["usuari"]["email"])->send(new Correu($dades,$pdf));

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

    public function getLineasPorIdComanda($comandaID)
    {
        $lineas = Lineadecomanda::where('id_comanda', $comandaID)->get();
        return response()->json(['items' => $lineas]);
    }
}

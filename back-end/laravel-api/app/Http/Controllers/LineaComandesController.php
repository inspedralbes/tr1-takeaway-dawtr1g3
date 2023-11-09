<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Lineadecomanda;
use App\Models\Product;
use App\Models\Comanda;
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
        $dades["codiQR"] =  base64_encode(QrCode::format('svg')->size(150)->errorCorrection('H')->generate($comandaID));
        $comanda= Comanda::find($comandaID);
        $productes = [];
        $total = 0;

        foreach ($items as $item) {
            $producte = Product::find($item['id']);
            $lineacomanda = new Lineadecomanda;
            $lineacomanda->id_comanda = $comandaID;
            $lineacomanda->id_producte = $producte['id'];
            $lineacomanda->nom_producte = $producte['nom'];
            $lineacomanda->desc_producte = $producte['descripcio'];
            $lineacomanda->imatge_producte = $producte['imatge'];
            $lineacomanda->quantitat = $item['counter'];
            $lineacomanda->preu = $producte['preu'];
            $lineacomanda->save();
            $productes[] = $lineacomanda;
            $total += $item['preu'] * $item['counter'];
        }

        $comanda->total = $total;
        $comanda->update();
        $pdf = PDF::loadView('pdf',compact('dades','productes','total'));
        Mail::to($dades[2]["usuari"]["email"])->send(new Correu($dades,$pdf,$total));

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

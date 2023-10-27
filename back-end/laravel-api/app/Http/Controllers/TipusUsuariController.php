<?php

namespace App\Http\Controllers;

use App\Models\tipusUsuari;
use Illuminate\Http\Request;


class TipusUsuariController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        tipusUsuari::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $tipusUsuari = new tipusUsuari;
        $tipusUsuari->fill($request->all());
        $tipusUsuari->save();

        return $tipusUsuari;
    }

    /**
     * Display the specified resource.
     */
    public function show(tipusUsuari $tipusUsuari)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, tipusUsuari $tipusUsuari)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(tipusUsuari $tipusUsuari)
    {
        //
    }
}

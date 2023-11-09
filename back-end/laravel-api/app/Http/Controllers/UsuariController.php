<?php

namespace App\Http\Controllers;

use App\Models\usuari;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UsuariController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return usuari::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[

            'nom'=> 'required',
            'cognoms'=> 'required',
            'email'=> 'required',
            'contrasenya'=> 'required',
            'tipus'=> 'required'
        ]);
        if ($validator->fails()) {
            return 'error';
        }else{
            $user = new usuari;
            $user->nom = $request->nom;
            $user->cognoms = $request->cognoms;
            $user->email = $request->email;
            $user->contrasenya = encrypt($request->contrasenya);
            $user->tipus = $request->tipus;
            $user->save();
            return $user;
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(usuari $usuari)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $correu)
    {
        
        $validator = Validator::make($request->all(),[
            'email'=> 'required'
        ]);
        if ($validator->fails()) {
            return $request->all();
        }else{
            $usuari = usuari::where('email',$correu)->get();
            $usuari->update($request->all());
            return $usuari;
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(usuari $usuari)
    {
        //
    }

    public function validar(Request $request){
        $validator = Validator::make($request->all(),[
            'email'=> 'required|email'
        ]);
    }
}

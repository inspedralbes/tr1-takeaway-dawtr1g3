<?php

namespace App\Http\Controllers;

use App\Models\usuari;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

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

            return redirect()->route('users');
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
    public function update(Request $request, string $id)
    {
        $usuari = usuari::find($id);

        $usuari->tipus = $request->tipus;
        $usuari->update();

        return redirect()->route('users');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(usuari $usuari)
    {
        //
    }

    public function validar(Request $request){
        $datos = $request->json()->all();

        $usuari = $datos['usuari'];
        $loginActive = $datos['loginActive'];

        if ($loginActive == 'true'){
            $userDB = usuari::where('email', $usuari['email'])->first();
            if ($userDB == null) {
                $data = [
                    'error'=> 1,
                    'missatge'=> 'Usuari no existent, comproba que el teu email sigui el mateix que per iniciar sessió!!'
                ];
                return response()->json(['data'=> $data]);
            } else {
                if (!Hash::check($usuari['contrasenya'], $userDB->contrasenya)) {
                    $data = [
                        'error'=> 1,
                        'missatge'=> 'Usuari existent, comproba que la teva contrasenya sigui la mateixa que per iniciar sessió!!'
                    ];
                    return response()->json(['data'=> $data]);
                } else {
                    $data = [
                        'error'=> 0
                    ];
                    return response()->json(['data'=> $data]);
                }
            }
        } else {
            $userDB = usuari::where('email', $usuari['email'])->first();
            if ($userDB == null) {
                $data = [
                    'error'=> 0
                ];
                return response()->json(['data'=> $data]);
            } else {
                $data = [
                    'error'=> 1,
                    'missatge' => 'Ja existeix un usuari fent servir aquest email, INICIAR SESSIÓ si tens un compte o utilitza un altre email!'
                ];
                return response()->json(['data'=> $data]);
            }
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\usuari;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    public function register(Request $request) {
        $fields = $request -> validate([
            'nom' => 'required|string',
            'cognoms'=> 'required|string',
            'email'=> 'required|string',
            'contrasenya'=> 'required|string'
        ]);

        $existUsuari = usuari::where('email', $fields['email'])->first();

        if ($existUsuari) {
            $data = [
                'error' => 1,
                'missatge' => 'Aquest usuari ja existeix.'
            ];

            return response()->json(['data' => $data]);
        }

        $usuari = usuari::create([
            'nom' => $fields['nom'],
            'cognoms'=> $fields['cognoms'],
            'email'=> $fields['email'],
            'contrasenya'=> bcrypt($fields['contrasenya']),
        ]);

        $data =  [
            'error' => 0,
            'missatge' => 'Usuari creat amb éxit! Ja pots iniciar sessió!'
        ];

        return response()->json(['data' => $data]);
    }

    public function login(Request $request) {
        $fields = $request -> validate([
            'email'=> 'required|string',
            'contrasenya'=> 'required|string'
        ]);

        //Check email
        $usuari = usuari::where('email', $fields['email'])->first();

        // Check password
        if (!$usuari || !Hash::check($fields['contrasenya'], $usuari->contrasenya)) {
            $data = [
                'error'=> 1,
                'missatge'=> 'Credencials incorrectes!!'
            ];

            return response()->json(['data'=> $data]);
        }


        $token = $usuari->createToken($usuari->email)->plainTextToken;

        $data =  [
            'error' => 0,
            'token' => $token
        ];

        return response()->json(['data'=> $data]);
    }

    public function logout(Request $request) {
        auth()->user()->tokens()->delete();

        return [
            'message' => 'Sessió Tancada'
        ];
    }


}

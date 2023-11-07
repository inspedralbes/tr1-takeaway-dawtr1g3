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
            'email'=> 'required|string|unique:usuari,email',
            'contrasenya'=> 'required|string'
        ]);

        $existUsuari = usuari::where('email', $fields['email'])->first();

        if ($existUsuari) {
            $data = [
                'missatge' => 'Aquest usuari ja existeix.'
            ];

            return response()->json($data);
        }

        $usuari = usuari::create([
            'nom' => $fields['nom'],
            'cognoms'=> $fields['cognoms'],
            'email'=> $fields['email'],
            'contrasenya'=> bcrypt($fields['contrasenya']),
        ]);

        $token = $usuari->createToken('$usuari->email')->plainTextToken;

        $data =  [
            'user' => $usuari,
            'token' => $token
        ];

        return response()->json($data);
    }

    public function login(Request $request) {
        $fields = $request -> validate([
            'email'=> 'required|string',
            'contrasenya'=> 'required|string'
        ]);

        //Check email
        $usuari = usuari::where('email', $fields['email'])->first();


        echo 'Contraseña proporcionada: ' . ($fields['contrasenya']);
        echo 'Contraseña en la base de datos: ' . $usuari->contrasenya;
        echo 'Email base de datos'. $usuari->email;

        // Check password
        if (!$usuari || !Hash::check($fields['contrasenya'], $usuari->contrasenya)) {
            return response([
                'message' => 'Credencials incorrectes'
            ], 401);
        }

        $token = $usuari->createToken('myapptoken')->plainTextToken;

        $response =  [
            'user' => $usuari,
            'token' => $token
        ];

        return response($response, 201);
    }

    public function logout(Request $request) {
        auth()->user()->tokens()->delete();

        return [
            'message' => 'Sessió Tancada'
        ];
    }


}

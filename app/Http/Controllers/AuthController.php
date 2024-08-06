<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = validator($request->all(), [
            'nom' => ['required','string','max:255'],
            'prenom' => ['required','string','max:255'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required','string','min:8'],

        ]);
        if($validator->fails()){
            return response()->json([
                'error' => $validator->errors(),
            ], 400);
        }


        $user = User::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'admin',
        ]);
        if(!$user){
            return response()->json([
                'error' => 'Unable to create user',
            ], 500);
        }

        // auth()->login($user);
        // return response()->json([
        //     'user' => $user,
        //    'message' => 'User created successfully',
        // ], 201);


        return response()->json([
            'user' => $user,
           'message' => 'User created successfully',
        ], 201);
    }

    // login

    public function login(Request $request)
    {
        $validator = validator($request->all(), [
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);
        if ($validator->fails()) {
            return response()->json([
                "success" => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $credentials = $request->only('email', 'password');
        $token = auth()->attempt($credentials);
        if (!$token) {
            return response()->json([
                "success" => false,
                'message' => 'Informations de connexion invalides'
            ], 401);
        }

        $user = auth()->user();
        return response()->json([
            "success" => true,
            'access_token' => $token,
            'token_type' => 'Bearer',
            'user' => $user,
            'expires_in' => env('JWT_TTL') * 60 . " Seconds",
        ], 200);
    }}

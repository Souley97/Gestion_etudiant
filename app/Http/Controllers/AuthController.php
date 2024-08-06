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
}

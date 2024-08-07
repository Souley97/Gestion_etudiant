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
            'email' => ['required', 'email', 'string'],
            'password' => ['required', 'string'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
            ], 422);
        }

        $credentials = $request->only(['email', 'password']);

        if (!$token = auth()->guard('api')->attempt($credentials)) {
            return response()->json([
                'message' => 'Invalid login credentials',
            ], 401);
        }

        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'user' => auth()->guard('api')->user(),
            'expires_in' => auth()->guard('api')->factory()->getTTL() * 60,
        ]);
    }
    // logout
    public function logout()
    {
        auth()->guard('api')->logout();

        return response()->json([
            'message' => 'Successfully logged out',
        ], 200);
    }
    // refresh token
    public function refresh()
    {
        return response()->json([
            'access_token' => auth()->guard('api')->refresh(),
            'token_type' => 'bearer',
            'expires_in' => auth()->guard('api')->factory()->getTTL() * 60,
        ]);
    }



}

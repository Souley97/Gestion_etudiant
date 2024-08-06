<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EtudiantController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// register
Route::post('/register', [AuthController::class,'register']);

// login
Route::post('/login', [AuthController::class,'login']);

// refresh token
Route::post('/refresh', [AuthController::class,'refresh']);


// middleware authenticated

    Route::post('/logout', [AuthController::class,'logout']);

    //apiressource
    Route::apiResource('etudiants', EtudiantController::class);



// logout

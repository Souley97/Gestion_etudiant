<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\EvaluationController;

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
Route::middleware('auth:api')->group(function () {

    //logout
    Route::post('/logout', [AuthController::class,'logout']);
    Route::get('/etudiants/trash', [EtudiantController::class,'trashed']);

    //apiressource Etudiants
    Route::apiResource('etudiants', EtudiantController::class);

    // evaluations
// showNotes
    Route::get('/etudiants/notes/{etudiantId}', [EtudiantController::class,'showNotes']);

    Route::post('/evaluations/note/{etudiantId}/{matiereId}', [EvaluationController::class,'storeNote']);


    //apiressource
    Route::apiResource('evaluations', EvaluationController::class)->only('update', 'index', 'destroy','show');


});


// trashed


// logout

<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEtudiantRequest;
use App\Http\Requests\UpdateEtudiantRequest;
use App\Models\Etudiant;

class EtudiantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Voir la liste de tous les étudiants déjà ajoutés
        $etudiants = Etudiant::all();
        return $this->customJsonResponse("Liste des etudiant", $etudiants);

    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEtudiantRequest $request)
    {
        // Ajouter un nouvel étudiant à la base de données avec aupload image

        $etudiant = new Etudiant();
        $etudiant->fill($request->all());

        // image
        if ($request->hasFile('photo')) {
            $imageName = time().'.'.$request->photo->getClientOriginalExtension();
            $request->photo->move(public_path('images'), $imageName);
            $etudiant->photo = $imageName;
        }

        $etudiant->save();

        return $this->customJsonResponse("Etudiant créé avec succès", $etudiant);




    }

    /**
     * Display the specified resource.
     */
    public function show(Etudiant $etudiant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Etudiant $etudiant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEtudiantRequest $request, Etudiant $etudiant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Etudiant $etudiant)
    {
        //
    }
}

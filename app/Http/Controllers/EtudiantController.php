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
    public function show($id)
    {
        // Voir un étudiant déjà ajouté
        $etudiant = Etudiant::find($id);

        if (!$etudiant) {
            return $this->customJsonResponse("Etudiant inconnu", [], 404);
        }

        return $this->customJsonResponse("Etudiant", $etudiant);

    }

    /**
     * Show the form for editing the specified resource.
     */

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEtudiantRequest $request, $id)
    {
        // validator
        $validator = $request->validated();

        // Vérifier si l'étudiant existe
        $etudiant = Etudiant::find($id);

        if (!$etudiant) {
            return $this->customJsonResponse("Etudiant inconnu", [], 404);
        }




     // Vérifier si l'image est-elle modifiée

        $etudiant->fill($request->all());

        // image
        if ($request->hasFile('photo')) {
            $imageName = time().'.'.$request->photo->getClientOriginalExtension();
            $request->photo->move(public_path('images'), $imageName);
            $etudiant->photo = $imageName;
        }

        $etudiant->save();

        return $this->customJsonResponse("Etudiant modifié avec succès", $etudiant);

         }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Vérifier si l'étudiant existe
        $etudiant = Etudiant::find($id);

        if (!$etudiant) {
            return $this->customJsonResponse("Etudiant inconnu", [], 404);
        }

        // Supprimer l'étudiant
        $etudiant->delete();

        return $this->customJsonResponse("Etudiant supprimé avec succès",  200);

    }
    // trashed
    public function trashed(){
        $etudiants = Etudiant::onlyTrashed()->get();
        return $this->customJsonResponse("Liste des étudiants supprimés", $etudiants);
    }

    // voire les notes d'un etudiant
    public function showNotes($id){
        $etudiant = Etudiant::find($id);
        if (!$etudiant) {
            return $this->customJsonResponse("Etudiant inconnu", [], 404);
        }
        $notes = $etudiant->notes;
        return $this->customJsonResponse("Notes de l'étudiant", $notes);

}
}

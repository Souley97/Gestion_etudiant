<?php

namespace App\Http\Controllers;

use App\Models\Matiere;
use App\Models\Etudiant;
use App\Models\Evaluation;
use Illuminate\Http\Request;
use App\Http\Requests\StoreEvaluationRequest;
use App\Http\Requests\UpdateEvaluationRequest;

class EvaluationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Voir la liste de toutes les évaluations déjà créées
        $evaluations = Evaluation::all();
        return $this->customJsonResponse("Liste des evaluations", $evaluations);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        // Ajouter note pour un élève



    }
    // Ajouter note pour un élève (la note est entre 0-20)
    public function storeNote($etudiantId, $matiereId, StoreEvaluationRequest $request)
    {
        // Vérifier si l'élève et la matière existent
        $etudiant = Etudiant::find($etudiantId);
        $matiere = Matiere::find($matiereId);

        if (!$etudiant ||!$matiere) {
            return $this->customJsonResponse("Élève ou matière inconnu", [], 404);
        }

        // Créer une nouvelle évaluation pour l'élève et la matière
        $evaluation = new Evaluation();
        $evaluation->date = now();
        $evaluation->value = $request->value;
        $evaluation->etudiant_id = $etudiantId;
        $evaluation->matiere_id = $matiereId;
        $evaluation->save();

        return $this->customJsonResponse("Évaluation créée avec succès", $evaluation);
    }



    /**
     * Display the specified resource.
     */
    public function show(Evaluation $evaluation)
    {
        // Voir une évaluation déjà créée
        return $this->customJsonResponse("Évaluation", $evaluation);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Evaluation $evaluation)
    {
        // Modifier note pour étudiant

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEvaluationRequest $request, $id)
    {
        // Vérifier si l'évaluation existe
        $evaluation = Evaluation::find($id);

        if (!$evaluation) {
            return $this->customJsonResponse("Évaluation inconnue", [], 404);
        }

        // Vérifier si l'élève et la matière existent
        $etudiant = Etudiant::find($evaluation->etudiant_id);
        $matiere = Matiere::find($evaluation->matiere_id);

        if (!$etudiant ||!$matiere) {
            return $this->customJsonResponse("Élève ou matière inconnu", [], 404);
        }

        // Modifier note pour étudiant
                $evaluation->value = $request->value;
                $evaluation->save();

        return $this->customJsonResponse("Évaluation modifiée avec succès", $evaluation);
                // Modifier note pour étudiant
                $evaluation->value = $request->value;
                $evaluation->save();

        return $this->customJsonResponse("Évaluation modifiée avec succès", $evaluation);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Vérifier si l'évaluation existe
        $evaluation = Evaluation::find($id);

        if (!$evaluation) {
            return $this->customJsonResponse("Évaluation inconnue", [], 404);
        }

        // Supprimer évaluation
        $evaluation->delete();

        return $this->customJsonResponse("Évaluation supprimée avec succès");



    }
}

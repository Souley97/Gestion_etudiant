<?php

namespace Database\Seeders;

use App\Models\Matiere;
use App\Models\Etudiant;
use App\Models\Evaluation;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EvaluationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $etudiants = Etudiant::all();
        $matieres = Matiere::all();

        foreach ($etudiants as $etudiant) {
            foreach ($matieres as $matiere) {
                Evaluation::create([
                    'date' => $faker->date(),
                    'value' => $faker->numberBetween(0, 20),
                    'etudiant_id' => $etudiant->id,
                    'matiere_id' => $matiere->id,
                ]);
            }
        }
    }

}

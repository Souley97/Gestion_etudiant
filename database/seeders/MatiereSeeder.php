<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Matiere;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MatiereSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $matieres = [
            ['libelle' => 'Algebra', 'date_debut' => Carbon::now()->subMonths(6),'ue_id' => 1, 'date_fin' => Carbon::now()->addMonths(6)],
            ['libelle' => 'Thermodynamique', 'date_debut' => Carbon::now()->subMonths(6),'ue_id' => 1, 'date_fin' => Carbon::now()->addMonths(6)],
            ['libelle' => 'Biochimie', 'date_debut' => Carbon::now()->subMonths(6), 'ue_id' => 1,'date_fin' => Carbon::now()->addMonths(6)],
            ['libelle' => 'Développement Web', 'date_debut' => Carbon::now()->subMonths(6),'ue_id' => 1, 'date_fin' => Carbon::now()->addMonths(6)],
            ['libelle' => 'Génomique', 'date_debut' => Carbon::now()->subMonths(6), 'ue_id' => 1,'date_fin' => Carbon::now()->addMonths(6)],
        ];


        foreach ($matieres as $matiere) {
            Matiere::create($matiere);
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\Ue;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ues = [
            ['libelle' => 'Analyse Mathématique', 'date_debut' => Carbon::now()->subMonths(6), 'date_fin' => Carbon::now()->addMonths(6), 'coef' => 4],
            ['libelle' => 'Physique Quantique', 'date_debut' => Carbon::now()->subMonths(6), 'date_fin' => Carbon::now()->addMonths(6), 'coef' => 3],
            ['libelle' => 'Chimie Organique', 'date_debut' => Carbon::now()->subMonths(6), 'date_fin' => Carbon::now()->addMonths(6), 'coef' => 3],
            ['libelle' => 'Programmation Web', 'date_debut' => Carbon::now()->subMonths(6), 'date_fin' => Carbon::now()->addMonths(6), 'coef' => 5],
            ['libelle' => 'Génétique', 'date_debut' => Carbon::now()->subMonths(6), 'date_fin' => Carbon::now()->addMonths(6), 'coef' => 3],
        ];

        foreach ($ues as $ue) {
            Ue::create($ue);
        }
    }
}

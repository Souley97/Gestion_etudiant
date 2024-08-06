<?php

namespace Database\Seeders;

use App\Models\Classe;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ClasseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $classes = ['Licence 1', 'Licence 2', 'Licence 3'];

        foreach ($classes as $classe) {
            Classe::create(['nom' => $classe]);
        };

    }
}

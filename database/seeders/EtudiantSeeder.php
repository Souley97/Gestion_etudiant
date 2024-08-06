<?php

namespace Database\Seeders;

use App\Models\Classe;
use App\Models\Etudiant;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EtudiantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $etudiants = [
            [
                'nom' => 'Ndiaye',
                'prenom' => 'Souleymane',
                'adresse' => ' Malika',
                'telephone' => '766657278',
                'matricule' => 'MAT202301',
                'mot_de_passe' => bcrypt('password'),
                'email' => 'jsouleymane@gmail.com',
                'photo' => 'https://example.com/photos/jean.jpg',
                'date_de_naissance' => '1999-01-15',
            ],
            [
                'nom' => 'Fall',
                'prenom' => 'Oumy',
                'adresse' => 'Medina',
                'telephone' => '70000000',
                'matricule' => 'MAT202302',
                'mot_de_passe' => bcrypt('password'),
                'email' => 'oumy@gmail.com',
                'photo' => 'https://example.com/photos/claire.jpg',
                'date_de_naissance' => '1999-05-20',
            ],
            [
                'nom' => 'Khalil',
                'prenom' => 'Amara',
                'adresse' => 'Tunis',
                'telephone' => '765432109',
                'matricule' => 'MAT202303',
                'mot_de_passe' => bcrypt('password'),
                'email' => 'amara@gmail.com',
                'photo' => 'https://example.com/photos/olivia.jpg',
                'date_de_naissance' => '1999-08-10',
            ],

        ];

        foreach ($etudiants as $etudiant) {
            Etudiant::create(array_merge($etudiant));
        }

    }
}

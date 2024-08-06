<?php

namespace Database\Factories;

use App\Models\Etudiant;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Etudiant>
 */
class EtudiantFactory extends Factory
{


    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Etudiant::class;

    public function definition(): array
    {

        return [
            'nom' => $this->faker->lastName,
            'prenom' => $this->faker->firstName,
            'adresse' => $this->faker->address,
            'telephone' => $this->faker->phoneNumber,
            'matricule' => Str::random(10),
            'mot_de_passe' => bcrypt('password'),
            'email' => $this->faker->unique()->safeEmail,
            'photo' => $this->faker->imageUrl(),
            'date_de_naissance' => $this->faker->date(),
            'classe_id' => Classe::factory(),
          ];
     }
}

<?php

namespace Database\Factories;

use App\Models\etudiant;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\etudiant>
 */
class EtudiantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = etudiant::class;
    public function definition(): array
    {
        return [
            'matricule'=>$this->faker->unique()->numberBetween(10000,20000),
            'nom'=>$this->faker->firstName,
            'prenom'=>$this->faker->lastName,
            'date_naissance'=>$this->faker->date,
            'lieu_naissance'=>$this->faker->word,
            'domaine'=>$this->faker->sentence,
            'specialite'=>$this->faker->sentence,
        ];
    }
}

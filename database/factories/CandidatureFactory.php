<?php

namespace Database\Factories;

use App\Models\Candidature;
use App\Models\OffreEmploi;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Candidature>
 */
class CandidatureFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
       return [
            'offre_emploi_id' => OffreEmploi::inRandomOrder()->first()->id,
            'user_id'         => User::where('role', 'candidat')->inRandomOrder()->first()->id,
            'prenom'          => fake()->firstName(),
            'nom'             => fake()->lastName(),
            'courriel'        => fake()->safeEmail(),
            'telephone'       => fake()->numerify('###-###-####'),
            'message'         => fake()->paragraph(),
            'cv_chemin'       => 'cvs/demo-cv-' . fake()->numberBetween(1, 5) . '.pdf',
            'cv_nom_original' => 'CV-' . fake()->lastName() . '.pdf',
            'cv_type_mime'    => 'application/pdf',
            'cv_taille'       => fake()->numberBetween(50000, 500000),
            'statut'          => fake()->randomElement(['nouvelle', 'vue', 'retenue', 'refusée']),
        ];
    }
}

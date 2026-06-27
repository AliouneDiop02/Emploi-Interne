<?php

namespace Database\Factories;

use App\Models\OffreEmploi;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<OffreEmploi>
 */
class OffreEmploiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'titre'           => fake()->jobTitle(),
            'entreprise'      => fake()->company(),
            'ville'           => fake()->randomElement([
                'Montréal', 'Québec', 'Saguenay', 'Chicoutimi',
                'Laval', 'Gatineau', 'Sherbrooke', 'Télétravail',
                'Jonquière', 'Trois-Rivières'
            ]),
            'type_emploi'     => fake()->randomElement([
                'Temps plein', 'Temps partiel', 'Contrat', 'Stage'
            ]),
            'salaire'         => fake()->numberBetween(40, 95) . ' 000 $ – ' . fake()->numberBetween(96, 120) . ' 000 $',
            'description'     => fake()->paragraphs(2, true),
            'responsabilites' => implode("\n", fake()->sentences(4)),
            'exigences'       => implode("\n", fake()->sentences(3)),
            'est_active'      => fake()->boolean(80), // 80% actives
            'date_publication'=> fake()->dateTimeBetween('-3 months', 'now'),
        ];
    }
}

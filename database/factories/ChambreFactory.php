<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Chambre>
 */
class ChambreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'type'=>fake()->name(),
            'superficie'=>fake()->randomFloat(min:40,max:100),
            'image'=>fake()->filePath(),
            'prixJour'=>fake()->randomFloat(min:15000,max:10000000),
            'prixNuit'=>fake()->randomFloat(min:10000,max:8000000),
            'Offres'=>fake()->paragraph(2),
            'reduction'=>fake()->randomFloat(min:15,max:38),
        ];
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EvenementSnack>
 */
class EvenementSnackFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'evenement' => fake()->text(),
            'Description' => fake()->text(),
            'Affiche' => fake()->filePath(),
            'prix' => fake()->randomFloat(min: 2000, max: 5000),
            'isPublier' => fake()->boolean(),
        ];
    }
}

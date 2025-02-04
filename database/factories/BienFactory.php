<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Bien>
 */
class BienFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'titre' => fake()->jobTitle(),
            'quatier' => fake()->locale(),
            'adress' => fake()->address(),
            'accessService' =>fake()->text(),
            'ImageAvant' => fake()->filePath(),
        ];
    }
}

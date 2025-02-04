<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Proprietaire>
 */
class ProprietaireFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'telephone' => fake()->phoneNumber(),
            'firstname' => fake()->firstName(),
            'lastname' => fake()->lastName(),
        ];
    }
}

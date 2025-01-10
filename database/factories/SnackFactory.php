<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Snack>
 */
class SnackFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'ambience'=>fake()->text(),
            'style'=>fake()->text(),
            'logo'=>fake()->filePath(),
            'particularite'=>fake()->text(),
            'Annulation_politique'=>fake()->text(),
            'Modification_politique'=>fake()->text(),
            'proposition_annulation_politique'=>fake()->text(),
            'parking_infos'=>fake()->text(),
        ];
    }
}

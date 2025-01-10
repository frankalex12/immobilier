<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProduitSnack>
 */
class ProduitSnackFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'produit'=>fake()->name(),
            'photo'=>fake()->filePath(),
            'prix'=>fake()->randomFloat(min:13333,max:200000000),
            'description'=>fake()->text(),
            'isPublier'=>fake()->boolean()
        ];
    }
}

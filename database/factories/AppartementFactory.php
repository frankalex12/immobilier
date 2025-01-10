<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Appartement>
 */
class AppartementFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'pieces'=>fake()->randomNumber(),
            'superficie'=>fake()->randomFloat(min:10),
            'etage'=>fake()->randomNumber(),
            'isAcenseur'=>fake()->boolean(),
            'isBalcon'=>fake()->boolean(),
            'isTerrasse'=>fake()->boolean(),
            'MontantMensuel'=>fake()->randomFloat(min:15000),
            'MontantGarantie'=>fake()->randomFloat(min:15000),
            'typeBail'=>fake()->name(),
            'PerformenceEnergie'=>fake()->text(),
            'RisqueNaturel'=>fake()->text(),
            'DebutBail'=>fake()->date(),
            'FinBail'=>fake()->date(),
            'CondRealisation'=>fake()->text(),
            'isOccupe'=>fake()->boolean(),
        ];
    }
}

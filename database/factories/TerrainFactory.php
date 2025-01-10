<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Terrain>
 */
class TerrainFactory extends Factory
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
            'superficie'=>fake()->randomFloat(),
            'orientation'=>fake()->name(),
            'topographie'=>fake()->name(),
            'NatureSol'=>fake()->text(),
            'StatusConstuctible'=>fake()->name(),
            'prix'=>fake()->randomFloat(min:1000000.0, max: 20000000000.0),
            'isNegociable'=>fake()->boolean(),
            'typeBail'=>fake()->name(),
            'performanceEnergie'=>fake()->name(),
            'risqueNaturel'=>fake()->text(),
            'isAcheter'=>fake()->boolean(),
        ];
    }
}
// $table->float('superficie');
// $table->string('orientation');
// $table->string('topographie');
// $table->text('NatureSol');
// $table->text('StatusConstuctible');
// $table->float('prix');
// $table->boolean('isNegociable');
// $table->string('typeBail');
// $table->text('performanceEnergie');
// $table->text('risqueNaturel');
// $table->boolean('isAcheter');
// $table->foreignId('bien_id')->constrained()->onDelete('cascade');

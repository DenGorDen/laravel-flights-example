<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Airplane>
 */
class AirplaneFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition(): array
    {

       /*
       *процес заповнення фейковими даними
       */

        return [
            'modeltype' => fake()->regexify('[A-Z]{2}-[0-9]{2}'),
            'capacitance' =>fake()-> numberBetween(40,60),
            'speed' =>fake()->numberBetween(520,700),

        ];

    }
}

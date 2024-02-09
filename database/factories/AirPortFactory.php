<?php

namespace Database\Factories;


use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AirPort>
 */
class AirPortFactory extends Factory
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
            'nicName'=> fake()->city(),
            'CoordinateX'=> fake()->latitude(46,52),
            'CoordinateY'=> fake()->latitude(11,33),
        ];
    }

}

<?php

namespace Database\Factories;


use Illuminate\Database\Eloquent\Factories\Factory;
use App\Http\Controllers\CalculationController;
use App\Models\Airport;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AirRoute>
 */
class AirRouteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $p1 = fake()->randomDigitNotZero(); $p2 = 0;
        while ($p2 == 0) { $p2 = fake()->randomDigitNot($p1); }
        return [
            'nameline' => fake()->numerify('AL-####'),
            'startcity'=> $p1,
            'finishcity'=>$p2,
            'distancion'=> CalculationController::distancion(Airport::find($p1),Airport::find($p2)),
            //'airplane_id'=>fake()->randomDigitNotNull(),
        ];
    }


/* */



}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Airflight>
 */
class AirflightFactory extends Factory
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
       // $d = fake()->dateTimeThisMonth();
       return [
        'nameflight' => fake()->regexify('[A-Z]{2}-[0-9]{2}'),
        'airroute_id' =>fake()-> randomDigitNotZero(),
        'airplane_id' =>fake()-> randomDigitNotZero(),
        'data' =>fake()->dateTimeThisMonth()->format('Y-m-d') ,
        'time' => fake()->time(),
        'comment'=>''

    ];
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AirPortSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */



     /**
     * це локальні дані.
     *
     * @var array<string, int, int>
     */
  protected static $airports = [
    ['Frankfurt am Main International Airport',50.02640151977539,8.54312992095947],
    ['Brussels Airport',50.90140151977539,4.48443984985352],
    ['Keflavik International Airport',63.98500061035156,-22.60560035705566],
    ['Berlin-Schonefeld International Airport',52.38000106811523,13.52250003814697],
    ['Dresden Airport',51.13280105590820,13.76720046997070],
    ['Munster Osnabruck Airport',52.13460159301758,7.68483018875122],
    ['Hamburg Airport',53.63040161132812,9.98822975158691],
    ['Tallinn Airport', 59.41329956054688,24.83279991149902],
    ['London Luton Airport',51.87469863891602,-0.36833301186562],
    ['Manchester Airport',53.35369873046875,-2.27495002746582]
    ];


    public function run(): void
    {
        for ($a=0;$a<10;$a++) {

            $b = static::$airports[$a];
            DB::table('airports')->insert([
                'nicName' => $b[0],
                'CoordinateX' => $b[1],
                'CoordinateY' => $b[2]
            ]);

        }

    }
}

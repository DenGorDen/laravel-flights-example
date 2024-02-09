<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AirPlaneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

      /**
     * це локальні дані.
     *
     * @var array<string, int, int>
     */
  protected static $airplanes = [
    ['Boeing 737-300',149,795],
    ['Boeing 737-800',189,838],
    ['Boeing 737 MAX8',178,839],
    ['Airbus A320',180,870],
    ['Boeing 747-300',467,795],
    ['Airbus A380',390,900],
    ['Boeing 777',396,890],
    ['Airbus A350', 350,903],
    ['Embraer E-170',78,890],
    ['Embraer E-195',124,890]
];

    public function run(): void
    {
        for ($a=0;$a<10;$a++) {

            $b = static::$airplanes[$a];
            DB::table('airplanes')->insert([
                'modeltype' => $b[0],
                'capacitance' => $b[1],
                'speed' => $b[2]
            ]);

        }
    }
}

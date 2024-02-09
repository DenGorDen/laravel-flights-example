<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
/**/
        $this->call([                //real data for work
           AirPortSeeder::class,
           AirPlaneSeeder::class
        ]);

       //\App\Models\AirPlane::factory(10)->create();      // не запускать fake data *дивісь вище*
       // \App\Models\AirPort::factory(10)->create();      // не запускать fake data

       // \App\Models\User::factory(10)->create();// не запускать
/**/
         \App\Models\User::factory()->create([
             'name' => 'Test SuperUser',      //user data for work
             'email' => 'test@example.com',
             'password' => 'qwerty'
         ]);

       \App\Models\Airroute::factory(10)->create(); //fake data for work
       \App\Models\Airflight::factory(30)->create(); //fake data


    }
}

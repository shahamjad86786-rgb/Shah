<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Clients;


class ClientsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('en_IN'); // Indian format

        for ($i = 0; $i < 10; $i++) {
            Clients::create([
                'first_name'         => $faker->firstName,
                'middle_name'        => $faker->optional()->firstName,
                'last_name'          => $faker->lastName,

                'father_first_name'  => $faker->firstNameMale,
                'father_middle_name' => $faker->optional()->firstName,
                'father_last_name'   => $faker->lastName,

                'email'              => $faker->unique()->safeEmail,
                'phone'              => $faker->numerify('9#########'),
                'dob'                => $faker->date('Y-m-d', '2003-01-01'),

                'aadhar'             => $faker->unique()->numerify('############'),
                'pancard'            => strtoupper($faker->bothify('?????####?')),
            ]);
        }
    }
}

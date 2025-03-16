<?php

namespace Database\Seeders;

use App\Models\Owner;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class OwnersTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            Owner::create([
                'name' => $faker->firstName,
                'surname' => $faker->lastName,
                'email' => $faker->unique()->safeEmail,
                'phone' => $faker->phoneNumber,
                'address' => $faker->address,
            ]);
        }
    }
}

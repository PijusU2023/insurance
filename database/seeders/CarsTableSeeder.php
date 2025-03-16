<?php

namespace Database\Seeders;

use App\Models\Car;
use App\Models\Owner;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class CarsTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        $owners = Owner::all();

        foreach ($owners as $owner) {
            for ($i = 0; $i < rand(1, 3); $i++) {
                Car::create([
                    'reg_number' => $faker->unique()->regexify('[A-Z]{2}[0-9]{4}[A-Z]{2}'),
                    'brand' => $faker->company,
                    'model' => $faker->word,
                    'owner_id' => $owner->id,
                ]);
            }
        }
    }
}

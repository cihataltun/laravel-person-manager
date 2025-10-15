<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TestPeopleSeeder extends Seeder
{
    public function run(): void
    {
        $people = [];
        $faker = \Faker\Factory::create('tr_TR');

        for ($i = 0; $i < 100; $i++) {
            $genders = ['male', 'female', 'other'];
            $gender = $faker->randomElement($genders);

            $people[] = [
                'name' => $faker->firstName($gender),
                'surname' => $faker->lastName(),
                'birthdate' => $faker->dateTimeBetween('-80 years', '-18 years')->format('Y-m-d'),
                'email' => $faker->unique()->safeEmail(),
                'phone' => $faker->phoneNumber(),
                'address' => $faker->address(),
                'gender' => $gender,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('people')->insert($people);
        $this->command->info('100 test kaydı başarıyla eklendi.');
    }
}

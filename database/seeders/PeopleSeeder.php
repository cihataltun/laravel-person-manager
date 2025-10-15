<?php

namespace Database\Seeders;

use App\Models\Person;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PeopleSeeder extends Seeder
{
    public function run(): void
    {
        $batchSize = 1000;
        $totalRecords = 1000000;
        $batches = ceil($totalRecords / $batchSize);

        for ($i = 0; $i < $batches; $i++) {
            $people = [];

            for ($j = 0; $j < $batchSize; $j++) {
                $people[] = $this->generatePersonData();
            }

            DB::table('people')->insert($people);

            $this->command->info("Batch " . ($i + 1) . "/{$batches} completed");
        }
    }

    private function generatePersonData(): array
    {
        $faker = \Faker\Factory::create('tr_TR');

        $genders = ['male', 'female', 'other'];
        $gender = $faker->randomElement($genders);

        return [
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
}

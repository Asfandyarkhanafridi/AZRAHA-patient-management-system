<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
class PatientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        foreach (range(1, 50) as $patient) {
            DB::table('patients')->insert([
                'name' => $faker->name(),
                'date_of_birth' => $faker->date(),
                'gender' => $faker->boolean,
                'city' => $faker->city,
                'country' => $faker->country,
                'phone' => $faker->phoneNumber,
                'email' => $faker->unique()->safeEmail,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class CurrentMedicationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        foreach (range(1, 50) as $index) {
            DB::table('current_medications')->insert([
                'patient_id' => $index,
                'medication_name' => $faker->word(),
                'dosage' => $faker->randomElement(['100mg', '200mg', '500mg']),
                'frequency' => $faker->randomElement(['Once a day', 'Twice a day', 'Thrice a day']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

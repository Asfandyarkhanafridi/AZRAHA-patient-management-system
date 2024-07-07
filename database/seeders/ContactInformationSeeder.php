<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class ContactInformationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        foreach (range(1, 50) as $index) {
            DB::table('contact_information')->insert([
                'patient_id' => $index,
                'relative_name' => $faker->name(),
                'relation' => $faker->randomElement(['Father', 'Mother', 'Spouse', 'Sibling', 'Friend']),
                'relative_phone' => $faker->phoneNumber,
                'relative_email' => $faker->unique()->safeEmail,
                'blood_group' => $faker->randomElement(['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

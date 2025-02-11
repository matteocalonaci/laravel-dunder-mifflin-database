<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class CustomerSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        $customers = [];
        for ($i = 0; $i < 50; $i++) { // Generate 50 fake customers
            $customers[] = [
                'Customer_Name' => $faker->name,
                'Contact_Number' => $faker->phoneNumber,
                'Address' => $faker->address,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('customers')->insert($customers);
    }
}

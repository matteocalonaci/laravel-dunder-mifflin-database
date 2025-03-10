<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use App\Models\User;

class CustomerSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        // Ottieni tutti gli ID degli employee
        $employeeIds = User::where('role', 'employee')->pluck('id')->toArray();

        // Crea 50 clienti fake
        $customers = [];
        for ($i = 0; $i < 50; $i++) {
            $customers[] = [
                'employee_id' => $faker->randomElement($employeeIds),
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


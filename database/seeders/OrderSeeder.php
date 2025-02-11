<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class OrderSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        // Get the IDs of employees in the Sales department
        $salesUserIds = DB::table('employees')
            ->where('ID_Department', 1) // Assuming 1 is the ID for the Sales department
            ->pluck('id'); // Get the IDs of employees in the Sales department

        // Get the count of customers and products
        $customerCount = DB::table('customers')->count();
        $productCount = DB::table('products')->count();

        $orders = [];
        for ($i = 0; $i < 100; $i++) { // Generate 100 fake orders
            $orders[] = [
                'Order_Date' => $faker->date(),
                'ID_User' => $faker->randomElement($salesUserIds), // Random employee ID from Sales department
                'ID_Customer' => $faker->numberBetween(1, $customerCount), // Random customer ID
                'ID_Product' => $faker->numberBetween(1, $productCount), // Random product ID
                'Quantity' => $faker->numberBetween(1, 20), // Random quantity between 1 and 20
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('orders')->insert($orders);
    }
}

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

        // Define the months for the last three months
        $months = [
            now()->subMonths(2)->startOfMonth(), // Inizio del mese 2 mesi fa
            now()->subMonth()->startOfMonth(),    // Inizio del mese scorso
            now()->startOfMonth()                  // Inizio del mese corrente
        ];

        $orders = [];

        // Genera esattamente 5 ordini per ciascun mese
        foreach ($months as $month) {
            for ($i = 0; $i < 3000; $i++) {
                $orders[] = [
                    'Order_Date' => $faker->dateTimeBetween('-5 years', 'now'),
                    'ID_User' => $faker->randomElement($salesUserIds), // ID dipendente casuale dal dipartimento vendite
                    'ID_Customer' => $faker->numberBetween(1, $customerCount), // ID cliente casuale
                    'ID_Product' => $faker->numberBetween(1, $productCount), // ID prodotto casuale
                    'Quantity' => $faker->numberBetween(1, 20), // Quantità casuale tra 1 e 20
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }

        // Inserisci gli ordini nel database
        DB::table('orders')->insert($orders);
    }
}

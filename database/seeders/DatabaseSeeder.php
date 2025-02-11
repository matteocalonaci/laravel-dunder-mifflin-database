<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            CustomerSeeder::class,
            SupplierSeeder::class, // Ensure this is called first
            ProductSeeder::class,
            OrderSeeder::class,
            OfficeSeeder::class,
            DepartmentSeeder::class,
            EmployeeSeeder::class,
        ]);
    }
}

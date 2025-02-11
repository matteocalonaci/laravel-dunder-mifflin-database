<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeeSeeder extends Seeder
{
    public function run()
    {
        $employees = [
            // Sales Department
            [
                'First_Name' => 'Michael',
                'Last_Name' => 'Scott',
                'ID_User' => 12, // Replace with actual user ID
                'ID_Department' => 1, // Sales
                'ID_Office' => 1, // Replace with actual office ID
                'Phone' => '123-456-7801',
                'Email' => 'michael.scott@example.com',
            ],
            [
                'First_Name' => 'Jim',
                'Last_Name' => 'Halpert',
                'ID_User' => 13,
                'ID_Department' => 1, // Sales
                'ID_Office' => 1,
                'Phone' => '123-456-7802',
                'Email' => 'jim.halpert@example.com',
            ],
            [
                'First_Name' => 'Dwight',
                'Last_Name' => 'Schrute',
                'ID_User' => 15,
                'ID_Department' => 1, // Sales
                'ID_Office' => 1,
                'Phone' => '123-456-7804',
                'Email' => 'dwight.schrute@example.com',
            ],
            [
                'First_Name' => 'Phyllis',
                'Last_Name' => 'Vance',
                'ID_User' => 3,
                'ID_Department' => 1, // Sales
                'ID_Office' => 1,
                'Phone' => '123-456-7892',
                'Email' => 'phyllis.vance@example.com',
            ],
            [
                'First_Name' => 'Stanley',
                'Last_Name' => 'Hudson',
                'ID_User' => 4,
                'ID_Department' => 1, // Sales
                'ID_Office' => 1,
                'Phone' => '123-456-7893',
                'Email' => 'stanley.hudson@example.com',
            ],
            [
                'First_Name' => 'Ryan',
                'Last_Name' => 'Howard',
                'ID_User' => 7,
                'ID_Department' => 1, // Sales
                'ID_Office' => 1,
                'Phone' => '123-456-7896',
                'Email' => 'ryan.howard@example.com',
            ],
            [
                'First_Name' => 'Andy',
                'Last_Name' => 'Bernard',
                'ID_User' => 10,
                'ID_Department' => 1, // Sales
                'ID_Office' => 1,
                'Phone' => '123-456-7899',
                'Email' => 'andy.bernard@example.com',
            ],

            // Accounting Department
            [
                'First_Name' => 'Angela',
                'Last_Name' => 'Martin',
                'ID_User' => 11,
                'ID_Department' => 2, // Accounting
                'ID_Office' => 1,
                'Phone' => '123-456-7800',
                'Email' => 'angela.martin@example.com',
            ],
            [
                'First_Name' => 'Kevin',
                'Last_Name' => 'Malone',
                'ID_User' => 1,
                'ID_Department' => 2, // Accounting
                'ID_Office' => 1,
                'Phone' => '123-456-7890',
                'Email' => 'kevin.malone@example.com',
            ],
            [
                'First_Name' => 'Oscar',
                'Last_Name' => 'Martinez',
                'ID_User' => 2,
                'ID_Department' => 2, // Accounting
                'ID_Office' => 1,
                'Phone' => '123-456-7891',
                'Email' => 'oscar.martinez@example.com',
            ],

            // Human Resources Department
            [
                'First_Name' => 'Toby',
                'Last_Name' => 'Flenderson',
                'ID_User' => 5,
                'ID_Department' => 3, // Human Resources
                'ID_Office' => 1,
                'Phone' => '123-456-7894',
                'Email' => 'toby.flenderson@example.com',
            ],

            // Customer Service Department
            [
                'First_Name' => 'Kelly',
                'Last_Name' => 'Kapoor',
                'ID_User' => 8,
                'ID_Department' => 4, // Customer Service
                'ID_Office' => 1,
                'Phone' => '123-456-7897',
                'Email' => 'kelly.kapoor@example.com',
            ],
            [
                'First_Name' => 'Meredith',
                'Last_Name' => 'Palmer',
                'ID_User' => 9,
                'ID_Department' => 4, // Supplier Relations
                'ID_Office' => 1,
                'Phone' => '123-456-7898',
                'Email' => 'meredith.palmer@example.com',
            ],

            // Quality Assurance Department
            [
                'First_Name' => 'Creed',
                'Last_Name' => 'Bratton',
                'ID_User' => 6,
                'ID_Department' => 5, // Quality Assurance
                'ID_Office' => 1,
                'Phone' => '123-456-7895',
                'Email' => 'creed.bratton@example.com',
            ],

            // Reception Department
            [
                'First_Name' => 'Pam',
                'Last_Name' => 'Beesly',
                'ID_User' => 14,
                'ID_Department' => 6, // Reception
                'ID_Office' => 1,
                'Phone' => '123-456-7803',
                'Email' => 'pam.beesly@example.com',
            ],
        ];

        DB::table('employees')->insert($employees);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentSeeder extends Seeder
{
    public function run()
    {
        $departments = [
            [
                'Department_Name' => 'Vendite',
                'ID_Office' => 1, // Replace with actual office ID
                'Number_of_Employees' => 7, // Total employees in this department
            ],
            [
                'Department_Name' => 'Contabilità',
                'ID_Office' => 1,
                'Number_of_Employees' => 3, // Total employees in this department
            ],
            [
                'Department_Name' => 'Risorse Umane',
                'ID_Office' => 1,
                'Number_of_Employees' => 1, // Total employees in this department
            ],
            [
                'Department_Name' => 'Servizio Clienti',
                'ID_Office' => 1,
                'Number_of_Employees' => 2, // Total employees in this department
            ],
            [
                'Department_Name' => 'Qualità e Sicurezza',
                'ID_Office' => 1,
                'Number_of_Employees' => 1, // Total employees in this department
            ],
            [
                'Department_Name' => 'Reception',
                'ID_Office' => 1,
                'Number_of_Employees' => 1, // Total employees in this department
            ],
            // Added Regional Manager department
            [
                'Department_Name' => 'Manager',
                'ID_Office' => 1, // You can change this if the office ID is different for the regional manager
                'Number_of_Employees' => 1, // Typically, this department would have one employee (the regional manager)
            ],
        ];

        DB::table('departments')->insert($departments);
    }
}

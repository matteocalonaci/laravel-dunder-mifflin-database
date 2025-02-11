<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // List of users for the employees
        $employees = [
            [
                'name' => 'Michael Scott',
                'email' => 'michael.scott@example.com',
                'password' => Hash::make('bestboss'),
                'role' => 'admin', // Assign admin role to Michael Scott
                'First_Name' => 'Michael',
                'Last_Name' => 'Scott',
                'ID_Department' => 1,
                'ID_Office' => 1,
                'Phone' => '123-456-7890',
            ],
            [
                'name' => 'Jim Halpert',
                'email' => 'jim.halpert@example.com',
                'password' => Hash::make('dundermifflin'),
                'role' => 'employee',
                'First_Name' => 'Jim',
                'Last_Name' => 'Halpert',
                'ID_Department' => 1,
                'ID_Office' => 1,
                'Phone' => '123-456-7891',
            ],
            [
                'name' => 'Dwight Schrute',
                'email' => 'dwight.schrute@example.com',
                'password' => Hash::make('dundermifflin'),
                'role' => 'employee',
                'First_Name' => 'Dwight',
                'Last_Name' => 'Schrute',
                'ID_Department' => 1,
                'ID_Office' => 1,
                'Phone' => '123-456-7892',
            ],
            [
                'name' => 'Phyllis Vance',
                'email' => 'phyllis.vance@example.com',
                'password' => Hash::make('dundermifflin'),
                'role' => 'employee',
                'First_Name' => 'Phyllis',
                'Last_Name' => 'Vance',
                'ID_Department' => 1,
                'ID_Office' => 1,
                'Phone' => '123-456-7893',
            ],
            [
                'name' => 'Stanley Hudson',
                'email' => 'stanley.hudson@example.com',
                'password' => Hash::make('dundermifflin'),
                'role' => 'employee',
                'First_Name' => 'Stanley',
                'Last_Name' => 'Hudson',
                'ID_Department' => 1,
                'ID_Office' => 1,
                'Phone' => '123-456-7894',
            ],
            [
                'name' => 'Ryan Howard',
                'email' => 'ryan.howard@example.com',
                'password' => Hash::make('dundermifflin'),
                'role' => 'employee',
                'First_Name' => 'Ryan',
                'Last_Name' => 'Howard',
                'ID_Department' => 1,
                'ID_Office' => 1,
                'Phone' => '123-456-7895',
            ],
            [
                'name' => 'Andy Bernard',
                'email' => 'andy.bernard@example.com',
                'password' => Hash::make('dundermifflin'),
                'role' => 'employee',
                'First_Name' => 'Andy',
                'Last_Name' => 'Bernard',
                'ID_Department' => 1,
                'ID_Office' => 1,
                'Phone' => '123-456-7896',
            ],
            [
                'name' => 'Angela Martin',
                'email' => 'angela.martin@example.com',
                'password' => Hash::make('dundermifflin'),
                'role' => 'employee',
                'First_Name' => 'Angela',
                'Last_Name' => 'Martin',
                'ID_Department' => 1,
                'ID_Office' => 1,
                'Phone' => '123-456-7897',
            ],
            [
                'name' => 'Kevin Malone',
                'email' => 'kevin.malone@example.com',
                'password' => Hash::make('dundermifflin'),
                'role' => 'employee',
                'First_Name' => 'Kevin',
                'Last_Name' => 'Malone',
                'ID_Department' => 1,
                'ID_Office' => 1,
                'Phone' => '123-456-7898',
            ],
            [
                'name' => 'Oscar Martinez',
                'email' => 'oscar.martinez@example.com',
                'password' => Hash::make('dundermifflin'),
                'role' => 'employee',
                'First_Name' => 'Oscar',
                'Last_Name' => 'Martinez',
                'ID_Department' => 1,
                'ID_Office' => 1,
                'Phone' => '123-456-7899',
            ],
            [
                'name' => 'Toby Flenderson',
                'email' => 'toby.flenderson@example.com',
                'password' => Hash::make('dundermifflin'),
                'role' => 'employee',
                'First_Name' => 'Toby',
                'Last_Name' => 'Flenderson',
                'ID_Department' => 1,
                'ID_Office' => 1,
                'Phone' => '123-456-7800',
            ],
            [
                'name' => 'Kelly Kapoor',
                'email' => 'kelly.kapoor@example.com',
                'password' => Hash::make('dundermifflin'),
                'role' => 'employee',
                'First_Name' => 'Kelly',
                'Last_Name' => 'Kapoor',
                'ID_Department' => 1,
                'ID_Office' => 1,
                'Phone' => '123-456-7801',
            ],
            [
                'name' => 'Meredith Palmer',
                'email' => 'meredith.palmer@example.com',
                'password' => Hash::make('dundermifflin'),
                'role' => 'employee',
                'First_Name' => 'Meredith',
                'Last_Name' => 'Palmer',
                'ID_Department' => 1,
                'ID_Office' => 1,
                'Phone' => '123-456-7802',
            ],
            [
                'name' => 'Creed Bratton',
                'email' => 'creed.bratton@example.com',
                'password' => Hash::make('dundermifflin'),
                'role' => 'employee',
                'First_Name' => 'Creed',
                'Last_Name' => 'Bratton',
                'ID_Department' => 1,
                'ID_Office' => 1,
                'Phone' => '123-456-7803',
            ],
            [
                'name' => 'Pam Beesly',
                'email' => 'pam.beesly@example.com',
                'password' => Hash::make('dundermifflin'),
                'role' => 'employee',
                'First_Name' => 'Pam',
                'Last_Name' => 'Beesly',
                'ID_Department' => 1,
                'ID_Office' => 1,
                'Phone' => '123-456-7804',
            ],
        ];

        // Insert users into the database
        foreach ($employees as $employeeData) {
            // Check if the user already exists
            $user = User::where('email', $employeeData['email'])->first();

            if (!$user) {
                // Create the User record
                $user = User::create([
                    'name' => $employeeData['name'],
                    'email' => $employeeData['email'],
                    'email_verified_at' => now(), // Set email_verified_at to now
                    'password' => $employeeData['password'],
                    'role' => $employeeData['role'], // Include role in user creation
                ]);

                // Create the corresponding Employee record
                Employee::create([
                    'ID_User' => $user->id, // Foreign key to users table
                    'First_Name' => $employeeData['First_Name'],
                    'Last_Name' => $employeeData['Last_Name'],
                    'ID_Department' => $employeeData['ID_Department'],
                    'ID_Office' => $employeeData['ID_Office'],
                    'Phone' => $employeeData['Phone'],
                    'Email' => $employeeData['email'], // You can use the user's email or set a different one
                ]);
            }
        }
    }
}

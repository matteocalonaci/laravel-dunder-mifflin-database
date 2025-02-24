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
                'role' => 'admin',
                'First_Name' => 'Michael',
                'Last_Name' => 'Scott',
                'ID_Department' => 7,
                'ID_Office' => 1,
                'Phone' => '123-456-7890',
                'image' => 'https://i1.sndcdn.com/artworks-000200650983-m587yu-t500x500.jpg',
                'hired_at' => '1999-01-15', // Updated hired_at date
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
                'image' => 'https://img.nbc.com/files/images/2013/11/12/jim-500x500.jpg',
                'hired_at' => '2004-03-22', // Updated hired_at date
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
                'image' => 'https://img.nbc.com/files/images/2013/11/12/dwight-500x500.jpg',
                'hired_at' => '2004-03-22', // Updated hired_at date
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
                'image' => 'https://www.brit.co/media-library/phyllis-500x500.jpg?id=21390177&width=800&quality=90',
                'hired_at' => '2000-11-03', // Updated hired_at date
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
                'image' => 'https://img.nbc.com/files/images/2013/11/12/stanley-500x500.jpg',
                'hired_at' => '1999-08-15', // Updated hired_at date
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
                'image' => 'https://media-cldnry.s-nbcnews.com/image/upload/t_fit-560w,f_auto,q_auto:best/streams/2012/June/120627/434210-120627-ent-bjnovak-vmed.jpg',
                'hired_at' => '2003-04-18', // Updated hired_at date
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
                'image' => 'https://img.nbc.com/files/images/2013/11/12/andy-500x500.jpg',
                'hired_at' => '2005-02-10', // Updated hired_at date
            ],
            [
                'name' => 'Angela Martin',
                'email' => 'angela.martin@example.com',
                'password' => Hash::make('dundermifflin'),
                'role' => 'employee',
                'First_Name' => 'Angela',
                'Last_Name' => 'Martin',
                'ID_Department' => 2,
                'ID_Office' => 1,
                'Phone' => '123-456-7897',
                'image' => 'https://img.nbc.com/files/images/2013/11/12/angela-500x500.jpg',
                'hired_at' => '2001-09-05', // Updated hired_at date
            ],
            [
                'name' => 'Kevin Malone',
                'email' => 'kevin.malone@example.com',
                'password' => Hash::make('dundermifflin'),
                'role' => 'employee',
                'First_Name' => 'Kevin',
                'Last_Name' => 'Malone',
                'ID_Department' => 2,
                'ID_Office' => 1,
                'Phone' => '123-456-7898',
                'image' => 'https://img.nbc.com/files/images/2013/11/12/kevin-500x500.jpg',
                'hired_at' => '2000-02-20', // Updated hired_at date
            ],
            [
                'name' => 'Oscar Martinez',
                'email' => 'oscar.martinez@example.com',
                'password' => Hash::make('dundermifflin'),
                'role' => 'employee',
                'First_Name' => 'Oscar',
                'Last_Name' => 'Martinez',
                'ID_Department' => 2,
                'ID_Office' => 1,
                'Phone' => '123-456-7899',
                'image' => 'https://img.nbc.com/files/images/2013/11/12/oscar-500x500.jpg',
                'hired_at' => '2004-12-02', // Updated hired_at date
            ],
            [
                'name' => 'Toby Flenderson',
                'email' => 'toby.flenderson@example.com',
                'password' => Hash::make('dundermifflin'),
                'role' => 'employee',
                'First_Name' => 'Toby',
                'Last_Name' => 'Flenderson',
                'ID_Department' => 3,
                'ID_Office' => 1,
                'Phone' => '123-456-7800',
                'image' => 'https://img.nbc.com/files/images/2013/11/12/toby-500x500.jpg',
                'hired_at' => '2003-06-18', // Updated hired_at date
            ],
            [
                'name' => 'Kelly Kapoor',
                'email' => 'kelly.kapoor@example.com',
                'password' => Hash::make('dundermifflin'),
                'role' => 'employee',
                'First_Name' => 'Kelly',
                'Last_Name' => 'Kapoor',
                'ID_Department' => 4,
                'ID_Office' => 1,
                'Phone' => '123-456-7801',
                'image' => 'https://i.pinimg.com/736x/8e/e4/26/8ee426c9225e90dd38b46e0cbb65d16d.jpg',
                'hired_at' => '2005-01-14', // Updated hired_at date
            ],
            [
                'name' => 'Meredith Palmer',
                'email' => 'meredith.palmer@example.com',
                'password' => Hash::make('dundermifflin'),
                'role' => 'employee',
                'First_Name' => 'Meredith',
                'Last_Name' => 'Palmer',
                'ID_Department' => 4,
                'ID_Office' => 1,
                'Phone' => '123-456-7802',
                'image' => 'https://img.nbc.com/files/images/2013/11/12/meredith-500x500.jpg',
                'hired_at' => '2001-10-12', // Updated hired_at date
            ],
            [
                'name' => 'Creed Bratton',
                'email' => 'creed.bratton@example.com',
                'password' => Hash::make('dundermifflin'),
                'role' => 'employee',
                'First_Name' => 'Creed',
                'Last_Name' => 'Bratton',
                'ID_Department' => 5,
                'ID_Office' => 1,
                'Phone' => '123-456-7803',
                'image' => 'https://img.nbc.com/files/images/2013/11/12/creed-500x500.jpg',
                'hired_at' => '1999-11-30', // Updated hired_at date
            ],
            [
                'name' => 'Pam Beesly',
                'email' => 'pam.beesly@example.com',
                'password' => Hash::make('dundermifflin'),
                'role' => 'employee',
                'First_Name' => 'Pam',
                'Last_Name' => 'Beesly',
                'ID_Department' => 6,
                'ID_Office' => 1,
                'Phone' => '123-456-7804',
                'image' => 'https://img.nbc.com/files/images/2013/11/12/pam-500x500.jpg',
                'hired_at' => '2005-03-15', // Updated hired_at date
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
                    'email_verified_at' => now(),
                    'password' => $employeeData['password'],
                    'role' => $employeeData['role'],
                ]);

                // Create the corresponding Employee record
                Employee::create([
                    'ID_User' => $user->id, // Foreign key to users table
                    'First_Name' => $employeeData['First_Name'],
                    'Last_Name' => $employeeData['Last_Name'],
                    'ID_Department' => $employeeData['ID_Department'],
                    'ID_Office' => $employeeData['ID_Office'],
                    'Phone' => $employeeData['Phone'],
                    'Email' => $employeeData['email'],
                    'image' => $employeeData['image'], // Now the image will be inserted
                    'hired_at' => $employeeData['hired_at'], // Added hired_at field
                ]);
            }
        }
    }
}

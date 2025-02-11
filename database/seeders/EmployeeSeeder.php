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
                'image' => 'https://i1.sndcdn.com/artworks-000200650983-m587yu-t500x500.jpg', // Sample image URL
            ],
            [
                'First_Name' => 'Jim',
                'Last_Name' => 'Halpert',
                'ID_User' => 13,
                'ID_Department' => 1, // Sales
                'ID_Office' => 1,
                'Phone' => '123-456-7802',
                'Email' => 'jim.halpert@example.com',
                'image' => 'https://img.nbc.com/files/images/2013/11/12/jim-500x500.jpg', // Sample image URL
            ],
            [
                'First_Name' => 'Dwight',
                'Last_Name' => 'Schrute',
                'ID_User' => 15,
                'ID_Department' => 1, // Sales
                'ID_Office' => 1,
                'Phone' => '123-456-7804',
                'Email' => 'dwight.schrute@example.com',
                'image' => 'https://img.nbc.com/files/images/2013/11/12/dwight-500x500.jpg', // Sample image URL
            ],
            [
                'First_Name' => 'Phyllis',
                'Last_Name' => 'Vance',
                'ID_User' => 3,
                'ID_Department' => 1, // Sales
                'ID_Office' => 1, // Replace with actual office ID
                'Phone' => '123-456-7805',
                'Email' => 'phyllis.vance@example.com',
                'image' => 'https://www.brit.co/media-library/phyllis-500x500.jpg ?id=21390177&width=800&quality=90', // Sample image URL
            ],
            [
                'First_Name' => 'Stanley',
                'Last_Name' => 'Hudson',
                'ID_User' => 4,
                'ID_Department' => 1, // Sales
                'ID_Office' => 1,
                'Phone' => '123-456-7806',
                'Email' => 'stanley.hudson@example.com',
                'image' => 'https://img.nbc.com/files/images/2013/11/12/stanley-500x500.jpg', // Sample image URL
            ],
            [
                'First_Name' => 'Toby',
                'Last_Name' => 'Flenderson',
                'ID_User' => 5,
                'ID_Department' => 2, // HR
                'ID_Office' => 1,
                'Phone' => '123-456-7807',
                'Email' => 'toby.flenderson@example.com',
                'image' => 'https://img.nbc.com/files/images/2013/11/12/toby-500x500.jpg', // Sample image URL
            ],
            [
                'First_Name' => 'Angela',
                'Last_Name' => 'Martin',
                'ID_User' => 6,
                'ID_Department' => 2, // HR
                'ID_Office' => 1,
                'Phone' => '123-456-7808',
                'Email' => 'angela.martin@example.com',
                'image' => 'https://img.nbc.com/files/images/2013/11/12/angela-500x500.jpg', // Sample image URL
            ],
            [
                'First_Name' => 'Kevin',
                'Last_Name' => 'Malone',
                'ID_User' => 7,
                'ID_Department' => 3, // Accounting
                'ID_Office' => 1,
                'Phone' => '123-456-7809',
                'Email' => 'kevin.malone@example.com',
                'image' => 'https://www.usatoday.com/gcdn/presto/2020/03/23/USAT/e5a5b857-1b2d-4313-9a60-713a36baf179-Kevin_then.jpeg?crop=1999,1999,x0,y499', // Sample image URL
            ],
            [
                'First_Name' => 'Oscar',
                'Last_Name' => 'Martinez',
                'ID_User' => 8,
                'ID_Department' => 3, // Accounting
                'ID_Office' => 1,
                'Phone' => '123-456-7810',
                'Email' => 'oscar.martinez@example.com',
                'image' => 'https://img.nbc.com/files/images/2013/11/12/oscar-500x500.jpg', // Sample image URL
            ],
            [
                'First_Name' => 'Creed',
                'Last_Name' => 'Bratton',
                'ID_User' => 9,
                'ID_Department' => 3, // Accounting
                'ID_Office' => 1,
                'Phone' => '123-456-7811',
                'Email' => 'creed.bratton@example.com',
                'image' => 'https://img.nbc.com/files/images/2013/11/12/creed-500x500.jpg', // Sample image URL
            ],
            [
                'First_Name' => 'Pam',
                'Last_Name' => 'Beesly',
                'ID_User' => 14,
                'ID_Department' => 6, // Reception
                'ID_Office' => 1,
                'Phone' => '123-456-7803',
                'Email' => 'pam.beesly@example.com',
                'image' => 'https://img.nbc.com/files/images/2013/11/12/pam-500x500.jpg', // Sample image URL
            ],
        ];

        DB::table('employees')->insert($employees);
    }
}

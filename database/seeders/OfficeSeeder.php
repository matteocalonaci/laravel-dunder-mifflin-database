<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OfficeSeeder extends Seeder
{
    public function run()
    {
        $offices = [
            [
                'Office_Name' => 'Dunder Mifflin Scranton',
                'Address' => '1725 Slough Avenue, Scranton, PA 18540',
                'Phone' => '570-555-0123', // Example phone number
            ],
        ];

        DB::table('offices')->insert($offices);
    }
}

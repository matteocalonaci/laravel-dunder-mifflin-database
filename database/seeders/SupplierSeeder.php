<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SupplierSeeder extends Seeder
{
    public function run()
    {
        $suppliers = [
            [
                'Supplier_Name' => 'W.B. Mason',
                'Contact_Info' => '1-800-123-4567',
                'Products_Offered' => 'Office supplies, furniture, and equipment',
            ],
            [
                'Supplier_Name' => 'Staples',
                'Contact_Info' => '1-800-555-0199',
                'Products_Offered' => 'Office supplies and technology',
            ],
            [
                'Supplier_Name' => 'Office Depot',
                'Contact_Info' => '1-800-123-4568',
                'Products_Offered' => 'Office supplies, furniture, and printing services',
            ],
            [
                'Supplier_Name' => 'Dunder Mifflin Paper Company',
                'Contact_Info' => '1-800-555-0123',
                'Products_Offered' => 'Paper products and office supplies',
            ],
            [
                'Supplier_Name' => 'Pratt Paper',
                'Contact_Info' => '1-800-555-0198',
                'Products_Offered' => 'Paper products',
            ],
            [
                'Supplier_Name' => 'Syracuse Paper Company',
                'Contact_Info' => '1-800-555-0197',
                'Products_Offered' => 'Paper products and office supplies',
            ],
        ];

        DB::table('suppliers')->insert($suppliers);
    }
}

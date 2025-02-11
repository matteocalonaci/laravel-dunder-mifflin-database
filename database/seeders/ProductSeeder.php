<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $products = [
            [
                'Product_Name' => 'Carta Copia Standard',
                'Quantity' => 1000,
                'ID_Supplier' => 1, // Replace with actual supplier ID
            ],
            [
                'Product_Name' => 'Carta Copia Colorata',
                'Quantity' => 500,
                'ID_Supplier' => 1,
            ],
            [
                'Product_Name' => 'Cartoncino',
                'Quantity' => 300,
                'ID_Supplier' => 2, // Replace with actual supplier ID
            ],
            [
                'Product_Name' => 'Buste',
                'Quantity' => 200,
                'ID_Supplier' => 2,
            ],
            [
                'Product_Name' => 'Blocco Note',
                'Quantity' => 150,
                'ID_Supplier' => 3, // Replace with actual supplier ID
            ],
            [
                'Product_Name' => 'Post-it',
                'Quantity' => 250,
                'ID_Supplier' => 3,
            ],
            [
                'Product_Name' => 'Inchiostro per Stampante',
                'Quantity' => 100,
                'ID_Supplier' => 4, // Replace with actual supplier ID
            ],
            [
                'Product_Name' => 'Biglietti da Visita',
                'Quantity' => 500,
                'ID_Supplier' => 4,
            ],
            [
                'Product_Name' => 'Faldoni',
                'Quantity' => 300,
                'ID_Supplier' => 5, // Replace with actual supplier ID
            ],
            [
                'Product_Name' => 'Raccoglitori',
                'Quantity' => 200,
                'ID_Supplier' => 5,
            ],
        ];

        DB::table('products')->insert($products);
    }
}

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
                'Product_Name' => 'Risma Carta A4',
                'Quantity' => 1, // 1 risma disponibile
                'ID_Supplier' => 1,
                'price' => 5.00, // Prezzo per 1 risma (500 fogli)
            ],
            [
                'Product_Name' => 'Risma Carta Colorata',
                'Quantity' => 1, // 1 risma disponibile
                'ID_Supplier' => 1,
                'price' => 6.50, // Prezzo per 1 risma (500 fogli)
            ],
            [
                'Product_Name' => 'Risma Cartoncino',
                'Quantity' => 1, // 1 risma disponibile
                'ID_Supplier' => 2,
                'price' => 7.00, // Prezzo per 1 risma (500 fogli)
            ],
            [
                'Product_Name' => 'Risma Carta Fotografica',
                'Quantity' => 1, // 1 risma disponibile
                'ID_Supplier' => 1,
                'price' => 10.00, // Prezzo per 1 risma fotografica (500 fogli)
            ],
            [
                'Product_Name' => 'Risma Carta A5',
                'Quantity' => 1, // 1 risma disponibile
                'ID_Supplier' => 2,
                'price' => 4.50, // Prezzo per 1 risma A5 (500 fogli)
            ],
            [
                'Product_Name' => 'Risma Carta A3',
                'Quantity' => 1, // 1 risma disponibile
                'ID_Supplier' => 2,
                'price' => 6.00, // Prezzo per 1 risma A3 (500 fogli)
            ],
            [
                'Product_Name' => 'Blocco Note',
                'Quantity' => 1, // 1 blocco note disponibile
                'ID_Supplier' => 3,
                'price' => 2.50, // Prezzo per 1 blocco note
            ],
            [
                'Product_Name' => 'Post-it',
                'Quantity' => 1, // 1 pacco di Post-it disponibile
                'ID_Supplier' => 3,
                'price' => 3.00, // Prezzo per pacco di Post-it
            ],
            [
                'Product_Name' => 'Faldoni',
                'Quantity' => 1, // 1 faldone disponibile
                'ID_Supplier' => 5,
                'price' => 8.00, // Prezzo per 1 faldone
            ],
            [
                'Product_Name' => 'Raccoglitori',
                'Quantity' => 1, // 1 raccoglitore disponibile
                'ID_Supplier' => 5,
                'price' => 5.50, // Prezzo per 1 raccoglitore
            ],
        ];

        DB::table('products')->insert($products);
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->engine = 'InnoDB'; // Specifica il motore
            $table->id();
            $table->string('Product_Name');
            $table->integer('Quantity');
            $table->unsignedBigInteger('ID_Supplier');
            $table->decimal('price', 10, 2); // Aggiungi la colonna 'price' con 10 cifre totali e 2 decimali
            $table->foreign('ID_Supplier')->references('id')->on('suppliers')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
}

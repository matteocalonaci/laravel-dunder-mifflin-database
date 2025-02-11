<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->engine = 'InnoDB'; // Specify the engine
            $table->id();
            $table->string('Product_Name');
            $table->integer('Quantity');
            $table->unsignedBigInteger('ID_Supplier');
            $table->foreign('ID_Supplier')->references('id')->on('suppliers')->onDelete('cascade');
            $table->timestamps();

            // Foreign keys
        });
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
}

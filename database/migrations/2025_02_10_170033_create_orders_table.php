<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id(); // This creates an 'id' column of type BIGINT UNSIGNED
            $table->date('Order_Date');
            $table->unsignedBigInteger('ID_User'); // Ensure this matches the type in employees
            $table->unsignedBigInteger('ID_Customer');
            $table->unsignedBigInteger('ID_Product');
            $table->integer('Quantity');
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('ID_User')->references('id')->on('employees')->onDelete('cascade');
            // Add other foreign keys as needed
        });
    }

    public function down()
    {
        Schema::dropIfExists('orders');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id(); // This creates an 'id' column of type BIGINT UNSIGNED
            $table->text('image')->nullable(); // Use text for the image URL
            $table->string('First_Name');
            $table->string('Last_Name');
            $table->unsignedBigInteger('ID_User'); // Foreign key to users table
            $table->unsignedBigInteger('ID_Department');
            $table->unsignedBigInteger('ID_Office');
            $table->string('Phone');
            $table->string('Email');
            $table->timestamps();

            // Define the foreign key constraint
            $table->foreign('ID_User')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('employees');
    }
}

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
            $table->string('First_Name');
            $table->string('Last_Name');
            $table->unsignedBigInteger('ID_User'); // Ensure this matches the type
            $table->unsignedBigInteger('ID_Department');
            $table->unsignedBigInteger('ID_Office');
            $table->string('Phone');
            $table->string('Email');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('employees');
    }
}

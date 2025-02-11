<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('departments', function (Blueprint $table) {
            $table->engine = 'InnoDB'; // Specify the engine
            $table->id();
            $table->string('Department_Name');
            $table->unsignedBigInteger('ID_Office'); // Ensure this is unsignedBigInteger
            $table->integer('Number_of_Employees');
            $table->timestamps();

            // Foreign keys
            $table->foreign('ID_Office')->references('id')->on('offices')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('departments');
    }
}

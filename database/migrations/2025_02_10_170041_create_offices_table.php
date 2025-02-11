<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOfficesTable extends Migration
{
    public function up()
    {
        Schema::create('offices', function (Blueprint $table) {
            $table->id();
            $table->string('Office_Name');
            $table->string('Address');
            $table->string('Phone'); // Ensure this is a string type
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('offices');
    }
}

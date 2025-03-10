<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('customers', function (Blueprint $table) {
            // Aggiungi la colonna
            $table->foreignId('employee_id')
                ->after('id') // Posiziona dopo la colonna id
                ->constrained('users') // Riferimento alla tabella users
                ->onDelete('cascade'); // Elimina i clienti se l'employee viene eliminato
        });
    }

    public function down()
    {
        Schema::table('customers', function (Blueprint $table) {
            // Rimuovi la foreign key
            $table->dropForeign(['employee_id']);

            // Rimuovi la colonna
            $table->dropColumn('employee_id');
        });
    }
};

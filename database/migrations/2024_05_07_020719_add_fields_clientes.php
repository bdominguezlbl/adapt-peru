<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //
        Schema::table('clientes', function ($table) {
            $table->integer('ruc')->unique();
            $table->string('razon_social');
        });

        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::table('clientes', function ($table) {
            $table->dropColumn('ruc');
            $table->dropColumn('razon_social');
        });
    }
};

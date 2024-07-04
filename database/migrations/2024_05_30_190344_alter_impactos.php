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
        Schema::table('impactos', function ($table) {
            $table->unsignedBigInteger('clasificacion_id')->default(1);

            // Establecer la clave foránea
            $table->foreign('clasificacion_id')->references('id')->on('clasificacion_grupos')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::table('impactos', function ($table) {
            // Eliminar la clave foránea
            $table->dropForeign(['clasificacion_id']);

            // Eliminar la columna
            $table->dropColumn('clasificacion_id');
        });
    }
};

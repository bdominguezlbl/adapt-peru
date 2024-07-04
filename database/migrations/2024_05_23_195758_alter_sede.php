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
        Schema::table('sedes', function ($table) {
            $table->unsignedBigInteger('etapa_actual')->default(1);

            // Establecer la clave foránea
            $table->foreign('etapa_actual')->references('id')->on('etapas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::table('sedes', function ($table) {
            // Eliminar la clave foránea
            $table->dropForeign(['etapa_actual']);

            // Eliminar la columna
            $table->dropColumn('etapa_actual');
        });
    }
};

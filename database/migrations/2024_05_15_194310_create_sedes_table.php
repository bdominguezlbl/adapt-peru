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
        Schema::create('sedes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('direccion');
            $table->decimal('latitud', 10, 8); // Campo para latitud (10 dígitos totales, 8 decimales)
            $table->decimal('longitud', 11, 8); // Campo para longitud (11 dígitos totales, 8 decimales)
            $table->unsignedBigInteger('riesgo_id');
            $table->foreign('riesgo_id')->references('id')->on('riesgos')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sedes');
    }
};

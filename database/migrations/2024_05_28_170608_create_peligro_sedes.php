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
        Schema::create('peligro_sedes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sede_id')->nullable();
            $table->foreign('sede_id')->references('id')->on('sedes')->onDelete('cascade');
            $table->unsignedBigInteger('peligro_fisico_id')->nullable();
            $table->foreign('peligro_fisico_id')->references('id')->on('peligro_fisicos')->onDelete('cascade');
            $table->unsignedBigInteger('peligro_year_id')->nullable();
            $table->foreign('peligro_year_id')->references('id')->on('peligro_years')->onDelete('cascade');
            $table->unsignedBigInteger('riesgo_id')->nullable();
            $table->foreign('riesgo_id')->references('id')->on('riesgos')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peligro_sedes');
    }
};

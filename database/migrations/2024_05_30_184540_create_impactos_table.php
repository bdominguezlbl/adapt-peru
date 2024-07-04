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
        Schema::create('impactos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('etapa_id')->nullable();
            $table->foreign('etapa_id')->references('id')->on('etapa_impactos')->onDelete('cascade');
            $table->unsignedBigInteger('peligro_fisico_id')->nullable();
            $table->foreign('peligro_fisico_id')->references('id')->on('peligro_fisicos')->onDelete('cascade');
            $table->unsignedBigInteger('categoria_id')->nullable();
            $table->foreign('categoria_id')->references('id')->on('categoria_impactos')->onDelete('cascade');
            $table->string('descripcion');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('impactos');
    }
};

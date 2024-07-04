<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Agregamos los siguientes campos a la tabla clientes
        /*
        'desc_actividades',
        'direccion',
        'seccion',
        'division',
        'grupo',
        'clase',
        'nombre_responsable',
        'apellido_responsable',
        'email_responsable',
        'telefono_responsable',  
        'latitud',
        'longitud'  */
        Schema::table('clientes', function ($table) {
            $table->integer('desc_actividades');
            $table->string('direccion');
            $table->unsignedBigInteger('seccion_id');
            $table->foreign('seccion_id')->references('id')->on('secciones')->onDelete('cascade');
            $table->unsignedBigInteger('division_id');
            $table->foreign('division_id')->references('id')->on('divisiones')->onDelete('cascade');
            $table->unsignedBigInteger('grupo_id');
            $table->foreign('grupo_id')->references('id')->on('grupos')->onDelete('cascade');
            $table->unsignedBigInteger('clase_id');
            $table->foreign('clase_id')->references('id')->on('clases')->onDelete('cascade');
            $table->string('nombre_responsable');
            $table->string('apellido_responsable');
            $table->string('email_responsable');
            $table->string('telefono_responsable');
            $table->decimal('latitud', 10, 8); // Campo para latitud (10 dígitos totales, 8 decimales)
            $table->decimal('longitud', 11, 8); // Campo para longitud (11 dígitos totales, 8 decimales)

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        /*
        'desc_actividades',
        'direccion',
        'seccion',
        'division',
        'grupo',
        'clase',
        'nombre_responsable',
        'apellido_responsable',
        'email_responsable',
        'telefono_responsable',  
        'latitud',
        'longitud'  */
        Schema::table('clientes', function ($table) {
            $table->dropColumn('desc_actividades');
            $table->dropColumn('direccion');
            $table->dropColumn('seccion_id');
            $table->dropColumn('division_id');
            $table->dropColumn('grupo_id');
            $table->dropColumn('clase_id');
            $table->dropColumn('nombre_responsable');
            $table->dropColumn('apellido_responsable');
            $table->dropColumn('email_responsable');
            $table->dropColumn('telefono_responsable');
            $table->dropColumn('latitud');
            $table->dropColumn('longitud');
        });
    }
};

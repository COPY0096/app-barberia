<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servicios_reservados', function (Blueprint $table) {
            $table->id(); // Utiliza autoincremento para la columna id_servicio_reservado
            $table->unsignedBigInteger('id_cita'); // Cambia a unsignedBigInteger
            $table->unsignedBigInteger('id_servicio'); // Cambia a unsignedBigInteger
            $table->timestamps();

            // Definir restricciones de clave foránea
            $table->foreign('id_cita')->references('id_cita')->on('citas')->onDelete('cascade');
            $table->foreign('id_servicio')->references('id_servicio')->on('servicios')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('servicios_reservados');
    }
};

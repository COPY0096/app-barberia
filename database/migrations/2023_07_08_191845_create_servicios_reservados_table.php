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
            $table->id('id_servicio_reservado');
            $table->unsignedBigInteger('id_cita')->nullable();
            $table->foreign('id_cita')->references('id_cita')->on('citas');
            $table->unsignedBigInteger('id_servicio')->nullable(); 
            $table->foreign('id_servicio')->references('id_servicio')->on('servicios');
            $table->timestamps();
    
            // Definir restricciones de clave foránea
            
            
        });
    }

    // public function up()
    // {
    //     Schema::create('servicios_reservados', function (Blueprint $table) {
    //         $table->integer('id_cita')->index('FK_cita');
    //         $table->integer('id_servicio')->index('FK_SR_servicio');
    //         $table->timestamps();
    //     });
    // }

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

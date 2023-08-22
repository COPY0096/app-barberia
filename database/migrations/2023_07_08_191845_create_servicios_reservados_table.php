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
            $table->unsignedBigInteger('id_cliente');
            $table->foreign('id_cliente')->references('id_cliente')->on('citas');
            $table->unsignedBigInteger('id_empleado');
            $table->foreign('id_empleado')->references('id_empleado')->on('citas');
            $table->unsignedBigInteger('id_servicio'); 
            $table->foreign('id_servicio')->references('id_servicio')->on('servicios');
            $table->index(['id_cliente', 'id_empleado', 'id_servicio']);
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

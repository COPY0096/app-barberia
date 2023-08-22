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

        if(!Schema::hasTable('servicios')){
            Schema::create('servicios', function (Blueprint $table) {
                $table->id('id_servicio');
                $table->string('nombre_servicio', 50);
                $table->string('descripcion_servicio');
                $table->decimal('precio_servicio', 6);
                $table->integer('duracion_servicio');
                $table->unsignedBigInteger('id_categoria')->nullable();
                $table->foreign('id_categoria')->references('id_categoria')->on('categoria_servicios');
                $table->timestamps();
            });
        } 




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
        Schema::dropIfExists('servicios');
    }
};

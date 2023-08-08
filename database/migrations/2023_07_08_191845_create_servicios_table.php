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
        Schema::create('servicios', function (Blueprint $table) {
            $table->increments('id_servicio');
            $table->string('nombre_servicio', 50);
            $table->string('descripcion_servicio');
            $table->decimal('precio_servicio', 6);
            $table->integer('duracion_servicio');
            $table->integer('id_categoria')->index('FK_categoria_servicio');
            $table->timestamps();
        });
    }

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

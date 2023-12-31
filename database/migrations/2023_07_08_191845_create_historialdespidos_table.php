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
        Schema::create('historialdespidos', function (Blueprint $table) {
            $table->unsignedBigInteger('id_terceros');
            $table->foreign('id_terceros')->references('id_terceros')->on('persona');
            $table->unsignedBigInteger('id_especialidad')->nullable();
            $table->foreign('id_especialidad')->references('id_especialidad')->on('especialidades');
            $table->dateTime('Fecha_contratacion')->nullable();
            $table->dateTime('Fecha_despido')->nullable();
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
        Schema::dropIfExists('historialdespidos');
    }
};

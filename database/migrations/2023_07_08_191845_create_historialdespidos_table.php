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
            $table->unsignedBigInteger('idTerceros')->nullable();
            $table->foreign('idTerceros')->references('idTerceros')->on('persona');
            $table->unsignedBigInteger('idEspecialidad')->nullable();
            $table->foreign('idEspecialidad')->references('idEspecialidad')->on('especialidad');
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

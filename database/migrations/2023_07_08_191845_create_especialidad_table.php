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
        Schema::create('especialidad', function (Blueprint $table) {
            $table->id('idEspecialidad');
            $table->unsignedBigInteger('idDepartamento')->nullable();
            $table->foreign('idDepartamento')->references('idDepartamento')->on('departamento');
            $table->string('Especialidad', 45)->nullable();
            $table->string('Descripcion', 100)->nullable();
            $table->float('Salario', 10, 0)->nullable();
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
        Schema::dropIfExists('especialidad');
    }
};

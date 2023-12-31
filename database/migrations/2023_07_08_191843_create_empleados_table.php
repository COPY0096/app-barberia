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
        Schema::create('empleados', function (Blueprint $table) {
            $table->id('id_empleado', true);
            $table->unsignedBigInteger('id_especialidad')->nullable();
            $table->foreign('id_especialidad')->references('id_especialidad')->on('especialidades');
            $table->string('nombre', 20);
            $table->string('apellido', 20);
            $table->string('celular', 30);
            $table->string('email', 50);
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
        Schema::dropIfExists('empleados');
    }
};

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
        Schema::create('horario_empleados', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('id_empleado')->index('FK_emp');
            $table->boolean('id_dia');
            $table->time('desde_hora');
            $table->time('hasta_hora');
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
        Schema::dropIfExists('horario_empleados');
    }
};

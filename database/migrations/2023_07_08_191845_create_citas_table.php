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
        Schema::create('citas', function (Blueprint $table) {
            $table->id('id_cita', true); // Cambiar a unsignedBigInteger
            $table->timestamp('fecha_creacion')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->unsignedBigInteger('id_cliente');
            $table->foreign('id_cliente')->references('id_cliente')->on('clientes');
            $table->unsignedBigInteger('id_empleado');
            $table->foreign('id_empleado')->references('id_empleado')->on('empleados');
            $table->timestamps();
            $table->boolean('cancelado')->default(false);
            $table->text('razon_de_cancelacion')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('citas');
    }
};

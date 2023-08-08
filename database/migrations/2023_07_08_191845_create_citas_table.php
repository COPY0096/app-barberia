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
            $table->integer('id_cita', true);
            $table->timestamp('fecha_creacion')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->integer('id_cliente')->index('FK_cita_cliente');
            $table->integer('id_empleado')->index('FK_cita_empleado');
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

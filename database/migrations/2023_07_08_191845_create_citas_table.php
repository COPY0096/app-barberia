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
            $table->unsignedBigInteger('id_cliente');
            $table->unsignedBigInteger('id_empleado');
            $table->timestamp('fecha_creacion')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->string('estado')->default('pendiente');
            $table->unsignedBigInteger('id_servicio');
            $table->text('razon_de_cancelacion')->nullable();
            $table->timestamps();
    
            // Definir clave primaria compuesta
            $table->primary(['id_cliente', 'id_empleado']);
    
            // Definir relaciones con otras tablas
            $table->foreign('id_servicio')->references('id_servicio')->on('servicios');
            $table->foreign('id_cliente')->references('id_cliente')->on('clientes');
            $table->foreign('id_empleado')->references('id_empleado')->on('empleados');
        });
    }
    

    public function down()
    {
        Schema::dropIfExists('citas');
    }
};

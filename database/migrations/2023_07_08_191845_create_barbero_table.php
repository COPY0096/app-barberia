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
        Schema::create('barbero', function (Blueprint $table) {
            $table->integer('idBarbero')->primary();
            $table->string('Nombre', 20)->nullable();
            $table->date('Horario')->nullable();
            $table->string('Especialidad', 45)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('barbero');
    }
};

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
        Schema::create('sucursal', function (Blueprint $table) {
            $table->integer('idSucursal')->unique('idSucursal_UNIQUE');
            $table->string('idTerceros', 45)->nullable();
            $table->string('nombre_sucursal', 45)->nullable();
            $table->boolean('estado')->nullable();
            $table->timestamps();

            $table->primary(['idSucursal']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sucursal');
    }
};

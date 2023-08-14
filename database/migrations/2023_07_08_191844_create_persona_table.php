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
        Schema::create('persona', function (Blueprint $table) {
            $table->unsignedBigInteger('idTerceros');
            $table->foreign('idTerceros')->references('idTerceros')->on('terceros');
            $table->string('Apellido', 20)->nullable();
            $table->dateTime('FechaNacimiento')->nullable();
            $table->string('Sexo', 20)->nullable();
            $table->string('Cedula', 20)->nullable();
            $table->boolean('Estado')->nullable();
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
        Schema::dropIfExists('persona');
    }
};

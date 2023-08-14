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
        
        if(!Schema::hasTable('barbero')){
            Schema::create('barbero', function (Blueprint $table) {
                $table->id('idBarbero');
                $table->string('Nombre', 20)->nullable();
                $table->date('Horario')->nullable();
                $table->string('Especialidad', 45)->nullable();
                $table->timestamps();
            });
        } 

        
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

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
        Schema::create('telefono_vs_terceros', function (Blueprint $table) {
            $table->unsignedBigInteger('id_telefono');
            $table->foreign('id_telefono')->references('id_telefono')->on('telefono');
            $table->unsignedBigInteger('id_terceros');
            $table->foreign('id_terceros')->references('id_terceros')->on('terceros');
            $table->index(['id_telefono', 'id_terceros']);
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
        Schema::dropIfExists('telefono_vs_terceros');
    }
};

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
        Schema::create('admin_barberia', function (Blueprint $table) {
            $table->integer('id_admin', true);
            $table->string('usuario', 50);
            $table->string('email', 50);
            $table->string('nombre_completo', 50);
            $table->string('password');
            $table->timestamps();

            $table->unique(['usuario', 'email'], 'usuario');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admin_barberia');
    }
};

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
        Schema::table('horario_empleados', function (Blueprint $table) {
            $table->foreign(['id_empleado'], 'FK_emp')->references(['id_empleado'])->on('empleados')->onUpdate('NO ACTION')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('horario_empleados', function (Blueprint $table) {
            $table->dropForeign('FK_emp');
        });
    }
};

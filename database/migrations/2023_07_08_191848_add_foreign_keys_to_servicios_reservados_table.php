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
        Schema::table('servicios_reservados', function (Blueprint $table) {
            $table->foreign(['id_cita'], 'FK_cita')->references(['id_cita'])->on('citas')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['id_cita'], 'FK_SR_cita')->references(['id_cita'])->on('citas')->onUpdate('NO ACTION')->onDelete('CASCADE');
            $table->foreign(['id_servicio'], 'FK_SR_servicio')->references(['id_servicio'])->on('servicios')->onUpdate('NO ACTION')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('servicios_reservados', function (Blueprint $table) {
            $table->dropForeign('FK_cita');
            $table->dropForeign('FK_SR_cita');
            $table->dropForeign('FK_SR_servicio');
        });
    }
};

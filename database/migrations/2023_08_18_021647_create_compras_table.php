<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('compras', function (Blueprint $table) {
            $table->id('id_compra');
            $table->unsignedBigInteger('id_cliente');
            $table->decimal('monto_total', 10, 2);
            $table->timestamps();
        });

        // Agregar relaciones con las tablas de clientes y productos
        Schema::table('compras', function (Blueprint $table) {
            $table->foreign('id_cliente')->references('id_cliente')->on('clientes');
        });


    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('compras');
    }
};

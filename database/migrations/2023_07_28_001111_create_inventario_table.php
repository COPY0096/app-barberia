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
        Schema::create('inventario', function (Blueprint $table) {
            $table->unsignedBigInteger('id_producto', true);
            $table->foreign('id_producto')->references('id_producto')->on('productos');
            $table->string('descripcion', 30);
            $table->string('categoria', 50);
            $table->string('proveedor');
            $table->integer('cantidad_min_stock');
            $table->integer('precio_compra');
            $table->integer('precio_venta');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventario');
    }
};

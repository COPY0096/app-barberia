<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompraProductosTable extends Migration
{
    public function up()
    {

        Schema::create('compra_productos', function (Blueprint $table) {
            $table->unsignedBigInteger('id_compra');
            $table->unsignedBigInteger('id_producto');
            $table->integer('cantidad');
            $table->decimal('precio_unitario', 10, 2); 
            $table->timestamps();

            $table->primary(['id_compra','id_producto']);
            $table->index(['id_compra','id_producto']);

            $table->foreign('id_compra')->references('id_compra')->on('compras')->onDelete('cascade');
            $table->foreign('id_producto')->references('id_producto')->on('productos')->onDelete('cascade');
        });
    
        
    }

    public function down()
    {
        Schema::dropIfExists('compra_productos');
    }


};

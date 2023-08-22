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
        Schema::create('productos', function (Blueprint $table) {
            $table->id('id_producto', true);
            $table->string('nombre', 30);
<<<<<<< HEAD
            $table->string('descripcion', 200);
=======

            $table->string('descripcion', 50);
>>>>>>> 60657667c466f84a8bea916434dfa667988f6e99
            $table->decimal('precio_unitario', 10, 2);

            $table->unsignedBigInteger('id_categoria')->nullable();
            $table->foreign('id_categoria')->references('id_categoria')->on('categoria_servicios');
            $table->boolean('status');
<<<<<<< HEAD
            $table->binary('photo')->nullable();
=======
            $table->binary('photo');

>>>>>>> 60657667c466f84a8bea916434dfa667988f6e99
            $table->timestamps();

            $table->index('id_producto');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};

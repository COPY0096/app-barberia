<?php
public function up()
    {
        Schema::create('servicios', function (Blueprint $table) {
            $table->increments('id_servicio');
            $table->string('nombre_servicio', 50);
            $table->string('descripcion_servicio');
            $table->decimal('precio_servicio', 6);
            $table->integer('duracion_servicio');
            $table->integer('id_categoria')->index('FK_categoria_servicio');
            $table->timestamps();
        });
    }
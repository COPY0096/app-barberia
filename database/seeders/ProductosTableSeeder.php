<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        DB::table('productos')->insert([
            'nombre' => 'Champú Nutritivo',
            'descripcion' => 'Champú con ingredientes naturales para cabello saludable.',
            'precio_unitario' => 286.86,
            'id_categoria' => null, // Reemplaza con la categoría correcta
            'status' => true,
            'photo' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('productos')->insert([
            'nombre' => 'Acondicionador Hidratante',
            'descripcion' => 'Acondicionador que nutre y suaviza el cabello.',
            'precio_unitario' => 219.81,
            'id_categoria' => null, // Reemplaza con la categoría correcta
            'status' => true,
            'photo' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('productos')->insert([
            'nombre' => 'Mascarilla Reparadora',
            'descripcion' => 'Mascarilla intensiva para cabello dañado y quebradizo.',
            'precio_unitario' => 329.81,
            'id_categoria' => null, // Reemplaza con la categoría correcta
            'status' => true,
            'photo' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Producto 4
        DB::table('productos')->insert([
            'nombre' => 'Aceite Capilar Revitalizante 2',
            'descripcion' => 'Aceite natural para nutrir y dar brillo al cabello.',
            'precio_unitario' => 369.43,
            'id_categoria' => null, // Reemplaza con la categoría correcta
            'status' => true,
            'photo' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Producto 5
        DB::table('productos')->insert([
            'nombre' => 'Loción Anticaspa 2',
            'descripcion' => 'Tratamiento anticaspa para un cuero cabelludo saludable.',
            'precio_unitario' => 255.82,
            'id_categoria' => null, // Reemplaza con la categoría correcta
            'status' => true,
            'photo' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Producto 6
        DB::table('productos')->insert([
            'nombre' => 'Gel para Peinado 2',
            'descripcion' => 'Gel de fijación fuerte para crear peinados duraderos.',
            'precio_unitario' => 175.92,
            'id_categoria' => null, // Reemplaza con la categoría correcta
            'status' => true,
            'photo' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Producto 7
        DB::table('productos')->insert([
            'nombre' => 'Spray Protector Térmico 2',
            'descripcion' => 'Spray que protege el cabello del calor de herramientas de styling.',
            'precio_unitario' => 286.91,
            'id_categoria' => null, // Reemplaza con la categoría correcta
            'status' => true,
            'photo' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Producto 8
        DB::table('productos')->insert([
            'nombre' => 'Cera para Modelar 2',
            'descripcion' => 'Cera moldeadora para crear estilos versátiles.',
            'precio_unitario' => 211.49,
            'id_categoria' => null, // Reemplaza con la categoría correcta
            'status' => true,
            'photo' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Producto 9
        DB::table('productos')->insert([
            'nombre' => 'Tinte Temporal de Cabello 2',
            'descripcion' => 'Tinte temporal para cambiar el color del cabello de forma temporal.',
            'precio_unitario' => 211.11,
            'id_categoria' => null, // Reemplaza con la categoría correcta
            'status' => true,
            'photo' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Producto 10
        DB::table('productos')->insert([
            'nombre' => 'Set de Cuidado Facial 2',
            'descripcion' => 'Set completo de productos para cuidado facial en el spa.',
            'precio_unitario' => 679.81,
            'id_categoria' => null, // Reemplaza con la categoría correcta
            'status' => true,
            'photo' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Producto;


class ProductoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Producto::create([
            'nombre' => 'Producto 1',
            'descripcion' => 'Descripción del producto 1',
            
            'precio' => 15.99,
        ]);

        Producto::create([
            'nombre' => 'Producto 2',
            'descripcion' => 'Descripción del producto 2',
            
            'precio' => 24.99,
        ]);

        Producto::create([
            'nombre' => 'Producto 3',
            'descripcion' => 'Descripción del producto 3',
            'precio' => 12.50,
        ]);

    }
}

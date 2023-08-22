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
            'nombre' => 'Champú Nutritivo',
            'descripcion' => 'Champú con ingredientes naturales para cabello saludable.',
            'precio' => 286.86,
        ]);
        
        Producto::create([
            'nombre' => 'Acondicionador Hidratante',
            'descripcion' => 'Acondicionador que nutre y suaviza el cabello.',
            'precio' => 219.81,
        ]);
        
        Producto::create([
            'nombre' => 'Mascarilla Reparadora',
            'descripcion' => 'Mascarilla intensiva para cabello dañado y quebradizo.',
            'precio' => 329.81,
        ]);
        
        Producto::create([
            'nombre' => 'Aceite Capilar Revitalizante',
            'descripcion' => 'Aceite natural para nutrir y dar brillo al cabello.',
            'precio' => 369.43,
        ]);
        
        Producto::create([
            'nombre' => 'Loción Anticaspa',
            'descripcion' => 'Tratamiento anticaspa para un cuero cabelludo saludable.',
            'precio' => 255.82,
        ]);
        
        Producto::create([
            'nombre' => 'Gel para Peinado',
            'descripcion' => 'Gel de fijación fuerte para crear peinados duraderos.',
            'precio' => 175.92,
        ]);
        
        Producto::create([
            'nombre' => 'Spray Protector Térmico',
            'descripcion' => 'Spray que protege el cabello del calor de herramientas de styling.',
            'precio' => 286.91,
        ]);
        
        Producto::create([
            'nombre' => 'Cera para Modelar',
            'descripcion' => 'Cera moldeadora para crear estilos versátiles.',
            'precio' => 211.49,
        ]);
        
        Producto::create([
            'nombre' => 'Tinte Temporal de Cabello',
            'descripcion' => 'Tinte temporal para cambiar el color del cabello de forma temporal.',
            'precio' => 211.11,
        ]);
        
        Producto::create([
            'nombre' => 'Set de Cuidado Facial',
            'descripcion' => 'Set completo de productos para cuidado facial en el spa.',
            'precio' => 679.81,
        ]);
        
        Producto::create([
            'nombre' => 'Aceite de Masaje Relajante',
            'descripcion' => 'Aceite aromático para masajes relajantes en el spa.',
            'precio' => 423.90,
        ]);
        
        Producto::create([
            'nombre' => 'Exfoliante Corporal',
            'descripcion' => 'Exfoliante suave para eliminar células muertas y rejuvenecer la piel.',
            'precio' => 290.58,
        ]);
        
        Producto::create([
            'nombre' => 'Crema Hidratante Corporal',
            'descripcion' => 'Crema rica en humedad para mantener la piel suave y flexible.',
            'precio' => 404.38,
        ]);
        
        Producto::create([
            'nombre' => 'Aceite Esencial de Lavanda',
            'descripcion' => 'Aceite esencial de lavanda para aromaterapia y relajación.',
            'precio' => 180.47,
        ]);
        
        Producto::create([
            'nombre' => 'Vela Aromática de Vainilla',
            'descripcion' => 'Vela aromática con aroma a vainilla para crear un ambiente relajante.',
            'precio' => 158.79,
        ]);
        
        

    }
}

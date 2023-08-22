<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cart; // Asegúrate de importar el modelo Cart si lo estás usando

class Producto extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_producto';


    protected $fillable = ['nombre', 'descripcion', 'precio_unitario', 'id_categoria', 'status', 'photo'];

}

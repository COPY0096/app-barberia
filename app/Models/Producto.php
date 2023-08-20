<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    public function carrito()
    {
        return $this->belongsToMany(Cart::class)->withPivot('quantity');
    }
    
    protected $primaryKey = 'id_producto';

    protected $fillable = ['nombre', 'descripcion', 'status', 'photo'];
}

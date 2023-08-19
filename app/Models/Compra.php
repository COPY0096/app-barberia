<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    use HasFactory;

    protected $fillable = ['id_cliente', 'monto_total'];

    // Definir la relación con los productos comprados
    public function productos()
    {
        return $this->belongsToMany(Producto::class, 'compra_productos', 'id_compra', 'id_producto')
            ->withPivot('cantidad', 'precio_unitario')
            ->withTimestamps();
    }
    

    // Definir la relación con el cliente
    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'id_cliente');
    }

    public function getTotalAttribute()
    {
        return $this->productos->sum(function ($producto) {
            return $producto->pivot->precio_unitario * $producto->pivot->cantidad;
        });
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Compra extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_compra';


    protected $fillable = ['id_compra', 'id_cliente', 'monto_total'];

    public function comprasProductos(): HasMany
    {
        return $this->hasMany(CompraProducto::class, 'id_compra','id_compra');
    }


 

    // protected $fillable = ['id_cliente', 'monto_total'];

    // Definir la relación con los productos comprados
    public function productos()
    {
        return $this->belongsToMany(Producto::class, 'compra_productos', 'id_compra', 'id_producto')
            ->withPivot('cantidad', 'precio_unitario') // Asegúrate de incluir 'precio_unitario' aquí
            ->withTimestamps();
    }
    
    

    // Definir la relación con el cliente
    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'id_cliente');
    }

    
    
}


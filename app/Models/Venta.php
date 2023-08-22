<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Venta extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_venta';


    protected $fillable = ['id_venta', 'id_cliente', 'monto_total'];

    public function ventasProductos(): HasMany
    {
        return $this->hasMany(VentaProducto::class, 'id_venta','id_venta');
    }


 

    // protected $fillable = ['id_cliente', 'monto_total'];

    // Definir la relación con los productos ventados
    public function productos()
    {
        return $this->belongsToMany(Producto::class, 'venta_productos', 'id_venta', 'id_producto')
            ->withPivot('cantidad', 'precio_unitario') // Asegúrate de incluir 'precio_unitario' aquí
            ->withTimestamps();
    }
    
    

    // Definir la relación con el cliente
    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'id_cliente');
    }


}

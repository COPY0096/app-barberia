<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompraProducto extends Model
{
    use HasFactory;

    protected $table = 'compra_productos';
    protected $primaryKey = 'id';

    protected $fillable = [ 'id', 'id_compra', 'id_producto', 'cantidad', 'precio_unitario'];



    public function producto()
    {
        return $this->belongsTo(Producto::class, 'id_producto');
    }

    public function setPrecioUnitarioAttribute($value)
    {
        $this->attributes['precio_unitario'] = $this->producto->precio_unitario;
    }



}

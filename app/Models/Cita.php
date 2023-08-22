<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Thiagoprz\EloquentCompositeKey\HasCompositePrimaryKey;
use Carbon\Carbon;

class Cita extends Model
{
    use HasFactory;

    protected $table = 'citas';
    
    protected $primaryKey = 'id_cliente'; // Elimina esta línea

    protected $dates = ['fecha_creacion'];  
    
    protected $fillable = ['id_cliente', 'id_empleado', 'fecha_creacion', 'estado', 'id_servicio', 'razon_de_cancelacion'];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'id_cliente');
    }

    public function empleado()
    {
        return $this->belongsTo(Empleado::class, 'id_empleado');
    }

    public function servicio()
    {
        return $this->belongsTo(Servicio::class, 'id_servicio');
    }

    public static $estadosCancelacion = [
        'pendiente' => 'Pendiente',
        'completada' => 'Completada',
        'cancelada' => 'Cancelada',
    ];

    
}

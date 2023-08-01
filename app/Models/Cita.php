<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_cita';

    protected $fillable = ['fecha_creacion', 'id_cliente', 'id_empleado', 'hora_de_inicio','hora_de_finalizacion','cancelado','razon_de_cancelacion'];
}

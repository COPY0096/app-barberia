<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_cliente';

    protected $fillable = ['nombre', 'apellido', 'celular', 'email_cliente'];
    
    public function citas()
    {
        return $this->hasMany(Cita::class, 'id_cliente');
    }

}

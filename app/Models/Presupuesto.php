<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presupuesto extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre_partida',
        'monto_asignado',
        'fecha_creacion',
        'user_id',
    ];
}

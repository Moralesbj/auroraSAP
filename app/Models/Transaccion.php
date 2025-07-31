<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaccion extends Model
{
    use HasFactory;

    protected $table = 'transacciones'; 

    protected $fillable = [
        'descripcion',
        'monto',
        'fecha',
        'presupuesto_id',
        'user_id',
    ];
}

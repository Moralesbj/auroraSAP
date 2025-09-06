<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaccion extends Model
{
    use HasFactory;

    //  Soluciona el problema de la tabla
    protected $table = 'transacciones';

    protected $fillable = [
        'descripcion',
        'monto',
        'fecha',
        'presupuesto_id',
        'user_id'
    ];

    public function presupuesto()
    {
        return $this->belongsTo(Presupuesto::class);
    }

    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

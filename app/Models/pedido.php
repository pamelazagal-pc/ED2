<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class pedido extends Model
{
    // Forzamos el nombre de la tabla en singular para que coincida con la migración
    protected $table = 'pedido';

    protected $fillable = [
        'platillo',
        'mesa',
        'tipoPago',
        'numeroPedido',
        'total',
    ];



}

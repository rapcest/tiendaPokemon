<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PsaPedido extends Model
{
    use HasFactory;

    protected $fillable = [
        'direccion', 'telefono', 'avatar', 'user_id', 'id_producto'
    ];
}

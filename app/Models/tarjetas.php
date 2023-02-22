<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tarjetas extends Model
{
    use HasFactory;
    protected $table = 'tarjeta';
    protected $fillable = [
        'id_usuario',
        'id_areas',
        'activo/inactivo',
        'eliminado'
    ];
}

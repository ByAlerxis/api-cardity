<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class usuarios extends Model
{
    use HasFactory;
    protected $table = 'usuarios';
    protected $fillable = [
        'nombre',
        'apellido',
        'numero_de_empleado',
        'id_tarjeta',
        'activo_inactivo',
        'eliminado',
        'timestamps'
    ];
}

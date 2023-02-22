<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class registroDeAccesos extends Model
{
    use HasFactory;
    protected $table = 'accesos';
    protected $fillable = [
        'id_usuario',
        'id_tarjeta',
        'timestamps',
        'id_areas'
    ];
}

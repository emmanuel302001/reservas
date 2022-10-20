<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservas extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_sala',
        'id_comprador',
        'cant_boletas'
    ];

    protected $hidden = [
        'updated_at',
        'created_at'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comprador extends Model
{
    use HasFactory;

    protected $fillable = [
        'identificacion',
        'nombres',
        'apellidos',
        'email'
    ];

    protected $hidden = [
        'updated_at',
        'created_at'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sala extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'cupos',
        'cupos_disp'
    ];

    protected $hidden = [
        'updated_at',
        'created_at'
    ];
}

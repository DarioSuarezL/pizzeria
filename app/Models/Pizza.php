<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pizza extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'precio',
        'imagen_url',
        'descripcion',
        'tamano_id',
        'categoria_id'
    ];
}

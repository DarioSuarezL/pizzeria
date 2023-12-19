<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    use HasFactory;

    protected $table = 'estado';

    protected $fillable = [
        'nombre',
        // Otras columnas según sea necesario
    ];

    public function ventas()
    {
        return $this->hasMany(Mapi::class, 'estado_id');
    }
}

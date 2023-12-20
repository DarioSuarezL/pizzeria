<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MetodoPago extends Model
{
    use HasFactory;
    protected $table = 'pago';

    protected $fillable = [
        'nombre',
        // Otras columnas según sea necesario
    ];

    public function ventas()
    {
        return $this->hasMany(Mapi::class, 'metodo_pago_id');
    }
}

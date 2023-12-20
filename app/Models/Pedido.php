<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    protected $fillable = ['cliente_id', 'estado_id', 'total', 'metodo_pago_id'];


    public function cliente(){
        return $this->belongsTo(Cliente::class);
    }

    public function estado(){
        return $this->belongsTo(Estado::class);
    }

    public function detalles(){
        return $this->hasMany(DetallePedido::class);
    }


}

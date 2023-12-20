<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetallePedido extends Model
{
    use HasFactory;

    protected $fillable = [
        'pedido_id',
        'pizza_id',
        'cantidad',
        'subtotal'
    ];

    public function pedido(){
        return $this->belongsTo(Pedido::class);
    }

    public function pizza(){
        return $this->belongsTo(Pizza::class);
    }

}

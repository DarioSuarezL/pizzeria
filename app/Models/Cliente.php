<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable =[
        'user_id',
        'ci_nit',
        'numeroTelf',
        'direccion'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function pedidos(){
        return $this->hasMany(Pedido::class);
    }

    public function hasCarrito(){
        return $this->pedidos()->where('estado_id', 1)->first() ?? false;
    }

}

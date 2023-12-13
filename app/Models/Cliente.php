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
}

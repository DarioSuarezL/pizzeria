<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DetallePedidoController extends Controller
{
    public function index(){
        return view('detalle_pedido.index');
    }
}

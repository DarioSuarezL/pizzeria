<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PagoController extends Controller
{
    public function create()
    {
        $user = Auth::user();
        //obtener el registro de cliente del user para obtener su telefono
        $phone = $user->cliente->numeroTelf;
        $ci=$user->cliente->ci_nit;
        $dir=$user->cliente->direccion;

        $fullName = explode(' ', $user->name);

        return view('pago.form', [
            'user' => $user,
            'ci_nit'=>$ci,
            'numeroTelf' => $phone,
            'direccion'=>$dir,
        ]);
    }
    public function transaccion(request $request)
    {
        return view('pago.form');
    }
}

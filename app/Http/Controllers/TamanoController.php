<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TamanoController extends Controller
{
    public function show()
{
    $darkMode = "libht";// Lógica para determinar si el modo oscuro está habilitado
    return view('layouts.app')->with('darkMode', $darkMode);
}
}

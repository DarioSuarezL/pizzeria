<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Pedido;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $cantUser = User::count();
        $cantAdmin = User::where('is_admin', true)->count();
        $cantClientes = Cliente::count();
        $cantCajeros = User::where('is_cajero', true)->count();

        $pizzaMasVendida = Pedido::with('detalles.pizza')
            ->get()
            ->flatMap(function ($pedido) {
                return $pedido->detalles;
            })
            ->groupBy('pizza_id')
            ->map(function ($detalles) {
                return [
                    'total_pedidos' => $detalles->sum('cantidad'),
                    'pizza' => $detalles->first()->pizza  // Suponiendo que tienes una relación 'pizza' en el modelo DetallePedido
                ];
            })
            ->sortByDesc('total_pedidos')->first();

        $pizzaMenosVendida = Pedido::with('detalles.pizza')
            ->get()
            ->flatMap(function ($pedido) {
                return $pedido->detalles;
            })
            ->groupBy('pizza_id')
            ->map(function ($detalles) {
                return [
                    'total_pedidos' => $detalles->sum('cantidad'),
                    'pizza' => $detalles->first()->pizza  // Suponiendo que tienes una relación 'pizza' en el modelo DetallePedido
                ];
            })
            ->sortBy('total_pedidos')->first();


        return view('dashboard',[
            'cantUser' => $cantUser,
            'cantClientes' => $cantClientes,
            'pizzaMasVendida' => $pizzaMasVendida,
            'pizzaMenosVendida' => $pizzaMenosVendida,
            'cantAdmin' => $cantAdmin,
            'cantCajeros' => $cantCajeros
        ]);
    }
}

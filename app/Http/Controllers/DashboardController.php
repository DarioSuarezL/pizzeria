<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Visit;
use App\Models\Pedido;
use App\Models\Cliente;
use Illuminate\Http\Request;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;

class DashboardController extends Controller
{
    public function index()
    {
        $cantUser = User::count();
        $cantAdmin = User::where('is_admin', true)->count();
        $cantClientes = Cliente::count();
        $cantCajeros = User::where('is_cajero', true)->count();
        $visits = Visit::where(['page_name' => 'dashboard'])->first();

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


        $user_month = [
            'chart_title' => 'Usuarios por mes',
            'report_type' => 'group_by_date',
            'model' => 'App\Models\User',
            'group_by_field' => 'created_at',
            'group_by_period' => 'month',
            'chart_type' => 'bar',
        ];
        $user_month_chart = new LaravelChart($user_month);

        $pedidos_month = [
            'chart_title' => 'Pedidos por mes',
            'report_type' => 'group_by_date',
            'model' => 'App\Models\Pedido',
            'group_by_field' => 'created_at',
            'group_by_period' => 'month',
            'chart_type' => 'bar',
        ];
        $pedidos_month_chart = new LaravelChart($pedidos_month);

        return view('dashboard',[
            'cantUser' => $cantUser,
            'cantClientes' => $cantClientes,
            'pizzaMasVendida' => $pizzaMasVendida,
            'pizzaMenosVendida' => $pizzaMenosVendida,
            'cantAdmin' => $cantAdmin,
            'cantCajeros' => $cantCajeros,
            'user_month_chart' => $user_month_chart,
            'pedidos_month_chart' => $pedidos_month_chart,
            'visits' => $visits,
        ]);
    }
}

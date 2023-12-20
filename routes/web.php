<?php

use App\Models\DetallePedido;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PizzaController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DetallePedidoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    // return view('welcome');
    // return redirect(route('pizzas.index'));
    return redirect(route('login'));
});

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
// ])->group(function () {
// });

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');



Route::get('/pizzas', [PizzaController::class, 'index'])
            ->name('pizzas.index')
            ->middleware('auth', 'visits');

Route::get('/pizzas/create', [PizzaController::class, 'create'])
            ->name('pizzas.create')
            ->middleware('auth');

Route::get('/pizzas/{id}/edit', [PizzaController::class, 'edit'])
            ->name('pizzas.edit')
            ->middleware('auth');

Route::delete('/pizzas/{id}/destroy', [PizzaController::class, 'destroy'])
            ->name('pizzas.destroy')
            ->middleware('auth');

Route::get('/pizzas/{id}/show', [PizzaController::class, 'show'])
            ->name('pizzas.show')->middleware('auth')
            ->middleware('auth');



Route::get('/clientes', [ClienteController::class, 'index'])
            ->name('clientes.index')
            ->middleware('auth', 'visits');

Route::delete('/clientes/{id}', [ClienteController::class, 'destroy'])
            ->name('clientes.destroy')
            ->middleware('auth');


Route::get('/search/{query}', [SearchController::class, 'index'])
            ->name('search.index')
            ->middleware('auth');


Route::get('/carrito', [DetallePedidoController::class, 'index'])
            ->name('detalle_pedido.index')
            ->middleware('auth');

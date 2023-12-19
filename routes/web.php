<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\PizzaController;
use Illuminate\Support\Facades\Route;

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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});



Route::get('/pizzas', [PizzaController::class, 'index'])
            ->name('pizzas.index')
            ->middleware('auth');

// Route::get('/pizzas/{id}', [PizzaController::class, 'show'])
//             ->name('pizzas.show')->middleware('auth')
//             ->middleware('auth');

Route::get('/pizzas/create', [PizzaController::class, 'create'])
            ->name('pizzas.create')
            ->middleware('auth');

Route::get('/pizzas/{id}/edit', [PizzaController::class, 'edit'])
            ->name('pizzas.edit')
            ->middleware('auth');

Route::delete('/pizzas/{id}', [PizzaController::class, 'destroy'])
            ->name('pizzas.destroy')
            ->middleware('auth');



Route::get('/clientes', [ClienteController::class, 'index'])
            ->name('clientes.index')
            ->middleware('auth');

Route::delete('/clientes/{id}', [ClienteController::class, 'destroy'])
            ->name('clientes.destroy')
            ->middleware('auth');

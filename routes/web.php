<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\PizzaController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConsumiServicioController;
use App\Http\Controllers\PagoController;
use App\Http\Controllers\PagoFacilCheckoutClient;

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
        // Lógica para determinar si el modo oscuro está habilitado
        $darkMode = session('darkMode', false);

        return view('dashboard', compact('darkMode'));
    })->name('dashboard');
    
});



Route::get('/pizzas', [PizzaController::class, 'index'])
            ->name('pizzas.index')
            ->middleware('auth', 'visits');

// Route::get('/pizzas/{id}', [PizzaController::class, 'show'])
//             ->name('pizzas.show')->middleware('auth')
//             ->middleware('auth');

Route::get('/pizzas/create', [PizzaController::class, 'create'])
            ->name('pizzas.create')
            ->middleware('auth', 'visits');

Route::get('/pizzas/{id}/edit', [PizzaController::class, 'edit'])
            ->name('pizzas.edit')
            ->middleware('auth', 'visits');

Route::delete('/pizzas/{id}', [PizzaController::class, 'destroy'])
            ->name('pizzas.destroy')
            ->middleware('auth');



Route::get('/clientes', [ClienteController::class, 'index'])
            ->name('clientes.index')
            ->middleware('auth', 'visits');

Route::delete('/clientes/{id}', [ClienteController::class, 'destroy'])
            ->name('clientes.destroy')
            ->middleware('auth');

Route::get('/pago',[PagoController::class, 'create'])->name('pagofacil.form')
->middleware('auth');
Route::post('/consumirServicio',[ConsumiServicioController::class, 'RecolectarDatos'])->name('/consumirServicio')
->middleware('auth');
Route::post('/generarqr',[PagoFacilCheckoutClient::class, 'Encript'])->name('/generarqr')
->middleware('auth');

Route::post('/callback', [ConsumiServicioController::class, 'UrlCallback']);
//------------------------------------------PAGOFACILCHECKOUT----------------------------------------

// esta ruta es la vista inicial, que muestra un formulario basico para datos del cliente
Route::get('PagoFacilCheckout',  [PagoFacilCheckoutClient::class, 'inicio']);

//esta ruta recibe los parametros del formulario inicial del cliente y pasa a encriptar los datos antes de enviarlos para ser procesados en PagoFacil Bolivia
Route::post('PagoFacilCheckoutEncript', [PagoFacilCheckoutClient::class, 'Encript']);


Route::get('/search/{query}', [SearchController::class, 'index'])
            ->name('search.index')
            ->middleware('auth');

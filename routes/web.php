<?php

use App\Http\Controllers\PedidoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::resource('pedidos', App\Http\Controllers\PedidoController::class);

Route::resource('figuras', App\Http\Controllers\FiguraController::class);

Route::resource('clientes', App\Http\Controllers\ClienteController::class);
Route::resource('Proveedor', App\Http\Controllers\ProveedorController::class);

Route::resource('insumos', App\Http\Controllers\InsumoController::class);

Route::get('/pedidos/{id}', [PedidoController::class, 'detalle'])->name('pedidos.detalle');


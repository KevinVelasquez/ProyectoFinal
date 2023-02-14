<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RolController;

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
Route::resource('insumos', App\Http\Controllers\InsumoController::class);
Route::put('insumos', [App\Http\Controllers\InsumoController::class, 'updateInsumos'])->name('insumos.updateInsumos');
Route::patch('insumos', [App\Http\Controllers\InsumoController::class, 'anularInsumo'])->name('insumos.anularInsumo');
Route::delete('insumos', [App\Http\Controllers\InsumoController::class, 'eliminarInsumo'])->name('insumos.eliminarInsumo');

Route::get('productos/search', [App\Http\Controllers\ProductoController::class, 'search'])->name('productos.search');
Route::delete('productos', [App\Http\Controllers\ProductoController::class, 'eliminarproducto'])->name('productos.eliminarproducto');

Route::resource('productos', App\Http\Controllers\ProductoController::class);




Route:: group(['middleware' => ['auth'] ], function(){
    Route::resource('roles', RolController::class);
    Route::resource('usuarios', UsuarioController::class);
});


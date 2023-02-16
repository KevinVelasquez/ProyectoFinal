<?php

use App\Http\Controllers\PedidoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\CalendarioController;

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
Route::put('pedidos', [PedidoController::class, 'updatePedido'])->name('pedidos.updatePedido');
Route::patch('pedidos', [PedidoController::class, 'anularPedido'])->name('pedidos.anularPedido');
Route::get('generate-pdf', [App\Http\Controllers\PDFController::class, 'generatePDF'])->name('generate-pdf');

Route::post('pedido', [App\Http\Controllers\PagoClienteController::class,'agregarAbono'])->name('agregarAbono');
Route::put('pedido', [App\Http\Controllers\PagoClienteController::class,'anularAbono'])->name('anularAbono');
Route::get('abono-pdf', [App\Http\Controllers\PDFController::class, 'abonoPDF'])->name('abono-pdf');





Route::resource('figuras', App\Http\Controllers\FiguraController::class);
Route::resource('clientes', App\Http\Controllers\ClienteController::class);
Route::resource('Proveedor', App\Http\Controllers\ProveedorController::class);
Route::resource('insumos', App\Http\Controllers\InsumoController::class);






//RUTAS CLIENTES
Route::resource('cliente',ClienteController::class)->middleware('auth');

Route::get('estadocliente',[App\Http\Controllers\ClienteController::class, 'updateStatusCliente'])->name('updateStatusCliente');

//RUTAS PROVEEDORES

Route::resource('proveedor',ProveedorController::class)->middleware('auth');

Route::get('/detalleproveedor', [App\Http\Controllers\ProveedorController::class, 'show']);

Route::get('detallefactura/pdf',[App\Http\Controllers\ProveedorController::class, 'pdf'])->name('proveedor.pdf');

Route::get('estadoproveedor',[App\Http\Controllers\ProveedorController::class, 'updateStatusProveedor'])->name('proveedor.updateStatusProveedor');
//Route::get('proveedor', [App\Http\Controllers\ProveedorController::class, 'update_status'])->name('Editar_estado_proveedor');


// RUTAS CALENDARIO

//Route::resource('calendario', [App\Http\Controllers\CalendarioController::class, 'Pindex']);

Route::resource('calendario',CalendarioController::class);




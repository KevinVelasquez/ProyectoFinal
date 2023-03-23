<?php

use App\Http\Controllers\PedidoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RolController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\ClienteController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CompraController;
use App\Http\Controllers\CalendarioController;
use App\Http\Controllers\DashboardController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
//RUTAS HOME

Route::get('/', [App\Http\Controllers\CalendarioController::class, 'index'])->middleware('auth');

Route::get('/home', [App\Http\Controllers\CalendarioController::class, 'index'])->middleware('auth');


//RUTAS KEVIN
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.request');
Route::resource('compra', App\Http\Controllers\CompraController::class)->middleware('auth');
Route::put('compra', [CompraController::class, 'updateCompra'])->name('compra.updateCompra');
Route::patch('compra', [CompraController::class, 'anularCompra'])->name('compra.anularCompra');
Route::resource('pago-proveedore', App\Http\Controllers\PagoProveedoreController::class)->middleware('auth');
Route::resource('usuario', App\Http\Controllers\UsuarioController::class)->middleware('auth');
Route::resource('/login', App\Http\Controllers\CompraController::class)->middleware('auth');
Route::post('compras', [App\Http\Controllers\PagoProveedoreController::class,'agregarAbonoCompra'])->name('agregarAbonoCompra');
Route::put('compras', [App\Http\Controllers\PagoProveedoreController::class,'anularAbonoCompra'])->name('anularAbonoCompra');
Route::patch('compras', [CompraController::class, 'anularCompra'])->name('compras.anularCompra');
Route::post('recuperarClave', [App\Http\Controllers\UsuarioController::class, 'recuperarClave'])->name('recuperarClave');
Route::resource('insumos', App\Http\Controllers\InsumoController::class);
Route::get('/VistaPefil',  [UsuarioController::class,'VistaPefil'])->name('VistaPefil')->middleware('auth');
Route::post('/EditarPerfil',  [UsuarioController::class,'EditarPerfil'])->name('EditarPerfil');
Route::get('/CambioEstado', [UsuarioController::class,'CambioEstado'])->name('CambioEstado');
Route::get('/CambioEstadoCompra', [CompraController::class,'CambioEstado'])->name('CambioEstado');
Route::get('/generarPDF', [App\Http\Controllers\CompraController::class,'generarPDF'])->name('generarPDF');
Route::post('/store', [CompraController::class,'store'])->name('store');

Auth::routes();

//RUTAS SANTIAGO
Route::resource('pedidos', App\Http\Controllers\PedidoController::class);
Route::put('pedidos', [PedidoController::class, 'updatePedido'])->name('pedidos.updatePedido');
Route::patch('pedidos', [PedidoController::class, 'anularPedido'])->name('pedidos.anularPedido');
Route::resource('pedidos', App\Http\Controllers\PedidoController::class)->middleware('auth');


Route::get('generate-pdf', [App\Http\Controllers\PdfControllerdos::class, 'generatePDF'])->name('generate-pdf');
Route::post('pedido', [App\Http\Controllers\PagoClienteController::class,'agregarAbono'])->name('agregarAbono');
Route::put('pedido', [App\Http\Controllers\PagoClienteController::class,'anularAbono'])->name('anularAbono');
Route::get('abono-pdf', [App\Http\Controllers\PdfControllerdos::class, 'abonoPDF'])->name('abono-pdf');

Route::delete('figuras', [App\Http\Controllers\FiguraController::class, 'eliminarfigura'])->name('figuras.eliminarfigura');
Route::get('figuras/search', [App\Http\Controllers\FiguraController::class, 'search'])->name('figuras.search');
Route::resource('figuras', App\Http\Controllers\FiguraController::class)->middleware('auth');

Route::get('dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard.index')->middleware('auth');





//RUTAS KELY
//RUTAS CLIENTES
Route::resource('cliente', App\Http\Controllers\ClienteController::class)->middleware('auth');
Route::resource('cliente',ClienteController::class)->middleware('auth');
Route::get('estadocliente',[App\Http\Controllers\ClienteController::class, 'updateStatusCliente'])->name('updateStatusCliente');
Route::delete('cliente', [App\Http\Controllers\ClienteController::class, 'eliminarCliente'])->name('cliente.eliminarCliente');
Route::patch('cliente', [ClienteController::class, 'inactivarCliente'])->name('cliente.inactivarCliente');

//RUTAS PROVEEDORES
Route::resource('proveedor', App\Http\Controllers\ProveedorController::class)->middleware('auth');
Route::resource('proveedor',ProveedorController::class)->middleware('auth');
Route::get('/detalleproveedor/{id}', [App\Http\Controllers\ProveedorController::class, 'mostrar'])->name('proveedor.mostrar');
Route::get('pdf',[App\Http\Controllers\PdfControllerdos::class, 'pdfdetallecompra']);
Route::get('estadoproveedor',[App\Http\Controllers\ProveedorController::class, 'updateStatusProveedor'])->name('proveedor.updateStatusProveedor');
Route::delete('proveedor', [App\Http\Controllers\ProveedorController::class, 'eliminarProveedor'])->name('proveedor.eliminarProveedor');

// RUTAS CALENDARIO
Route::resource('calendario', App\Http\Controllers\CalendarioController::class)->middleware('auth');


//RUTAS CATHE

Route::resource('insumos', App\Http\Controllers\InsumoController::class)->middleware('auth');
Route::put('insumos', [App\Http\Controllers\InsumoController::class, 'updateInsumos'])->name('insumos.updateInsumos');
Route::patch('insumos', [App\Http\Controllers\InsumoController::class, 'anularInsumo'])->name('insumos.anularInsumo');
Route::delete('insumos', [App\Http\Controllers\InsumoController::class, 'eliminarInsumo'])->name('insumos.eliminarInsumo');


Route::get('productos/search', [App\Http\Controllers\ProductoController::class, 'search'])->name('productos.search');
Route::delete('productos', [App\Http\Controllers\ProductoController::class, 'eliminarproducto'])->name('productos.eliminarproducto');
Route::resource('productos', App\Http\Controllers\ProductoController::class)->middleware('auth');

Route::delete('roles', [App\Http\Controllers\RolController::class, 'eliminarrol'])->name('roles.eliminarrol');



Route:: group(['middleware' => ['auth'] ], function(){
    Route::resource('roles', RolController::class);
    Route::resource('usuarios', UsuarioController::class);
});

?>

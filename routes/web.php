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

//RUTAS HOME

Route::get('/', function () {
    return view('welcome');
})->middleware('auth');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware('auth');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.request');
Route::resource('compra', App\Http\Controllers\CompraController::class)->middleware('auth');
Route::resource('pago-proveedore', App\Http\Controllers\PagoProveedoreController::class)->middleware('auth');
Route::resource('usuario', App\Http\Controllers\UsuarioController::class)->middleware('auth');
Route::resource('/login', App\Http\Controllers\CompraController::class)->middleware('auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('insumos', App\Http\Controllers\InsumoController::class);


Route::resource('pedidos', App\Http\Controllers\PedidoController::class);
Route::put('pedidos', [PedidoController::class, 'updatePedido'])->name('pedidos.updatePedido');
Route::patch('pedidos', [PedidoController::class, 'anularPedido'])->name('pedidos.anularPedido');
Route::get('generate-pdf', [App\Http\Controllers\PdfControllerdos::class, 'generatePDF'])->name('generate-pdf');
Route::post('pedido', [App\Http\Controllers\PagoClienteController::class,'agregarAbono'])->name('agregarAbono');
Route::put('pedido', [App\Http\Controllers\PagoClienteController::class,'anularAbono'])->name('anularAbono');
Route::post('compras', [App\Http\Controllers\PagoProveedoreController::class,'agregarAbonoCompra'])->name('agregarAbonoCompra');
Route::put('compras', [App\Http\Controllers\PagoProveedoreController::class,'anularAbono'])->name('anularAbono');
Route::patch('compras', [CompraController::class, 'anularCompra'])->name('compras.anularCompra');
Route::get('abono-pdf', [App\Http\Controllers\PdfControllerdos::class, 'abonoPDF'])->name('abono-pdf');
Route::post('recuperarClave', [App\Http\Controllers\UsuarioController::class, 'recuperarClave'])->name('recuperarClave');

Route::delete('figuras', [App\Http\Controllers\FiguraController::class, 'eliminarfigura'])->name('figuras.eliminarfigura');
Route::get('figuras/search', [App\Http\Controllers\FiguraController::class, 'search'])->name('figuras.search');
Route::resource('figuras', App\Http\Controllers\FiguraController::class);




//RUTAS CLIENTES
Route::resource('cliente',ClienteController::class)->middleware('auth');
Route::get('estadocliente',[App\Http\Controllers\ClienteController::class, 'updateStatusCliente'])->name('updateStatusCliente');





Route::get('/VistaPefil',  [UsuarioController::class,'VistaPefil'])->name('VistaPefil')->middleware('auth');
Route::post('/EditarPerfil',  [UsuarioController::class,'EditarPerfil'])->name('EditarPerfil');
Route::get('/CambioEstado', [UsuarioController::class,'CambioEstado'])->name('CambioEstado');
Route::get('/CambioEstadoCompra', [CompraController::class,'CambioEstado'])->name('CambioEstado');
Route::get('/generarPDF/{id}', [App\Http\Controllers\CompraController::class,'generarPDF'])->name('generarPDF');
Route::post('/store', [CompraController::class,'store'])->name('store');

Auth::routes();

//RUTAS PROVEEDORES

Route::resource('proveedor',ProveedorController::class)->middleware('auth');
Route::get('/detalleproveedor', [App\Http\Controllers\ProveedorController::class, 'show']);
Route::get('detallefactura/pdf',[App\Http\Controllers\ProveedorController::class, 'pdf'])->name('proveedor.pdf');
Route::get('estadoproveedor',[App\Http\Controllers\ProveedorController::class, 'updateStatusProveedor'])->name('proveedor.updateStatusProveedor');


Route::resource('calendario',CalendarioController::class);

// RUTAS AYUDA

Route::resource('ayuda',HomeController::class);





Route::resource('insumos', App\Http\Controllers\InsumoController::class);
Route::put('insumos', [App\Http\Controllers\InsumoController::class, 'updateInsumos'])->name('insumos.updateInsumos');
Route::patch('insumos', [App\Http\Controllers\InsumoController::class, 'anularInsumo'])->name('insumos.anularInsumo');
Route::delete('insumos', [App\Http\Controllers\InsumoController::class, 'eliminarInsumo'])->name('insumos.eliminarInsumo');

Route::get('productos/search', [App\Http\Controllers\ProductoController::class, 'search'])->name('productos.search');
Route::delete('productos', [App\Http\Controllers\ProductoController::class, 'eliminarproducto'])->name('productos.eliminarproducto');
Route::resource('productos', App\Http\Controllers\ProductoController::class);

Route::delete('roles', [App\Http\Controllers\RolController::class, 'eliminarrol'])->name('roles.eliminarrol');



Route:: group(['middleware' => ['auth'] ], function(){
    Route::resource('roles', RolController::class);
    Route::resource('usuarios', UsuarioController::class);
});


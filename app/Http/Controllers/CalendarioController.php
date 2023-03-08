<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;
use App\Models\Cliente;
use App\Models\DetallePedido;
use App\Models\Pago_Clientes;




class CalendarioController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function create()
    {
       
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

      $pedidos = Pedido::select('pedidos.id','pedidos.fecha_entrega','clientes.nombre','clientes.cedula','pedidos.direccion','clientes.telefono','pedidos.id_municipio','pedidos.fecha_registro','pedidos.fecha_entrega','pedidos.proceso','pedidos.id_metodo_pago','pedidos.id_metodo_entrega','pedidos.totalpedido','metodo__entregas.nombre AS nombremetodoentrega','metodo__pagos.nombre AS nombremetodopago','municipios.nombre AS municipio')->join('clientes','clientes.id','=','pedidos.id_cliente')
      ->join('metodo__entregas','metodo__entregas.id','=','pedidos.id_metodo_entrega')
      ->join('metodo__pagos','metodo__pagos.id','=','pedidos.id_metodo_pago')
      ->join('municipios','municipios.id','=','pedidos.id_municipio')

      ->get();

      $detallepedido = DetallePedido::select('detalle_pedidos.cantidad AS cantidadproductos', 'detalle_pedidos.precio AS precioUnitario', 'productos.nombre AS nombreproducto', 'detalle_pedidos.id_pedido AS id','figuras.imagen')
            ->join("productos", "detalle_pedidos.id_producto", "=", "productos.id")
            ->leftJoin("figuras", "detalle_pedidos.imagen", "=", "figuras.id")
            ->get();
           
      $abono = Pago_Clientes::select('pago__clientes.id_pedido',Pago_Clientes::raw('SUM(pago__clientes.abono) as totalabonado')) 
      ->groupBy("pago__clientes.id_pedido")
      ->get();

          

      return view('calendario.Pindex',compact('detallepedido','pedidos','abono'));







 



    }

   
}

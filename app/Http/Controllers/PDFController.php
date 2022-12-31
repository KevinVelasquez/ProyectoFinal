<?php

namespace App\Http\Controllers;
use PDF;
use App\Models\Pedido;
use App\Models\DetallePedido;
use Illuminate\Http\Request;


class PDFController extends Controller
{
    public function generatePDF()
    {
        $id = $_GET["id"];
        
        $pedidocliente = Pedido::select(
            "pedidos.fecha_registro","pedidos.fecha_entrega","pedidos.estado","pedidos.id_metodo_entrega","pedidos.id_metodo_pago","pedidos.direccion",
            "pedidos.id","pedidos.totalpedido","pedidos.proceso","pedidos.id_municipio","clientes.id AS idcliente","clientes.nombre AS nombrecliente","clientes.cedula",
            "clientes.telefono","metodo__pagos.id AS idmetodopago","metodo__pagos.nombre AS nombremetodopago","metodo__entregas.id AS idmetodoentrega",
            "metodo__entregas.nombre AS nombremetodoentrega","municipios.id AS idmunicipio","municipios.nombre AS nombremunicipio"
        )
            ->join("clientes", "pedidos.id_cliente", "=", "clientes.id")
            ->join("metodo__pagos", "pedidos.id_metodo_pago", "=", "metodo__pagos.id")
            ->join("metodo__entregas", "pedidos.id_metodo_entrega", "=", "metodo__entregas.id")
            ->join("municipios", "pedidos.id_municipio", "=", "municipios.id")
            ->where ("pedidos.id","=",$id)
            ->get();

        $detallepedido = DetallePedido::select('detalle_pedidos.cantidad AS cantidadproductos', 'detalle_pedidos.precio AS precioUnitario', 'productos.nombre AS nombreproducto', 'detalle_pedidos.id_pedido AS id')
        ->join("productos", "detalle_pedidos.id_producto", "=", "productos.id")
        ->where ("detalle_pedidos.id_pedido","=",$id)
        ->get();

        $pdf = PDF::loadView('pedido.download',compact('pedidocliente','detallepedido'));
     
        return $pdf->stream('PedidoDetalle'.$id.'.pdf');
    }
}

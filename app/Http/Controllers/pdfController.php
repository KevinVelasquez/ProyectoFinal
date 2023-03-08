<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Compra;
use App\Models\Proveedor;
use App\Models\insumo;
use App\Models\metodo_pagos;
use App\Models\Detalle_compra;
use App\Http\Controllers\App;
use App\Models\Pedido;
use App\Models\DetallePedido;
use App\Models\Pago_Clientes;
use PDF;


class PdfControllerdos extends Controller

{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function pdf(Request $request, $id)
    {
        $compra = Compra::paginate();
        $proveedor = Proveedor::all();
        $insumo = insumo::all();
        $metodo_pagos = metodo_pagos::all();
        $detalle = Detalle_compra::all();
        $detalle = [];
        if ($id != null) {
            $detalle = Detalle_compra::select("detalle_compra.*")
                ->where("detalle_compra.id_orden_compra", $id)
                ->get();
        }

        $pdf = PDF::loadView('pdf', ['compra' => $compra]);
        $pdf->loadHTML('<h1>Test</h1>');
        return $pdf->stream();

        // return view('compra.pdf', compact('compra', 'proveedor', 'insumo', 'metodo_pagos','detalle'));

    }
    public function generatePDF()
    {
        $id = $_GET["id"];

        $pedidocliente = Pedido::select(
            "pedidos.fecha_registro",
            "pedidos.fecha_entrega",
            "pedidos.estado",
            "pedidos.id_metodo_entrega",
            "pedidos.id_metodo_pago",
            "pedidos.direccion",
            "pedidos.id",
            "pedidos.totalpedido",
            "pedidos.proceso",
            "pedidos.id_municipio",
            "clientes.id AS idcliente",
            "clientes.nombre AS nombrecliente",
            "clientes.cedula",
            "clientes.telefono",
            "metodo__pagos.id AS idmetodopago",
            "metodo__pagos.nombre AS nombremetodopago",
            "metodo__entregas.id AS idmetodoentrega",
            "metodo__entregas.nombre AS nombremetodoentrega",
            "municipios.id AS idmunicipio",
            "municipios.nombre AS nombremunicipio"
        )
            ->join("clientes", "pedidos.id_cliente", "=", "clientes.id")
            ->join("metodo_pagos", "pedidos.id_metodo_pago", "=", "metodo_pagos.id")
            ->join("metodo_entregas", "pedidos.id_metodo_entrega", "=", "metodo_entregas.id")
            ->join("municipios", "pedidos.id_municipio", "=", "municipios.id")
            ->where("pedidos.id", "=", $id)
            ->get();

        $detallepedido = DetallePedido::select('detalle_pedidos.cantidad AS cantidadproductos', 'detalle_pedidos.precio AS precioUnitario', 'productos.nombre AS nombreproducto', 'detalle_pedidos.id_pedido AS id')
            ->join("productos", "detalle_pedidos.id_producto", "=", "productos.id")
            ->where("detalle_pedidos.id_pedido", "=", $id)
            ->get();


        $pdf = PDF::loadView('pedido.downloaddetalle', compact('pedidocliente', 'detallepedido'));

        return $pdf->stream('PedidoDetalle' . $id . '.pdf');
    }

    public function abonoPDF()
    {
        $idabono = $_GET["idabono"];
        $idpedido = $_GET["idpedido"];
        $fecha = $_GET["fecha"];


        $detalleabono = Pago_Clientes::select(
            'pago__clientes.id AS idabono',
            'pago__clientes.fecha',
            'pago__clientes.abono',
            "pedidos.id",
            "pedidos.totalpedido",
            'clientes.id As idcliente',
            'clientes.nombre',
            'clientes.telefono',
            'clientes.cedula'
        )
            ->join("pedidos", "pago__clientes.id_pedido", "=", "pedidos.id")
            ->join("clientes", "pedidos.id_cliente", "=", "clientes.id")
            ->where("pago__clientes.id", "=", $idabono)
            ->get();



        $acomulado = Pago_Clientes::select(Pago_Clientes::raw('SUM(pago__clientes.abono) as acomulado'))
            ->join('pedidos', 'pago__clientes.id_pedido', '=', 'pedidos.id')
            ->where('pedidos.id', $idpedido)
            ->where('pago__clientes.fecha', '<=', $fecha)
            ->where('pago__clientes.estado', 1)
            ->get();


        $pdf = PDF::loadView('pedido.downloadabono', compact('detalleabono', 'acomulado'));

        return $pdf->stream('PedidoDetalle.pdf');
    }

}

<?php

namespace App\Http\Controllers;
use App\Models\Pago_Clientes;
use App\Models\Pedido;
use App\Models\Cliente;
use App\Models\DetallePedido;
use Illuminate\Http\Request;
use DB;

class PagoClienteController extends Controller
{
    public function agregarAbono(Request $request)
    {
        $input = $request->all();
        $abono = Pago_Clientes::create([
            "id_pedido" => $input["id"],
            'fecha' => $input["fechaabono"],
            'abono' => $input["cantidadabono"],
            'id_medio_pago' => $input["medioabono"],
        ]);

        $totalabono = $this->verificarAbono($input["id"]);
        
        if ($totalabono <= 0) {
            $this->abonoCancelado($input["id"]);
        }

        $pedidos = Pedido::paginate();

        $pedido = Cliente::select("clientes.cedula", "clientes.nombre", "clientes.direccion", "clientes.telefono", "clientes.tipo_comercio", "pedidos.fecha_registro", "pedidos.fecha_entrega", "pedidos.proceso", "pedidos.id")
            ->join("pedidos", "pedidos.id_cliente", "=", "clientes.id")
            ->where("pedidos.estado", 1)
            ->get();

        $detallepedido = DetallePedido::select('detalle_pedidos.cantidad AS cantidadproductos', 'detalle_pedidos.precio AS precioUnitario', 'productos.nombre AS nombreproducto', 'detalle_pedidos.id_pedido AS id')
            ->join("productos", "detalle_pedidos.id_producto", "=", "productos.id")
            ->get();

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
            ->join("metodo__pagos", "pedidos.id_metodo_pago", "=", "metodo__pagos.id")
            ->join("metodo__entregas", "pedidos.id_metodo_entrega", "=", "metodo__entregas.id")
            ->join("municipios", "pedidos.id_municipio", "=", "municipios.id")
            ->get();


        $detalleabono = Pago_Clientes::select('pago__clientes.fecha AS fechapago', 'pago__clientes.id_medio_pago AS idmedio','pago__clientes.id_pedido AS idpedidoabono','pago__clientes.abono',
        "pedidos.totalpedido","pedidos.id",
        "medio__pagos.id as idmediopago","medio__pagos.nombre")
            ->join("pedidos", "pago__clientes.id_pedido", "=", "pedidos.id")
            ->join("medio__pagos","pago__clientes.id_medio_pago", "=", "medio__pagos.id" )
            ->where("pago__clientes.estado", 1)
            ->get();

        $editarpedido = Pedido::select(
            "clientes.cedula",
            "clientes.nombre",
            "clientes.telefono",
            "pedidos.direccion",
            "pedidos.id_metodo_entrega",
            "pedidos.fecha_registro",
            "pedidos.id_metodo_pago",
            "pedidos.fecha_entrega",
            "pedidos.proceso",
            "pedidos.estado",
            "pedidos.id",
            "metodo__pagos.id AS idmetodopago",
            "metodo__pagos.nombre AS nombremetodopago",
            "metodo__entregas.id AS idmetodoentrega",
            "metodo__entregas.nombre AS nombremetodoentrega"
        )
            ->join("clientes", "pedidos.id_cliente", "=", "clientes.id")
            ->join("metodo__pagos", "pedidos.id_metodo_pago", "=", "metodo__pagos.id")
            ->join("metodo__entregas", "pedidos.id_metodo_entrega", "=", "metodo__entregas.id")
            ->get();

        return view('pedido.index', compact('pedidos', 'pedido', 'detallepedido', 'pedidocliente', 'editarpedido', 'detalleabono'));
        
    }

    public function anularAbono(Request $request)
    {
        $input = $request->all();
        Pago_Clientes::where('id', $input["idanularabono"])
            ->update([
                'estado' => 2
            ]);
        
            
        return redirect()->route('pedidos.index')
            ->with('success', 'Status pedido successfully');
    }

    public function verificarAbono($id){

        $totalabonopedido = Pago_Clientes::select('pedidos.totalpedido', Pago_Clientes::raw('SUM(pago__clientes.abono) as totalabonado'))
            ->join("pedidos", "pedidos.id", "=", "pago__clientes.id_pedido")->where([["pago__clientes.estado",1],["pedidos.id",$id]])->groupBy("pago__clientes.id_pedido", "pedidos.totalpedido")
            ->get();

        return $totalabonopedido[0]->totalpedido - $totalabonopedido[0]->totalabonado;
    }

    public function abonoCancelado($id){

        Pedido::where('id', $id)
            ->update([
                'cancelado' => 1
            ]);
    }
}
<?php

namespace App\Http\Controllers;


use DB;
use App\Models\Metodo_Entrega;
use App\Models\Medio_Pago;
use App\Models\Metodo_Pago;
use App\Models\Pedido;
use App\Models\Cliente;
use App\Models\producto;
use App\Models\Pais;
use App\Models\Departamento;
use App\Models\Municipio;
use App\Models\DetallePedido;
use App\Models\Pago_Clientes;
use Illuminate\Http\Request;
use Carbon\Carbon;


/**
 * Class PedidoController
 * @package App\Http\Controllers
 */
class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $pedidos = Pedido::paginate();
        
       
        $pedido = Cliente::select("clientes.cedula", "clientes.nombre", "clientes.direccion", "clientes.telefono", "clientes.tipo_comercio",'pedidos.fecha_registro' , "pedidos.fecha_entrega", "pedidos.proceso", "pedidos.id","pedidos.cancelado")
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


        $detalleabono = Pago_Clientes::select('pago__clientes.fecha AS fechapago', 'pago__clientes.id_medio_pago AS idmedio','pago__clientes.id_pedido AS idpedidoabono','pago__clientes.abono','pago__clientes.id AS idabono',
        "pedidos.totalpedido","pedidos.id","pedidos.Cancelado",
        "medio__pagos.id as idmediopago","medio__pagos.nombre")
            ->join("pedidos", "pago__clientes.id_pedido", "=", "pedidos.id")
            ->join("medio__pagos","pago__clientes.id_medio_pago", "=", "medio__pagos.id" )
            ->where("pago__clientes.estado", 1)
            ->orderBy("pago__clientes.fecha", "DESC")
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

        return view('pedido.index', compact('pedidos', 'pedido', 'detallepedido', 'pedidocliente', 'editarpedido','detalleabono'))
            ->with('i', (request()->input('page', 1) - 1) * $pedidos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $cliente = Cliente::all();
        $paises = DB::table('Pais') -> orderBy ('nombre')->get();
        $departamentos = DB::table('Departamentos') -> orderBy ('nombre')->get();
        $municipios = Municipio::all();
        $metodo_entrega = Metodo_Entrega::all();
        $medio_pago = Medio_Pago::all();
        $metodo_pago = Metodo_Pago::all();
        $producto = producto::all();
        $pedido = new Pedido();

        return view('pedido.create', compact('pedido', 'cliente', 'producto', 'paises', 'departamentos', 'municipios', 'metodo_entrega', 'medio_pago', 'metodo_pago'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $input = $request->all();
        $pedido = Pedido::create([
            "id_cliente" => $input["id_cliente"],
            'id_municipio' => $input["id_municipio"],
            'id_metodo_entrega' => $input["id_metodo_entrega"],
            'id_metodo_pago' => $input["id_metodo_pago"],
            'direccion' => $input["direccion"],
            'fecha_registro' => $input["fecha_registro"],
            'fecha_entrega' => $input["fecha_entrega"],
            'totalpedido' => $input["total"],
        ]);

        $pagoclientes = Pago_Clientes::create([
            "id_pedido" => $pedido->id,
            "fecha" => $input["fecha_registro"],
            "abono" => $input["abono"],
            'id_medio_pago' => $input["id_medio_pago"],
        ]);

        foreach ($input["producto_id"] as $key => $value) {
            DetallePedido::create([
                "id_pedido" => $pedido->id,
                "id_producto" => $value,
                "cantidad" => $input["cantidades"][$key],
                "precio" => $input["precios"][$key],
                "imagen" => $input["imagenes"][$key],
                "descripcion" => $input["descripciones"][$key],
            ]);


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

            // $detallepedido = DetallePedido::select('detalle_pedidos.cantidad AS cantidadproductos', 'detalle_pedidos.precio AS precioUnitario', 'productos.nombre AS nombreproducto', 'detalle_pedidos.id_pedido AS id')
            // ->join("productos", "detalle_pedidos.id_producto", "=", "productos.id")
            // ->get();

        $detalleabono = Pago_Clientes::select('pago__clientes.fecha AS fechapago', 'pago__clientes.id_medio_pago AS idmedio','pago__clientes.id_pedido AS idpedidoabono','pago__clientes.abono',
        "pedidos.totalpedido","pedidos.id","pedidos.Cancelado",
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

        return view('pedido.index', compact('pedidos', 'pedido', 'detallepedido', 'pedidocliente', 'editarpedido','detalleabono'))
            ->with('i', (request()->input('page', 1) - 1) * $pedidos->perPage());


    }
    public function updatePedido(Request $request)
    {
        $input = $request->all();

        Pedido::where('id', $input["id"])
            ->update([
                'id_metodo_entrega' => $input["id_metodo_entrega"],
                'id_metodo_pago' => $input["id_metodo_pago"],
                'direccion' => $input["direccion"],
                'fecha_registro' => $input["fecha_registro"],
                'fecha_entrega' => $input["fecha_entrega"],
                'proceso' => $input["proceso"],
            ]);
        return redirect()->route('pedidos.index')
            ->with('success', 'Pedido update successfully');

    }
    public function anularPedido(Request $request)
    {
        $input = $request->all();
        Pedido::where('id', $input["idanular"])
            ->update([
                'estado' => 2
            ]);
        return redirect()->route('pedidos.index')
            ->with('success', 'Status pedido successfully');
    }

}
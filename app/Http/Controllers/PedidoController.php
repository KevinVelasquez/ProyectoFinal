<?php

namespace App\Http\Controllers;

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
use Illuminate\Http\Request;


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

        $clientes = Cliente::select("clientes.cedula", "clientes.nombre", "clientes.direccion", "clientes.telefono", "clientes.tipo_comercio", "pedidos.fecha_registro", "pedidos.fecha_entrega", "pedidos.proceso", "pedidos.id")
            ->join("pedidos", "pedidos.id_cliente", "=", "clientes.id")
            ->get();

        $detallepedido = DetallePedido::all();
        return view('pedido.index', compact('pedidos', 'clientes', 'detallepedido'))
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
        $paises = Pais::all();
        $departamentos = Departamento::all();
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

        $clientes = Cliente::select("clientes.cedula", "clientes.nombre", "clientes.direccion", "clientes.telefono", "clientes.tipo_comercio", "pedidos.fecha_registro", "pedidos.fecha_entrega", "pedidos.proceso", "pedidos.id")
            ->join("pedidos", "pedidos.id_cliente", "=", "clientes.id")
            ->get();

        return view('pedido.index', compact('pedidos', 'clientes'))
            ->with('i', (request()->input('page', 1) - 1) * $pedidos->perPage());


    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pedido = Pedido::find($id);

        return view('pedido.show', compact('pedido'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pedidoedi = Pedido::find($id);
        $clienteedi = Cliente::find($id);

        return view('pedido.index', compact('pedidoedi', 'clienteedi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Pedido $pedido
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pedido $pedido)
    {
        request()->validate(Pedido::$rules);

        $pedido->update($request->all());

        return redirect()->route('pedidos.index')
            ->with('success', 'Pedido updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $pedido = Pedido::find($id)->delete();

        return redirect()->route('pedidos.index')
            ->with('success', 'Pedido deleted successfully');
    }

    public function detalle($id)
    {
        
        // $detallepedido = DetallePedido::select('detalle_pedidos.cantidad','detalle_pedidos.precio','productos.nombre','detalle_pedidos.id_pedido')
        // ->join("productos", "detalle_pedidos.id_producto", "=", "productos.id")
        // ->Where ('detalle_pedidos.id_pedido', '=', $id)
        // ->get();
        //return response()->json($detallepedido);
        // return view('pedido.index', compact('detallepedido'));
        // $pedidos = Pedido::paginate();
        // return view('pedido.index', compact('pedidos','detallepedido','clientes'))
        // ->with('i', (request()->input('page', 1) - 1) * $pedidos->perPage());

    }


}
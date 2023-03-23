<?php

namespace App\Http\Controllers;

use App\Models\Pais;
use App\Models\Departamento;
use App\Models\Municipio;
use App\Models\Regimen;
use App\Models\Tipo_comercio;
use App\Models\Tipo_persona;
use App\Models\Cliente;
use App\Models\Figura;
use App\Models\Pedido;
use App\Models\Pago_Clientes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClienteController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:Clientes');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $figuras = Figura::all();
        $cliente = Cliente::paginate();

        $clientes = Cliente::select('clientes.id', 'clientes.nombre', 'clientes.cedula', 'clientes.telefono', 'clientes.direccion', 'clientes.email', 'clientes.tipo_persona', 'clientes.estado', Pago_Clientes::raw('SUM(CASE WHEN pago__clientes.estado = 1 THEN pago__clientes.abono ELSE 0 END) as total_abonos'), Pedido::raw('(SELECT SUM(CASE WHEN pedidos.estado = 1 THEN pedidos.totalpedido ELSE 0 END) FROM pedidos WHERE pedidos.id_cliente = clientes.id) as total_pedido'))
            ->leftJoin('pedidos', 'pedidos.id_cliente', '=', 'clientes.id')
            ->leftJoin('pago__clientes', 'pago__clientes.id_pedido', '=', 'pedidos.id')
            ->groupBy('clientes.id', 'clientes.nombre', 'clientes.cedula', 'clientes.telefono', 'clientes.direccion', 'clientes.email', 'clientes.tipo_persona', 'clientes.estado')
            ->get();

            



        return view('cliente.index', compact('cliente', 'figuras', 'clientes'))
            ->with('i', (request()->input('page', 1) - 1) * $cliente->perPage());
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $paises = Pais::all();
        $departamentos = Departamento::all();
        $municipios = Municipio::all();
        $tipo_comercio = Tipo_comercio::all();
        $tipo_persona = Tipo_persona::all();
        $regimen = Regimen::all();
        $cliente = new Cliente();
        return view('cliente.create', compact('cliente', 'paises', 'departamentos', 'municipios', 'tipo_comercio', 'tipo_persona', 'regimen'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'cedula' => 'required|unique:clientes',
            'nombre' => 'required',
            'email' => 'required|email|unique:clientes,email',
            'telefono' => 'required',
            'direccion' => 'required',
        ]);

        $datosCliente = request()->except('_token', 'pais', 'departamento');
        Cliente::insert($datosCliente);

        return redirect('cliente')
        ->with('success', 'Cliente registrado exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

        $paises = Pais::all();
        $departamentos = Departamento::all();
        $municipios = Municipio::all();
        $tipo_comercio = Tipo_comercio::all();
        $tipo_persona = Tipo_persona::all();
        $regimen = Regimen::all();
        $clienteEstado = Cliente::find($id);
        $cliente = Cliente::findOrFail($id);
        return view('cliente.edit', compact('cliente', 'paises', 'departamentos', 'municipios', 'tipo_comercio', 'tipo_persona', 'regimen', 'clienteEstado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cliente $cliente)
    {
        //
        $saldoPendiente = 0;

    // Validar saldo pendiente solo si el estado se está actualizando
    if ($request->has('estado') && $cliente->estado != $request->estado) {
        $saldoPendiente = $this->validarSaldoPendiente($cliente->id);
    }

    if ($saldoPendiente > 0) {
        return redirect()->back()
            ->with('error', 'No se puede inactivar el cliente porque tiene un saldo pendiente.');
    }

    // Actualizar cliente
    $cliente->update($request->all());

    return redirect()->route('cliente.index')
        ->with('success', 'Cliente actualizado exitosamente');
    }

    private function validarSaldoPendiente($clienteId)
{
    $saldoPendiente = Cliente::select(Pedido::raw('(SELECT SUM(CASE WHEN pedidos.estado = 1 THEN pedidos.totalpedido ELSE 0 END) FROM pedidos WHERE pedidos.id_cliente = clientes.id) - SUM(CASE WHEN pago__clientes.estado = 1 THEN pago__clientes.abono ELSE 0 END) as saldo_pendiente'))
        ->leftJoin('pedidos', 'pedidos.id_cliente', '=', 'clientes.id')
        ->leftJoin('pago__clientes', 'pago__clientes.id_pedido', '=', 'pedidos.id')
        ->where('clientes.id', $clienteId)
        ->groupBy('clientes.id')
        ->first();

    return $saldoPendiente ? $saldoPendiente->saldo_pendiente : 0;
}

    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function eliminarCliente(Request $request)
    {
        //
        $input = $request->all();
        $cliente = $input["ideliminar"];

        $consultadetalle = Pedido::select(
            "pedidos.id_cliente",
        )->get();

        foreach ($consultadetalle as $valor) {

            if ($cliente == $valor->id_cliente) {

                return redirect()->route('cliente.index')->with('error', 'No se puede eliminar el cliente porque está asociado a un pedido');

            }
        }

        Cliente::find($input["ideliminar"])->delete();

        return redirect()->route('cliente.index')->with('success', 'Cliente eliminado exitosamente.');
    }
}
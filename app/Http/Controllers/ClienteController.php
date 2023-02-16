<?php

namespace App\Http\Controllers;

use App\Models\Pais;
use App\Models\Departamento;
use App\Models\Municipio;
use App\Models\Regimen;
use App\Models\Tipo_comercio;
use App\Models\Tipo_persona;
use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        
        // $datos ['clientes']= Cliente::paginate(5);
        // return view('cliente.index',$datos);
   
        $clientes = Cliente::paginate();

        return view('cliente.index', compact('clientes'))
            ->with('i', (request()->input('page', 1) - 1) * $clientes->perPage());
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
        return view('cliente.create', compact('cliente','paises', 'departamentos', 'municipios', 'tipo_comercio', 'tipo_persona', 'regimen'));
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
        // $datosCliente = request()->all();

        $datosCliente = request()->except('_token','pais','departamento');
        Cliente::insert($datosCliente);

        return redirect('cliente')
            ->with('mensaje', 'cliente creado con éxito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function updateStatusCliente(cliente $cliente)
    {
        //

    if($cliente->estado == 1)  {
        $cliente->update(['estado'=>0]);
            return redirect()->back();

        $cliente = '<br> <button type="button" class="btn btn-sm btn-danger">Inactivo</button>';

    }else{
        $cliente->update(['estado'=>1]);
        return redirect()->back();

        $cliente ='<br> <button type="button" class="btn btn-sm btn-success">Activo</button>';
    }

    }
    

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
        $cliente =Cliente::findOrFail($id);
        return view('cliente.edit', compact('cliente','paises', 'departamentos', 'municipios', 'tipo_comercio', 'tipo_persona', 'regimen','clienteEstado'));
    
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
        // $datosCliente = request()->except(['_token','pais','departamento','_method']);
        // Cliente::where('id', '=', $id)->update($datosCliente);

        // $paises = Pais::all();
        // $departamentos = Departamento::all();
        // $municipios = Municipio::all();
        // $tipo_comercio = Tipo_comercio::all();
        // $tipo_persona = Tipo_persona::all();
        // $regimen = Regimen::all();
        // $cliente =Cliente::findOrFail($id);
        // return view('cliente.edit', compact ('cliente','paises', 'departamentos', 'municipios', 'tipo_comercio', 'tipo_persona', 'regimen'));

        $cliente->update($request->all());

        return redirect()->route('cliente.index')
            ->with('success', 'Cliente updated successfully');
            
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
       // Cliente::destroy($id);
        // return redirect('cliente');

       $cliente = Cliente::find($id)->delete();

       return redirect('cliente')
       ->with('mensaje', 'Proveedor eliminado con éxito.');
    }
}

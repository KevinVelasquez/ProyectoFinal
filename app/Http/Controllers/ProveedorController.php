<?php

namespace App\Http\Controllers;

use App\Models\Pais;
use App\Models\Departamento;
use App\Models\Municipio;
use App\Models\Regimen;
use App\Models\Tipo_comercio;
use App\Models\Tipo_persona;
use App\Models\Proveedor;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['proveedores'] = Proveedor::paginate(5);
        return view('proveedor.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $pais = Pais::all();
        $departamentos = Departamento::all();
        $municipios = Municipio::all();
        $tipo_comercio = Tipo_comercio::all();
        $tipo_persona = Tipo_persona::all();
        $regimen = Regimen::all();
        $proveedor = new Proveedor();
        return view('proveedor.create', compact('proveedor', 'pais', 'departamentos', 'municipios', 'tipo_comercio', 'tipo_persona', 'regimen'));
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
        $datosProveedor = request()->except('_token', 'pais', 'departamento');
        Proveedor::insert($datosProveedor);

        return redirect()->route('proveedor.index')
            ->with('success', 'Proveedor created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function show(Proveedor $proveedor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $proveedor = Proveedor::findOrFail($id);
        return view('proveedor.edit', compact('proveedor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $datosProveedor = request()->except(['_token', 'pais', 'departamento', '_method']);
        Proveedor::where('id', '=', $id)->update($datosProveedor);

        $proveedor = Proveedor::findOrFail($id);
        return view('proveedor.edit', compact('proveedor'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $proveedor = Proveedor::find($id)->delete();

        return redirect()->route('proveedor.index')
            ->with('success', 'Proveedor deleted successfully');
    }
}

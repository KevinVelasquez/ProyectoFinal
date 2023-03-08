<?php

namespace App\Http\Controllers;

use App\Models\Pais;
use App\Models\Departamento;
use App\Models\Municipio;
use App\Models\Regimen;
use App\Models\Tipo_comercio;
use App\Models\Tipo_persona;
use App\Models\Proveedor;
use App\Models\Metodo_Entrega;
use App\Models\Medio_Pago;
use App\Models\Metodo_Pago;
use App\Models\Compra;
use App\Models\Insumo;
use App\Models\PagoProveedore;
use App\Models\Detalle_compra;
use Barryvdh\DomPDF\PDF as DomPDFPDF;
use Illuminate\Http\Request;
use PDF;
use Illuminate\Support\Facades\DB;


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

        // $datos ['proveedores']= Proveedor::paginate(5);
        // return view('proveedor.index',$datos);

        $proveedores = Proveedor::paginate();

        return view('proveedor.index', compact('proveedores'))
            ->with('i', (request()->input('page', 1) - 1) * $proveedores->perPage());
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
        $proveedor = new Proveedor();
        return view('proveedor.create', compact('proveedor', 'paises', 'departamentos', 'municipios', 'tipo_comercio', 'tipo_persona', 'regimen'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $datosProveedor = request()->except('_token', 'pais', 'departamento');
        Proveedor::insert($datosProveedor);

        return redirect('proveedor')
            ->with('mensaje', 'Proveedor creado con éxito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $proveedores = Proveedor::find($id);
        $detallecompra = Detalle_compra::select("detalle_compra.cantidad","detalle_compra.valor_unitario","insumos.nombre","detalle_compra.id_orden_compra","detalle_compra.id" )
        ->join("compra","compra.id", "=","detalle_compra.id_orden_compra")
        ->join("insumos","detalle_compra.id_insumo", "=", "insumos.id",  )
        ->get();

        
        $compra = Compra::select("compra.n_orden","compra.id","compra.fecha_compra","compra.id_metodo_pagos","compra.total","proveedors.nombre", "compra.created_at","compra.estado","proveedors.cedula","proveedors.direccion","municipios.id  AS idmunicipio","municipios.nombre AS nombremunicipio","proveedors.telefono","metodo__pagos.id",
        "metodo__pagos.nombre AS nombremetodopago",)
        ->join("proveedors","proveedors.id", "=","compra.id_proveedor")
        ->join("metodo__pagos", "compra.id_metodo_pagos", "=", "metodo__pagos.id")
        ->join("municipios", "proveedors.id_municipio", "=", "municipios.id")
        ->where("proveedors.id", "=", $id)
        ->get();


        $abono = PagoProveedore::select('pago_proveedores.id_compra',PagoProveedore::raw('SUM(pago_proveedores.abono) as totalabonado'))
        ->where("pago_proveedores.estado", "=", 1) 
      ->groupBy("pago_proveedores.id_compra")
      ->get();
      

        return view('proveedor.show', compact('proveedores','compra','detallecompra','abono') );
    }

    public function pdf()
    {
        //
        $proveedor = Proveedor::paginate();
        $pdf = PDF::loadView('proveedor.pdf', ['proveedor' => $proveedor]);
        return $pdf->stream();
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

        $paises = Pais::all();
        $departamentos = Departamento::all();
        $municipios = Municipio::all();
        $tipo_comercio = Tipo_comercio::all();
        $tipo_persona = Tipo_persona::all();
        $regimen = Regimen::all();
        $proveedorEstado = Proveedor::find($id);
        $proveedor = Proveedor::findOrFail($id);
        return view('proveedor.edit', compact('proveedor', 'paises', 'departamentos', 'municipios', 'tipo_comercio', 'tipo_persona', 'regimen', 'proveedorEstado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Proveedor $proveedor)
    {
        //
        
        $proveedor->update($request->all());

        return redirect()->route('proveedor.index')
            ->with('success', 'Proveedor updated successfully');
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

        return redirect('proveedor')
            ->with('mensaje', 'Proveedor eliminado con éxito.');
    }
}
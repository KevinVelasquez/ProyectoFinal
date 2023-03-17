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
    function __construct()
    {
        $this->middleware('permission:Proveedores');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $proveedores = Proveedor::paginate();

        $proveedor = Proveedor::select('proveedors.id', 'proveedors.nombre', 'proveedors.cedula', 'proveedors.telefono', 'proveedors.direccion', 'proveedors.email', 'proveedors.tipo_persona', 'proveedors.estado', PagoProveedore::raw('SUM(CASE WHEN pago_proveedores.estado = 1 THEN pago_proveedores.abono ELSE 0 END) as total_abonos'), Compra::raw('(SELECT SUM(CASE WHEN compra.anulado = 0 THEN compra.total ELSE 0 END) FROM compra WHERE compra.id_proveedor = proveedors.id) as total_compra'))
            ->leftJoin('compra', 'compra.id_proveedor', '=', 'proveedors.id')
            ->leftJoin('pago_proveedores', 'pago_proveedores.id_compra', '=', 'compra.id')
            ->groupBy('proveedors.id', 'proveedors.nombre', 'proveedors.cedula', 'proveedors.telefono', 'proveedors.direccion', 'proveedors.email', 'proveedors.tipo_persona', 'proveedors.estado')
            ->get();
 
        return view('proveedor.index', compact('proveedores','proveedor'))
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
        
        

        try {
            
            // Código para guardar datos en la base de datos
        } catch (\Illuminate\Database\QueryException $e) {
            if ($e->errorInfo[1] == 1062) { // Verificar si es un error de clave duplicada
                if (strpos($e->getMessage(), 'proveedors_cedula_unique') !== false) { // Verificar si la clave duplicada es para el campo 'cedula'
                    throw new \Exception('El número de cédula ya existe en la base de datos'); // Lanzar una excepción con el mensaje de validación
                }
            }
        }
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
    public function mostrar($id)
    {
        $proveedores = Proveedor::find($id);
        $detallecompra = Detalle_compra::select("detalle_compra.cantidad","detalle_compra.valor_unitario","insumos.nombre","detalle_compra.id_orden_compra","detalle_compra.id","compra.n_orden")
        ->join("compra","compra.id", "=","detalle_compra.id_orden_compra")
        ->join("insumos","detalle_compra.id_insumo", "=", "insumos.id",  )
        ->get();

        
        $compra = Compra::select("compra.n_orden","compra.id","compra.fecha_compra","compra.id_metodo_pagos","compra.total","proveedors.nombre","compra.estado","proveedors.cedula","proveedors.direccion","municipios.id  AS idmunicipio","municipios.nombre AS nombremunicipio","proveedors.telefono","metodo__pagos.id",
        "metodo__pagos.nombre AS nombremetodopago",)
        ->join("proveedors","proveedors.id", "=","compra.id_proveedor")
        ->join("metodo__pagos", "compra.id_metodo_pagos", "=", "metodo__pagos.id")
        ->join("municipios", "proveedors.id_municipio", "=", "municipios.id")
        ->where("proveedors.id", "=", $id)
        ->where('compra.anulado', 0)

        ->get();


        $comprasss = Compra::select("compra.n_orden","compra.fecha_compra","compra.id_metodo_pagos","compra.total","proveedors.nombre","compra.estado","compra.anulado","proveedors.cedula","proveedors.direccion","municipios.id  AS idmunicipio","municipios.nombre AS nombremunicipio","proveedors.telefono","metodo__pagos.id",
        "metodo__pagos.nombre AS nombremetodopago",)
        ->join("proveedors","proveedors.id", "=","compra.id_proveedor")
        ->join("metodo__pagos", "compra.id_metodo_pagos", "=", "metodo__pagos.id")
        ->join("municipios", "proveedors.id_municipio", "=", "municipios.id")
        ->where('compra.anulado', 0)
        
        ->get();

        $abono = PagoProveedore::select('pago_proveedores.id_compra',PagoProveedore::raw('SUM(pago_proveedores.abono) as totalabonado'))
        ->where("pago_proveedores.estado", "=", 1) 
      ->groupBy("pago_proveedores.id_compra")
      ->get();
      

        return view('proveedor.show', compact('proveedores','compra','detallecompra','abono','comprasss') );
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
        // print($proveedor);
        // exit;

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
    

    public function eliminarProveedor(Request $request)
    {
        //
        $input = $request->all();
            $proveedor = $input["ideliminar"];

        $consultadetalle = Compra::select(
            "compra.id_proveedor",
        )->get();

        foreach ($consultadetalle as $valor) {
               
            if($proveedor==$valor->id_proveedor) {
                
                return redirect()->route('proveedor.index')->with('error', 'No se puede eliminar el proveedor porque está asociado a una orden de compra');
                
            }
        }

        Proveedor::find($input["ideliminar"])->delete();

        return redirect()->route('proveedor.index');
    }
}
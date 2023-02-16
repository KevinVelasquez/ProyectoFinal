<?php

namespace App\Http\Controllers;

use App\Models\Pais;
use App\Models\Departamento;
use App\Models\Municipio;
use App\Models\Regimen;
use App\Models\Tipo_comercio;
use App\Models\Tipo_persona;
use App\Models\Proveedor;
use Barryvdh\DomPDF\PDF as DomPDFPDF;
use Illuminate\Http\Request;
use PDF;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

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
        $pais = Pais::all();
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
        //
        // $request->validate([

        //     'cedula'=>'required|integer',
        //     'nombre'=>'required|string|max:60',
        //     'telefono'=>'required|string|max:60',
        //     'direccion'=>'required|string|max:60',
        //     'email'=>'required|email',
        //     'tipo_persona'=>'required|bigInteger',
        //     'regimen'=>'required|bigInteger',
        //     'tipo_comercio'=>'required|bigInteger',
        //     'pais'=>'required|bigInteger',
        //     'departamento'=>'required|bigInteger',
        //     'id_municipio'=>'required|bigInteger',
        // ]);


        // $mensaje = [
        //     'required' => 'El :attribute es obligatorio',
        //     'cedula.required' => 'La Cédula es obligatoria',
        //     'direccion.required' => 'La Cédula es obligatoria',

        // ];

        // $this->validate($request, $campos, $mensaje);

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
        $proveedor = Proveedor::find($id);
        return view('proveedor.show', $proveedor);
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
        // $datosProveedor = request()->except(['_token','pais','departamento','_method']);
        // Proveedor::where('id', '=', $id)->update($datosProveedor);

        // $paises = Pais::all();
        // $departamentos = Departamento::all();
        // $municipios = Municipio::all();
        // $tipo_comercio = Tipo_comercio::all();
        // $tipo_persona = Tipo_persona::all();
        // $regimen = Regimen::all();
        // $proveedor =Proveedor::findOrFail($id);
        // return view('proveedor.edit', compact ('proveedor','paises', 'departamentos', 'municipios', 'tipo_comercio', 'tipo_persona', 'regimen'));

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

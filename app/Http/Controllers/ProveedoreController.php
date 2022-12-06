<?php

namespace App\Http\Controllers;

use App\Models\Pais;
use App\Models\Departamento;
use App\Models\Municipio;
use App\Models\Regimen;
use App\Models\Tipo_comercio;
use App\Models\Tipo_persona;
use App\Models\Proveedore;
use Illuminate\Http\Request;

/**
 * Class ProveedoreController
 * @package App\Http\Controllers
 */
class ProveedoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proveedores = Proveedore::paginate();

        return view('proveedore.index', compact('proveedores'))
            ->with('i', (request()->input('page', 1) - 1) * $proveedores->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $paises = Pais::all();
        $departamentos = Departamento::all();
        $municipios = Municipio::all();
        $tipo_comercio = Tipo_comercio::all();
        $tipo_persona = Tipo_persona::all();
        $regimen = Regimen::all();
        $proveedore = new Proveedore();
        return view('proveedore.create', compact('proveedore','paises', 'departamentos', 'municipios', 'tipo_comercio', 'tipo_persona', 'regimen'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Proveedore::$rules);

        $proveedore = Proveedore::create($request->all());

        return redirect()->route('proveedores.index')
            ->with('success', 'Proveedore created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $proveedore = Proveedore::find($id);

        return view('proveedore.show', compact('proveedore'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $proveedore = Proveedore::find($id);

        return view('proveedore.edit', compact('proveedore'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Proveedore $proveedore
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Proveedore $proveedore)
    {
        request()->validate(Proveedore::$rules);

        $proveedore->update($request->all());

        return redirect()->route('proveedore.index')
            ->with('success', 'Proveedore updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $proveedore = Proveedore::find($id)->delete();

        return redirect()->route('proveedore.index')
            ->with('success', 'Proveedore deleted successfully');
    }
}

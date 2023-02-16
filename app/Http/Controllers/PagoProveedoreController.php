<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use App\Models\medio_pagos;
use App\Models\PagoProveedore;
use Illuminate\Http\Request;

/**
 * Class PagoProveedoreController
 * @package App\Http\Controllers
 */
class PagoProveedoreController extends Controller
{

    public function agregarAbono(Request $request)
    {
        $input = $request->all();
        $abono = PagoProveedore::create([
            "id_compra" => $input["id"],
            'fecha' => $input["fechaabono"],
            'estado' => $input["estado"],
            'abono' => $input["cantidadabono"],
            'id_medio_pagos' => $input["medioabono"],
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pagoProveedores = PagoProveedore::paginate();

        return view('pago-proveedore.index', compact('pagoProveedores'))
            ->with('i', (request()->input('page', 1) - 1) * $pagoProveedores->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pagoProveedore = new PagoProveedore();
        $medioPago = medio_pagos::all();
        $compra = Compra::all();

        return view('pago-proveedore.create', compact('pagoProveedore','medioPago','compra'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(PagoProveedore::$rules);

        $pagoProveedore = PagoProveedore::create($request->all());

        return redirect()->route('pago-proveedores.index')
            ->with('success', 'PagoProveedore created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pagoProveedore = PagoProveedore::find($id);

        return view('pago-proveedore.show', compact('pagoProveedore'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pagoProveedore = PagoProveedore::find($id);

        return view('pago-proveedore.edit', compact('pagoProveedore'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  PagoProveedore $pagoProveedore
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PagoProveedore $pagoProveedore)
    {
        request()->validate(PagoProveedore::$rules);

        $pagoProveedore->update($request->all());

        return redirect()->route('pago-proveedores.index')
            ->with('success', 'PagoProveedore updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $pagoProveedore = PagoProveedore::find($id)->delete();

        return redirect()->route('pago-proveedores.index')
            ->with('success', 'PagoProveedore deleted successfully');
    }
}

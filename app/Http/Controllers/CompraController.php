<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Compra;
use App\Models\Proveedor;
use App\Models\PagoProveedore;
use App\Models\insumo;
use App\Models\metodo_pagos;
use App\Models\Detalle_compra;
use Illuminate\Http\Request;
use PDF;

/**
 * Class CompraController
 * @package App\Http\Controllers
 */
class CompraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $compras = Compra::paginate();
        $proveedor = Proveedor::all();
        $metodo_pagos = metodo_pagos::all();
        $insumos = Insumo::all();
        $pdf = Detalle_compra::all();
        $pago_provedor = PagoProveedore::all();

        return view('compra.index', compact('compras', 'proveedor', 'insumos', 'metodo_pagos', 'pdf','pago_provedor'))
            ->with('i', (request()->input('page', 1) - 1) * $compras->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $id_proveedor = Proveedor::all();
        $insumo = insumo::all();
        $metodo_pagos = metodo_pagos::all();
        $compra = new Compra();
        return view('compra.create', compact('compra', 'id_proveedor', 'insumo', 'metodo_pagos'));
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
        try {
            DB::beginTransaction();
            $compra = Compra::create([
                "n_orden" => $input["n_orden"],
                "fecha_compra" => $input["fecha_compra"],
                "estado" => $input["estado"],
                "id_proveedor" => $input["id_proveedor"],
                "id_metodo_pagos" => $input["id_metodo_pagos"],
                "anulado" => $input["anulado"],
                "total" => $input["total"],
            ]);

            foreach ($input["id_insumo"] as $key => $value) {
                Detalle_compra::create([
                    "cantidad" => $input["cantidades"][$key],
                    "valor_unitario" => $input["valor_unitario"][$key],
                    "id_orden_compra" => $compra->id,
                    "id_insumo" => $value
                ]);
            }

            DB::commit();
            return redirect()->route('compra.index')->with('status', '1');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('compra.index')
                ->with('status', $e->getMessage());
        }
    }

    public function calcular_precio($insumos, $cantidades)
    {
        $precio = 0;
        foreach ($insumos as $key => $value) {
            $insumo = Insumo::find($value);
            $precio += ($insumo->precio_unitario * $cantidades[$key]);
        }
        return $precio;
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id )
    {


        $compra = Compra::find($id);
        $proveedor = Proveedor::all();
        $insumo = insumo::all();
        $metodo_pagos = metodo_pagos::all();
        $detalle = Detalle_compra::all();

        $detalle = [];
        if($id != null){
            $detalle = Detalle_compra::select("detalle_compra.*")
            ->where("detalle_compra.id_orden_compra", $id)
            ->get();
        }
        return view('compra.show', compact('compra', 'proveedor', 'insumo', 'metodo_pagos','detalle'));
    }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $compra = Compra::find($id);
        $proveedor = Proveedor::all();
        $insumo = insumo::all();
        $metodo_pagos = metodo_pagos::all();
        return view('compra.edit', compact('compra', 'proveedor', 'insumo', 'metodo_pagos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Compra $compra
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Compra $compra)
    {
        request()->validate(Compra::$rules);

        $compra->update($request->all());

        return redirect()->route('compra.index')
            ->with('success', 'Compra editada con éxito');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $compra = Compra::find($id)->delete();

        return redirect()->route('compra.index')
            ->with('success', 'Compra deleted successfully');
    }

    public function generarPDF($id){
       
        $compra = Compra::select('*')->where('compra.id',$id)->get();
        $detalle = Detalle_compra::select('*')->where('detalle_compra.id_orden_compra',$id)->get();
        $pdf = PDF::loadView('compra.pdf', compact('compra','detalle'));
        return $pdf->stream('compra.pdf');
    }

    public function CambioEstadoCompra(Request $request)
    {
        $input = $request;
        print($input);
        exit;
        $compra = Compra::find($request->id);
        $compra->estado = $request->estado;
        $compra->save();

        /*        if ($request->estado == 0) {
            $newStatus = '<br> <button type="button" class="btn btn-sm btn-danger">Inactiva</button>';
        } else {
            $newStatus = '<br> <button type="button" class="btn btn-sm btn-success">Activa</button>';
        }

        return response()->json(['var'=>''.$newStatus.'']); */
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Compra;
use App\Models\Proveedor;
use App\Models\PagoProveedore;
use App\Models\insumo;
use App\Models\Detalle_compra;
use App\Models\Metodo_Pago;
use Illuminate\Http\Request;
use PDF;

/**
 * Class CompraController
 * @package App\Http\Controllers
 */
class CompraController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:Ordenes-de-Compras');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $compras = Compra::paginate();
        $proveedor = Proveedor::all();
        $metodo__pagos = Metodo_Pago::all();
        $insumos = Insumo::all();
        $pdf = Detalle_compra::all();
        $pago_provedor = PagoProveedore::all();

        $pedidoproveedor = Compra::select(
            "compra.fecha_compra",
            "compra.estado",
            "compra.id_metodo_pagos",
            "compra.id",
            "compra.total",
            "proveedors.id AS idproveedor",
            "proveedors.nombre AS nombreproveedor",
            "proveedors.cedula",
            "proveedors.telefono",
            "proveedors.direccion",
            "metodo__pagos.id AS idmetodopago",
            "metodo__pagos.nombre AS nombremetodopago",
        )
            ->join("proveedors", "compra.id_proveedor", "=", "proveedors.id")
            ->join("metodo__pagos", "compra.id_metodo_pagos", "=", "metodo__pagos.id")
            ->get();

        $detallecompra = Detalle_compra::select('detalle_compra.cantidad AS cantidadinsumos', 'detalle_compra.valor_unitario AS precioUnitario', 'insumos.nombre AS nombreinsumo', 'detalle_compra.id_orden_compra AS id')
            ->join("insumos", "detalle_compra.id_insumo", "=", "insumos.id")
            ->get();


        $detalleabono = PagoProveedore::select(
            'pago_proveedores.fecha AS fechapago',
            'pago_proveedores.id_compra AS idcomprabono',
            'pago_proveedores.abono',
            'pago_proveedores.id AS idabono',
            "compra.total",
            "compra.id",
            "compra.anulado"
        )
            ->leftJoin("compra", "pago_proveedores.id_compra", "=", "compra.id")
            ->where("pago_proveedores.estado", 1)
            ->orderBy("pago_proveedores.fecha", "DESC")
            ->get();

        $editarCompra = Compra::all();


        return view('compra.index', compact('compras', 'proveedor', 'insumos', 'metodo__pagos', 'pdf', 'pago_provedor', 'detalleabono', 'editarCompra', 'detallecompra', 'pedidoproveedor'))
            ->with('i', (request()->input('page', 1) - 1) * $compras->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $id_proveedor = DB::table('proveedors')->where('estado', 1)->get();
        $insumo = DB::table('insumos')->where('estado', 1)->get();
        $metodo__pagos = Metodo_Pago::all();
        $compra = new Compra();
        $pagos = PagoProveedore::all();

        return view('compra.create', compact('compra', 'id_proveedor', 'insumo', 'metodo__pagos', 'pagos'));
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
                "id_proveedor" => $input["id_proveedor"],
                "id_metodo_pagos" => $input["id_metodo_pagos"],
                "total" => $input["total"],
            ]);

            $pago_proveedor = PagoProveedore::create([
                "id_compra" => $compra->id,
                "fecha" => $compra->fecha_compra,
                "abono" => $input["abono"]

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
            return redirect()->route('compra.index', compact('pago_proveedor', 'compra'))->with('success', 'Compra registrada exitosamente.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('compra.index')
                ->with('status', $e->getMessage());
        }

        return redirect()->route('compra.index')->with('success', 'Compra registrada exitosamente.');
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
    public function show(Request $request, $id)
    {


        $compra = Compra::find($id);
        $proveedor = Proveedor::all();
        $insumo = insumo::all();
        $metodo__pagos = Metodo_Pago::all();
        $detalle = Detalle_compra::all();

        $detalle = [];
        if ($id != null) {
            $detalle = Detalle_compra::select("detalle_compra.*")
                ->where("detalle_compra.id_orden_compra", $id)
                ->get();
        }
        return view('compra.show', compact('compra', 'proveedor', 'insumo', 'metodo__pagos', 'detalle'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Compra $compra
     * @return \Illuminate\Http\Response
     */


    public function anularCompra(Request $request)
    {
        $input = $request->all();
        Compra::where('id', $input["idanular"])
            ->update([
                'anulado' => 1
            ]);

        PagoProveedore::where('id_compra', $input["idanular"])
            ->update([
                'estado' => 2
            ]);

        return redirect()->route('compra.index')->with('success', 'Compra anulada exitosamente.');

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

    public function generarPDF()
    {
        $id = $_GET["id"];
        $compra = Compra::select('*')->where('compra.id', $id)->get();
        $detalle = Detalle_compra::select('*')->where('detalle_compra.id_orden_compra', $id)->get();
        $pdf = PDF::loadView('compra.pdf', compact('compra', 'detalle'));
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

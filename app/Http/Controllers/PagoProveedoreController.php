<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use App\Models\Detalle_compra;
use App\Models\medio_pagos;
use App\Models\PagoProveedore;
use App\Models\Metodo_Entrega;
use App\Models\Metodo_Pago;
use Illuminate\Http\Request;

/**
 * Class PagoProveedoreController
 * @package App\Http\Controllers
 */
class PagoProveedoreController extends Controller
{

    public function agregarAbonoCompra(Request $request)
    {
        $input = $request->all();
        $abono = PagoProveedore::create([
            "id_compra" => $input["id"],
            'fecha' => $input["fechaabono"],
            'abono' => $input["cantidadabono"],
        ]);

        $totalabono = $this->verificarAbono($input["id"]);

/* 
        if ($totalabono <= 0) {

            $this->abonoCancelado($input["id"]);
        } */

        $compras = Compra::all();

        $detallecompra = Detalle_compra::all();

        $compraProveedor = Compra::all();

        $detalleabono = PagoProveedore::all();

        $editarCompra = Compra::all();


        return view('compra.index', compact('compras',  'detallecompra', 'compraProveedor', 'detalleabono','editarCompra', 'abono','totalabono'));

    }


    public function verificarAbono($id)
    {

        $totalabonocompra = PagoProveedore::all();

        return $totalabonocompra[0]->totalcompra - $totalabonocompra[0]->totalabonado;
    }


    public function abonoCancelado($id)
    {

        Compra::where('id', $id)
            ->update([
                'cancelada' => 1
            ]);
    }

    public function anularAbono(Request $request)
    {
        $input = $request->all();
        PagoProveedore::where('id', $input["idanularabono"])
            ->update([
                'estado' => 2
            ]);

/*         Compra::where('id', $input["idpedidoabono"])
            ->update([
                'cancelado' => 0
            ]); */

        return redirect()->route('compra.index')
            ->with('success', 'Status pedido successfully');
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
    
}

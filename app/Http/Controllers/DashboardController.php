<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;
use DB;

class DashboardController extends Controller
{
    public function index(Request $request)
    {

        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        if (!$startDate && !$endDate) {
            $startDate = date('Y') . '-01-01';
            $endDate = date('Y-m-d');
        }


        $meses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
        $data = $this->getData($startDate, $endDate);
        $datosProceso = $this->procesoPedidos($startDate, $endDate);


        return view('dashboard.index', compact('data', 'startDate', 'endDate', 'meses', 'datosProceso'));
    }

    public function getData($startDate, $endDate)
    {
        $year = date('Y', strtotime($startDate));
        $meses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];

        $pedidosPorMes = DB::table('pedidos')
            ->select(DB::raw('MONTH(fecha_registro) as mes, COUNT(*) as cantidad'))
            ->whereDate('fecha_registro', '>=', $startDate)
            ->whereDate('fecha_registro', '<=', $endDate)
            ->where('estado',1)
            ->groupBy('mes')
            ->orderBy('mes', 'ASC')
            ->get();


        $cantidadPedidos = [];
        foreach ($meses as $index => $mes) {
            $cantidadPedidos[$mes] = 0;
            foreach ($pedidosPorMes as $pedido) {
                if ($pedido->mes == ($index + 1)) {
                    $cantidadPedidos[$mes] += $pedido->cantidad;
                    break;
                }
            }
        }

        return $cantidadPedidos;
    }

    public function procesoPedidos($startDate, $endDate)
    {
        $procesos = ['Pendiente', 'Despachado', 'Entregado',];
        $pedidosPorProceso = DB::table('pedidos')
            ->select('proceso', DB::raw('COUNT(*) as total'))
            ->whereDate('fecha_registro', '>=', $startDate)
            ->whereDate('fecha_registro', '<=', $endDate)
            ->where('estado',1)
            ->groupBy('proceso')
            ->get();
        $datosProceso = [];
        foreach ($pedidosPorProceso as $pedido) {
            $procesoNombre = $procesos[$pedido->proceso] ?? $pedido->proceso;
            $datosProceso[$procesoNombre] = $pedido->total;
        }

        return $datosProceso;
    }

}
?>
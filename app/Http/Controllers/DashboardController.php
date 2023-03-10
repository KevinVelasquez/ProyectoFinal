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
        $frecuenciacliente = $this->frecuenciaCliente($startDate, $endDate);
        $frecuenciaproveedor = $this->frecuenciaProveedor($startDate, $endDate);
        $productosvendidos = $this->productosVendidos($startDate, $endDate);
        $pedidos_por_metodo_entrega = $this->metodosEntrega($startDate, $endDate);
        $pedidos_por_metodo_pago = $this->metodosPago($startDate, $endDate);
        $clientes_por_tipo = $this->tipoClientes($startDate, $endDate);
        $abonosPorMesClientes = $this->abonosClientes($startDate, $endDate);
        $abonosPorMesProveedor = $this->abonosProveedor($startDate, $endDate);


        return view(
            'dashboard.index',
            compact(
                'data',
                'startDate',
                'endDate',
                'meses',
                'datosProceso',
                'frecuenciacliente',
                'frecuenciaproveedor',
                'productosvendidos',
                'pedidos_por_metodo_entrega',
                'pedidos_por_metodo_pago',
                'clientes_por_tipo',
                'abonosPorMesClientes',
                'abonosPorMesProveedor'
            )
        );
    }

    public function getData($startDate, $endDate)
    {
        $year = date('Y', strtotime($startDate));
        $meses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];

        $pedidosPorMes = DB::table('pedidos')
            ->select(DB::raw('MONTH(fecha_registro) as mes, COUNT(*) as cantidad'))
            ->whereDate('fecha_registro', '>=', $startDate)
            ->whereDate('fecha_registro', '<=', $endDate)
            ->where('estado', 1)
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
            ->where('estado', 1)
            ->groupBy('proceso')
            ->get();
        $datosProceso = [];
        foreach ($pedidosPorProceso as $pedido) {
            $procesoNombre = $procesos[$pedido->proceso] ?? $pedido->proceso;
            $datosProceso[$procesoNombre] = $pedido->total;
        }

        return $datosProceso;
    }

    public function frecuenciaCliente($startDate, $endDate)
    {

        $frecuenciacliente = DB::table('clientes')
            ->join('pedidos', 'clientes.id', '=', 'pedidos.id_cliente')
            ->select('clientes.id', 'clientes.nombre', DB::raw('count(pedidos.id) as total_pedidos'))
            ->whereDate('fecha_registro', '>=', $startDate)
            ->whereDate('fecha_registro', '<=', $endDate)
            ->where('pedidos.estado', 1)
            ->groupBy('clientes.id', 'clientes.nombre')
            ->orderByDesc('total_pedidos')
            ->limit(10)
            ->get();


        return $frecuenciacliente;
    }

    public function frecuenciaProveedor($startDate, $endDate)
    {

        $frecuenciaproveedor = DB::table('proveedors')
            ->join('compra', 'proveedors.id', '=', 'compra.id_proveedor')
            ->select('proveedors.id', 'proveedors.nombre', DB::raw('count(compra.id) as total_compra'))
            ->whereDate('compra.fecha_compra', '>=', $startDate)
            ->whereDate('compra.fecha_compra', '<=', $endDate)
            ->where('compra.anulado', 0)
            ->groupBy('proveedors.id', 'proveedors.nombre')
            ->orderByDesc('total_compra')
            ->limit(10)
            ->get();


        return $frecuenciaproveedor;
    }

    public function productosVendidos($startDate, $endDate)
    {

        $productosvendidos = DB::table('pedidos')
            ->join('detalle_pedidos', 'pedidos.id', '=', 'detalle_pedidos.id_pedido')
            ->join('productos', 'detalle_pedidos.id_producto', '=', 'productos.id')
            ->select('productos.nombre', DB::raw('SUM(detalle_pedidos.cantidad) as cantidad_total'))
            ->whereDate('fecha_registro', '>=', $startDate)
            ->whereDate('fecha_registro', '<=', $endDate)
            ->where('pedidos.estado', 1)
            ->groupBy('productos.nombre', 'detalle_pedidos.id_producto')
            ->get();


        return $productosvendidos;
    }

    public function metodosEntrega($startDate, $endDate)
    {
        $pedidos_por_metodo_entrega = DB::table('metodo__entregas')
            ->leftJoin('pedidos', 'metodo__entregas.id', '=', 'pedidos.id_metodo_entrega')
            ->select('metodo__entregas.nombre', DB::raw('COUNT(pedidos.id) as cantidad_pedidos'))
            ->whereDate('pedidos.fecha_registro', '>=', $startDate)
            ->whereDate('pedidos.fecha_registro', '<=', $endDate)
            ->where('pedidos.estado', 1)
            ->groupBy('metodo__entregas.nombre')
            ->get();

        return $pedidos_por_metodo_entrega;
    }

    public function metodosPago($startDate, $endDate)
    {
        $pedidos_por_metodo_pago = DB::table('metodo__pagos')
            ->leftJoin('pedidos', 'metodo__pagos.id', '=', 'pedidos.id_metodo_pago')
            ->select('metodo__pagos.nombre', DB::raw('COUNT(pedidos.id) as cantidad_pedidos'))
            ->whereDate('pedidos.fecha_registro', '>=', $startDate)
            ->whereDate('pedidos.fecha_registro', '<=', $endDate)
            ->where('pedidos.estado', 1)
            ->groupBy('metodo__pagos.nombre')
            ->get();

        return $pedidos_por_metodo_pago;
    }

    public function tipoClientes($startDate, $endDate)
    {
        $clientes_por_tipo = DB::table('clientes')
            ->join('tipo_comercio', 'clientes.tipo_comercio', '=', 'tipo_comercio.id')
            ->select('tipo_comercio.nombre', DB::raw('COUNT(clientes.id) as cantidad_clientes'))
            ->where('clientes.estado', 1)
            ->groupBy('tipo_comercio.nombre')
            ->get();

        return $clientes_por_tipo;
    }

    public function abonosClientes($startDate, $endDate)
    {
        $abonosPorMesClientes = DB::table(DB::raw('
        (SELECT 1 AS mes_num, "Enero" AS mes_nombre UNION
        SELECT 2, "Febrero" UNION
        SELECT 3, "Marzo" UNION
        SELECT 4, "Abril" UNION
        SELECT 5, "Mayo" UNION
        SELECT 6, "Junio" UNION
        SELECT 7, "Julio" UNION
        SELECT 8, "Agosto" UNION
        SELECT 9, "Septiembre" UNION
        SELECT 10, "Octubre" UNION
        SELECT 11, "Noviembre" UNION
        SELECT 12, "Diciembre") meses'))
            ->leftJoin(DB::raw('(SELECT MONTH(fecha) as mes_num, COALESCE(SUM(abono), 0) as total FROM pago__clientes WHERE estado = 1 AND fecha BETWEEN :startDate AND :endDate GROUP BY mes_num) as abonos'), 'abonos.mes_num', '=', 'meses.mes_num')
            ->select(DB::raw('meses.mes_nombre as mes, COALESCE(total, 0) as total'))
            ->setBindings(['startDate' => $startDate, 'endDate' => $endDate])
            ->orderBy('meses.mes_num')
            ->get();

        return $abonosPorMesClientes;
    }

    public function abonosProveedor($startDate, $endDate)
    {
        $abonosPorMesProveedor = DB::table(DB::raw('
        (SELECT 1 AS mes_num, "Enero" AS mes_nombre UNION
        SELECT 2, "Febrero" UNION
        SELECT 3, "Marzo" UNION
        SELECT 4, "Abril" UNION
        SELECT 5, "Mayo" UNION
        SELECT 6, "Junio" UNION
        SELECT 7, "Julio" UNION
        SELECT 8, "Agosto" UNION
        SELECT 9, "Septiembre" UNION
        SELECT 10, "Octubre" UNION
        SELECT 11, "Noviembre" UNION
        SELECT 12, "Diciembre") meses'))
            ->leftJoin(DB::raw('(SELECT MONTH(fecha) as mes_num, COALESCE(SUM(abono), 0) as total FROM pago_proveedores WHERE estado = 1 AND fecha BETWEEN :startDate AND :endDate GROUP BY mes_num) as abonos'), 'abonos.mes_num', '=', 'meses.mes_num')
            ->select(DB::raw('meses.mes_nombre as mes, COALESCE(total, 0) as total'))
            ->setBindings(['startDate' => $startDate, 'endDate' => $endDate])
            ->orderBy('meses.mes_num')
            ->get();

        return $abonosPorMesProveedor;
    }

}
?>
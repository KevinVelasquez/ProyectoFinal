@extends('layouts.app')

@section('template_title')
{{ $compra->name ?? 'Show Compra' }}
@endsection

@section('content')
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="float-left">
                        <span class="card-title">Show Compra</span>
                    </div>
                    <div class="float-right">
                        <a class="btn btn-primary" href="{{ route('compra.index') }}"> Back</a>
                        <a class="btn btn-sm btn-primary " href="{{route('generarPDF', $compra->id)}}"><i class="fa fa-fw fa-eye"></i> Descargar PDF</a>
                    </div>
                </div>
                <div class="card-body">

                    <div class="form-group">
                        <strong>N Orden:</strong>
                        {{ $compra->n_orden }}
                    </div>
                    <div class="form-group">
                        <strong>Fecha Compra:</strong>
                        {{ $compra->fecha_compra }}
                    </div>
                    <div class="form-group">
                        <strong>Total:</strong>
                        {{ $compra->total }}
                    </div>
                    <div class="form-group">
                        <strong>Estado:</strong>
                        <?php if ($compra->estado == 1) {
                            echo 'Activo';
                        } elseif ($compra->estado == 2) {
                            echo 'Inactivo';
                        } ?>
                    </div>
                    <div class="form-group">
                        <strong>Anulado:</strong>
                        <?php if ($compra->anulado == 0) {
                            echo 'No anulado';
                        } elseif ($compra->anulado == 1) {
                            echo 'Anulado';
                        } ?>
                    </div>
                    <div class="form-group">
                        <strong>Proveedor:</strong>
                        {{ $compra->proveedor->nombre}}
                    </div>
                    <div class="form-group">
                        <strong>Metodo Pago:</strong>
                        {{ $compra->metodo_pagos->nombre }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if(count($insumo) > 0)
    <div class="row">
        <div class="col">
            <table class="table">
                <thead>
                    <tr>
                        <th colspan="4" class="text-center">Insumos</th>
                    </tr>
                    <tr>
                        <th>Nombre</th>
                        <th>Cantidad</th>
                        <th>Precio</th>
                        <th>Sub total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($detalle as $detalle)
                    <tr>
                        <td>{{$detalle->insumo->nombre}}</td>
                        <td>{{$detalle->cantidad}}</td>
                        <td>{{$detalle->valor_unitario}}</td>
                        <td>{{$detalle->valor_unitario * $detalle->cantidad}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endif
</section>
@endsection
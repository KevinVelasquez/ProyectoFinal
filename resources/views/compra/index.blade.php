@extends('layouts.app')

@section('template_title')
Compra
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title">
                            {{ __('Compra') }}
                        </span>
                        <div class="float-right">
                            <a href="{{ route('compra.create') }}" class="btn btn-primary btn-sm float-right" data-placement="left">
                                {{ __('Nueva Orden') }}
                            </a>
                        </div>
                    </div>
                </div>
                @if (session('status'))
                @if(session('status') == '1')
                <div class="alert alert-success">
                    Se guardó
                </div>
                @else
                <div class="alert alert-danger">
                    {{session('status') }}
                </div>
                @endif
                @endif
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="thead">
                                <tr>
                                    <th>ID</th>

                                    <th>N Orden</th>
                                    <th>Fecha Compra</th>
                                    <th>Proveedor</th>
                                    <th>Metodo Pago</th>
                                    <th>Estado</th>

                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($compras as $compra)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $compra->n_orden }}</td>
                                    <td>{{ $compra->fecha_compra }}</td>

                                    <td>
                                        {{ $compra->proveedor->nombre }}
                                    </td>

                                    <td>{{ $compra->metodo_pagos->nombre }}</td>

                                    <td>
                                        @if($compra->estado == 1)
                                        <button type="button" class="btn btn-sm btn-success">Activo</button>
                                        @else
                                        <button type="button" class="btn btn-sm btn-danger">Inactivo</button>
                                        @endif
                                    </td>
                                    <td>
                                        <form action="{{ route('compra.destroy',$compra->id) }}" method="POST">
                                            <a class="btn btn-sm btn-primary " href="{{ route('compra.show',$compra->id) }}"><i class="fa fa-fw fa-eye"></i> Detalle</a>
                                            <button onclick="verDatosAbono('{{ $compra->id }}')" class="mdi mdi-cash-usd" data-toggle="modal" data-target="#abonos">Abonos</button>
                                            @csrf
                                        </form>
                                    </td>
                                    <td>
                                        <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i>Anular</button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            {!! $compras->links() !!}
        </div>
    </div>
</div>
<div class="modal fade" id="abonos" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:42%;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitleAbono">Pedido</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="totalpedidoresta">
                <form role="form" method="POST" action="{{ route('agregarAbono') }}" enctype="multipart/form-data" class="form-sample needs-validation" onsubmit="return validarMonto()" novalidate>
                    @csrf
                    <input type="hidden" name="id" id="idpedidoabonar" />
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Fecha</label>
                                <div class="col-sm-9">
                                    <input type="date" name="fechaabono" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Abono</label>
                                <div class="col-sm-9">
                                    <input type="number" id="cantidadabono" name="cantidadabono" class="form-control" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-3 ">Medio de Pago</label>
                        <div class="col-3">
                            <select class="form-control" name="medioabono" required>
                                <option value="1">Efectivo</option>
                                <option value="2">Transferencia</option>
                            </select>
                        </div>

                    </div>
            </div>
            <div class="botonestabla" style="text-align: center;">
                <button type="submit" id="agregarAbono" class="btn btn-primary">Agregar</button>
                <button type="button" class="btn btn-primary">Cancelar</button>
            </div>
            </form>
            <br>
            <br>
            <input placeholder="Buscar" style="width: 20%;margin-left: 63%;" id="buscarAbono">
            <div class="table-responsive pt-3" style="padding:3%">
                <table class="table table-bordered" id="tablaabonos" style="width:70%" align="center">
                    <thead>
                        <tr>
                            <th>
                                Fecha
                            </th>
                            <th>
                                Abono
                            </th>
                            <th>
                                Medio
                            </th>
                            <th>
                                Acciones
                            </th>
                            <th id="ocultar" style="display: none">
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
                <h5><span id="resta">Resta </span></h5>
                <br>
                <h5><span id="total"></span></h5>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
        $('#compra').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
            }
        });
    });
</script>
@endsection
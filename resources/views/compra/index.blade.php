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
                                {{ __('Create New') }}
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

                                    <td><?php if ($compra->estado == 1) {
                                            echo 'Activo';
                                        } elseif ($compra->estado == 2) {
                                            echo 'Inactivo';
                                        } ?></td>
                                    <td>
                                        <form action="{{ route('compra.destroy',$compra->id) }}" method="POST">
                                            <a class="btn btn-sm btn-primary " href="{{ route('compra.show',$compra->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i>Anular</button>
                                        </form>
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
@endsection
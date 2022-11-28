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
                            <strong>Cantidad:</strong>
                            {{ $compra->cantidad }}
                        </div>
                        <div class="form-group">
                            <strong>Precio Unitario:</strong>
                            {{ $compra->precio_unitario }}
                        </div>
                        <div class="form-group">
                            <strong>Total:</strong>
                            {{ $compra->total }}
                        </div>
                        <div class="form-group">
                            <strong>Estado:</strong>
                            {{ $compra->estado }}
                        </div>
                        <div class="form-group">
                            <strong>Id Proveedor:</strong>
                            {{ $compra->id_proveedor }}
                        </div>
                        <div class="form-group">
                            <strong>Id Insumo:</strong>
                            {{ $compra->id_insumo }}
                        </div>
                        <div class="form-group">
                            <strong>Id Metodo Pago:</strong>
                            {{ $compra->id_metodo_pago }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

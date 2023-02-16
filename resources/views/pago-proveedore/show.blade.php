@extends('layouts.app')

@section('template_title')
    {{ $pagoProveedore->name ?? 'Show Pago Proveedore' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Pago Proveedore</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('pago-proveedores.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Fecha:</strong>
                            {{ $pagoProveedore->fecha }}
                        </div>
                        <div class="form-group">
                            <strong>Abono:</strong>
                            {{ $pagoProveedore->abono }}
                        </div>
                        <div class="form-group">
                            <strong>Estado:</strong>
                            {{ $pagoProveedore->estado }}
                        </div>
                        <div class="form-group">
                            <strong>Id Medio Pagos:</strong>
                            {{ $pagoProveedore->id_medio_pagos }}
                        </div>
                        <div class="form-group">
                            <strong>Id Compra:</strong>
                            {{ $pagoProveedore->id_compra }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

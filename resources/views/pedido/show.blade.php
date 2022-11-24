@extends('layouts.app')

@section('template_title')
    {{ $pedido->name ?? 'Show Pedido' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Pedido</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('pedidos.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Id Cliente:</strong>
                            {{ $pedido->id_cliente }}
                        </div>
                        <div class="form-group">
                            <strong>Id Municipio:</strong>
                            {{ $pedido->id_municipio }}
                        </div>
                        <div class="form-group">
                            <strong>Id Metodo Entrega:</strong>
                            {{ $pedido->id_metodo_entrega }}
                        </div>
                        <div class="form-group">
                            <strong>Id Medio Pago:</strong>
                            {{ $pedido->id_medio_pago }}
                        </div>
                        <div class="form-group">
                            <strong>Id Metodo Pago:</strong>
                            {{ $pedido->id_metodo_pago }}
                        </div>
                        <div class="form-group">
                            <strong>Direccion:</strong>
                            {{ $pedido->direccion }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha Registro:</strong>
                            {{ $pedido->fecha_registro }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha Entrega:</strong>
                            {{ $pedido->fecha_entrega }}
                        </div>
                        <div class="form-group">
                            <strong>Estado:</strong>
                            {{ $pedido->estado }}
                        </div>
                        <div class="form-group">
                            <strong>Proceso:</strong>
                            {{ $pedido->proceso }}
                        </div>
                        <div class="form-group">
                            <strong>Abono:</strong>
                            {{ $pedido->abono }}
                        </div>
                        <div class="form-group">
                            <strong>Totalpedido:</strong>
                            {{ $pedido->totalpedido }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

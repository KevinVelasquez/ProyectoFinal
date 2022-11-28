@extends('layouts.app')

@section('template_title')
    {{ $proveedor->name ?? 'Show Proveedor' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Proveedor</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('proveedor.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Cedula:</strong>
                            {{ $proveedor->cedula }}
                        </div>
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $proveedor->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Telefono:</strong>
                            {{ $proveedor->telefono }}
                        </div>
                        <div class="form-group">
                            <strong>Pais:</strong>
                            {{ $proveedor->pais }}
                        </div>
                        <div class="form-group">
                            <strong>Departamento:</strong>
                            {{ $proveedor->departamento }}
                        </div>
                        <div class="form-group">
                            <strong>Municipio:</strong>
                            {{ $proveedor->municipio }}
                        </div>
                        <div class="form-group">
                            <strong>Direccion:</strong>
                            {{ $proveedor->direccion }}
                        </div>
                        <div class="form-group">
                            <strong>Email:</strong>
                            {{ $proveedor->email }}
                        </div>
                        <div class="form-group">
                            <strong>Estado:</strong>
                            {{ $proveedor->estado }}
                        </div>
                        <div class="form-group">
                            <strong>Tipo Persona:</strong>
                            {{ $proveedor->tipo_persona }}
                        </div>
                        <div class="form-group">
                            <strong>Regimen:</strong>
                            {{ $proveedor->regimen }}
                        </div>
                        <div class="form-group">
                            <strong>Tipo Comercio:</strong>
                            {{ $proveedor->tipo_comercio }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

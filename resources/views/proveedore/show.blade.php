@extends('layouts.app')

@section('template_title')
    {{ $proveedore->name ?? 'Show Proveedore' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Proveedore</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('proveedores.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Cedula:</strong>
                            {{ $proveedore->cedula }}
                        </div>
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $proveedore->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Telefono:</strong>
                            {{ $proveedore->telefono }}
                        </div>
                        <div class="form-group">
                            <strong>Pais:</strong>
                            {{ $proveedore->pais }}
                        </div>
                        <div class="form-group">
                            <strong>Departamento:</strong>
                            {{ $proveedore->departamento }}
                        </div>
                        <div class="form-group">
                            <strong>Municipio:</strong>
                            {{ $proveedore->municipio }}
                        </div>
                        <div class="form-group">
                            <strong>Direccion:</strong>
                            {{ $proveedore->direccion }}
                        </div>
                        <div class="form-group">
                            <strong>Email:</strong>
                            {{ $proveedore->email }}
                        </div>
                        <div class="form-group">
                            <strong>Estado:</strong>
                            {{ $proveedore->estado }}
                        </div>
                        <div class="form-group">
                            <strong>Tipo Persona:</strong>
                            {{ $proveedore->tipo_persona }}
                        </div>
                        <div class="form-group">
                            <strong>Regimen:</strong>
                            {{ $proveedore->regimen }}
                        </div>
                        <div class="form-group">
                            <strong>Tipo Comercio:</strong>
                            {{ $proveedore->tipo_comercio }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

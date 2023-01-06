@extends('layouts.app')

@section('template_title')
{{ $user->name ?? 'Perfil' }}
@endsection

@section('content')
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="float-left">
                        <span class="card-title">Perfil</span>
                    </div>
                    <div class="float-right">
                        <a class="btn btn-primary" href="{{ route('views.home') }}">Regresar</a>
                    </div>
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <strong>Cédula:</strong>
                        {{ $user->cedula }}
                    </div>
                    <div class="form-group">
                        <strong>Nombre:</strong>
                        {{ $user->nombre }}
                    </div>
                    <div class="form-group">
                        <strong>Correo:</strong>
                        {{ $user->email }}
                    </div>
                    <div class="form-group">
                        <strong>Estado:</strong>
                        {{ $user->estado }}
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection
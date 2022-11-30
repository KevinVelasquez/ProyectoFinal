@extends('layouts.app')

@section('template_title')
    {{ $figura->name ?? 'Show Figura' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Figura</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('figuras.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Etiqueta:</strong>
                            {{ $figura->etiqueta }}
                        </div>
                        <div class="form-group">
                            <strong>Imagen:</strong>
                            {{ $figura->imagen }}
                        </div>
                        <div class="form-group">
                            <strong>Estado:</strong>
                            {{ $figura->estado }}
                        </div>
                        <div class="form-group">
                            <strong>Id Cliente:</strong>
                            {{ $figura->id_cliente }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

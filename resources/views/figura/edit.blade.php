@extends('layouts.app')

@section('template_title')
    Update Figura
@endsection

@section('content')
<div class="container" style="width:50%;margin-left: 25%;">
    <main role="main" class="pb-3">
        <h1>Actualizar Figura</h1>
        <hr />
        
        <form method="POST" action="{{ route('figuras.update', $figura->id) }}" role="form"
            enctype="multipart/form-data">
            {{ method_field('PATCH') }}
            @csrf        
                        
                            <input type="hidden" name="id" {{$figura->id}} />
                            
                            <div class="form-group">
                                {{ Form::label('imagen') }}
                                <image height="200px" src="{{ asset('/storage/images/figuras/' . $figura->imagen) }}" />
                                </td>
                                {{ Form::file('imagen', ['class' => 'form-control-file' . ($errors->has('imagen') ? ' is-invalid' : ''), 'placeholder' => 'Imagen']) }}
                                {!! $errors->first('imagen', '<div class="invalid-feedback">:message</div>') !!}
                            </div>
                            <div class="form-group">
                                {{ Form::label('etiqueta') }}
                                {{ Form::text('etiqueta', $figura->etiqueta, ['class' => 'form-control' . ($errors->has('etiqueta') ? ' is-invalid' : ''), 'placeholder' => 'Etiqueta']) }}
                                {!! $errors->first('etiqueta', '<div class="invalid-feedback">:message</div>') !!}
                            </div>
                            <div class="form-group">
                                {{ Form::label('estado') }}
                                {{ Form::text('estado', $figura->estado, ['class' => 'form-control' . ($errors->has('estado') ? ' is-invalid' : ''), 'placeholder' => 'Estado']) }}
                                {!! $errors->first('estado', '<div class="invalid-feedback">:message</div>') !!}
                            </div>
                            <div class="form-group">
                                {{ Form::label('id_cliente') }}
                                {{ Form::text('id_cliente', $figura->id_cliente, ['class' => 'form-control' . ($errors->has('id_cliente') ? ' is-invalid' : ''), 'placeholder' => 'Id Cliente']) }}
                                {!! $errors->first('id_cliente', '<div class="invalid-feedback">:message</div>') !!}
                            </div>
                            <div class="box-footer mt20">
                                <button type="submit" class="btn btn-primary">Actualizar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

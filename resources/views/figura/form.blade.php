<div class="box box-info padding-1">
    <div class="box-body">
        <div class="form-group">
            {{ Form::label('imagen') }}
            {{ Form::file('imagen', $figura->imagen, ['class' => 'form-control-file' . ($errors->has('imagen') ? ' is-invalid' : ''), 'placeholder' => 'Imagen']) }}
            {!! $errors->first('imagen', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('etiqueta') }}
            {{ Form::text('etiqueta', $figura->etiqueta, ['class' => 'form-control' . ($errors->has('etiqueta') ? ' is-invalid' : ''), 'placeholder' => 'Etiqueta']) }}
            {!! $errors->first('etiqueta', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Cliente') }}
            <select class="form-control" name="id_cliente" id="id_cliente" onchange="info()">
                <option> {{$figura->etiqueta}} </option>
                @forelse($cliente  as $clientes)
                    <option value="{{ $clientes->id }}">
                        {{ $clientes->nombre }}
                    </option>
                @empty <option>No existen</option>
                @endforelse
            </select>
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Crear</button>
    </div>
</div>

<div class="row">

    <div class="col-md-6">
        <div class="form-group row">
            <label class="control-label">Nombre</label>
            <div class="col-sm-9">
                <input id="nombre" class="form-control" />
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group row">
            <label class="control-label">Cédula</label>
            <div class="col-sm-9">
                <input id="cedula" class="form-control" />
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group row">
            <label class="control-label">Telefono</label>
            <div class="col-sm-9">
                <input id="telefono" class="form-control" />
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group row">
            <label class="control-label">Correo</label>
            <div class="col-sm-9">
                <input id="email" class="form-control" />
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group row">
            <label class="control-label">Tipo Persona</label>
            <div class="col-sm-7">
                <select id="tipo_persona" class="form-control">
                    <!-- <option value="0">Selecciones</option>
                                         @forelse($tipo_persona  as $tipo_personas)
                                         <option value="{{$tipo_persona->id}}">
                                        {{ $tipo_personas->tipo_persona}}
                                        </option>
                                         @empty <option>No existen</option>
                                        @endforelse -->
                </select>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group row">
            <label class="control-label">Régimen</label>
            <div class="col-sm-7">
                <select id="regimen" class="form-control">
                </select>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group row">
            <label class="control-label">Tipo Comercio</label>
            <div class="col-sm-7">
                <select id="tipo_comercio" class="form-control">

                </select>
            </div>
        </div>
    </div>


    <div class="col-md-2">
        <div class="form-group row">
            <label class="control-label">Pais</label>
            <div class="col-sm-9">
                <select class="form-control" name="pais" id="pais">
                    @forelse($paises as $pais)
                    <option value="{{$pais->id}}">
                        {{ $pais->nombre}}
                    </option>
                    @empty <option>No existen</option>
                    @endforelse
                </select>
                {!! $errors->first('pais', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group row">
            <label class="control-label">Departamento</label>
            <div class="col-sm-7">
                <select class="form-control" name="departamento" id="departamento">
                    @forelse($departamentos as $departamento)
                    <option value="{{$departamento->id}}">
                        {{ $departamento->nombre}}
                    </option>
                    @empty <option>No existen</option>
                    @endforelse
                </select>
            </div>
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group row">
            <label class="control-label">Municipio</label>
            <div class="col-sm-8">
                <select class="form-control" name="id_municipio" id="id_municipio">
                    @forelse($municipios as $municipio)
                    <option value="{{$municipio->id}}">
                        {{ $municipio->nombre}}
                    </option>
                    @empty <option>No existen</option>
                    @endforelse
                </select>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group row">
            <label class="control-label">Dirección</label>
            <div class="col-sm-9">
                <input id="direccion" name="direccion" class="form-control" />
            </div>
        </div>
    </div>
</div>




</div>
<div class="form-group" style="margin-top: 2%;margin-left: 39%;">
    <input type="submit" value="Crear" class="btn btn-primary" />
    <input type="button" value="Limpiar" class="btn btn-primary" />
    <input type="button" value="Cancelar" class="btn btn-primary" />

</div>
</form>


<!-- scripts -->
<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<script>
    //    <div class="box box-info padding-1">
    //     <div class="box-body">

    //         <div class="form-group">
    //             {{ Form::label('cedula') }}
    //             {{ Form::text('cedula', $cliente->cedula, ['class' => 'form-control' . ($errors->has('cedula') ? ' is-invalid' : ''), 'placeholder' => 'Cedula']) }}
    //             {!! $errors->first('cedula', '<div class="invalid-feedback">:message</div>') !!}
    //         </div>
    //         <div class="form-group">
    //             {{ Form::label('nombre') }}
    //             {{ Form::text('nombre', $cliente->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
    //             {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
    //         </div>
    //         <div class="form-group">
    //             {{ Form::label('telefono') }}
    //             {{ Form::text('telefono', $cliente->telefono, ['class' => 'form-control' . ($errors->has('telefono') ? ' is-invalid' : ''), 'placeholder' => 'Telefono']) }}
    //             {!! $errors->first('telefono', '<div class="invalid-feedback">:message</div>') !!}
    //         </div>
    //         <div class="form-group">
    //             {{ Form::label('pais') }}
    //             {{ Form::text('pais', $cliente->pais, ['class' => 'form-control' . ($errors->has('pais') ? ' is-invalid' : ''), 'placeholder' => 'Pais']) }}
    //             {!! $errors->first('pais', '<div class="invalid-feedback">:message</div>') !!}
    //         </div>
    //         <div class="form-group">
    //             {{ Form::label('departamento') }}
    //             {{ Form::text('departamento', $cliente->departamento, ['class' => 'form-control' . ($errors->has('departamento') ? ' is-invalid' : ''), 'placeholder' => 'Departamento']) }}
    //             {!! $errors->first('departamento', '<div class="invalid-feedback">:message</div>') !!}
    //         </div>
    //         <div class="form-group">
    //             {{ Form::label('municipio') }}
    //             {{ Form::text('municipio', $cliente->municipio, ['class' => 'form-control' . ($errors->has('municipio') ? ' is-invalid' : ''), 'placeholder' => 'Municipio']) }}
    //             {!! $errors->first('municipio', '<div class="invalid-feedback">:message</div>') !!}
    //         </div>
    //         <div class="form-group">
    //             {{ Form::label('direccion') }}
    //             {{ Form::text('direccion', $cliente->direccion, ['class' => 'form-control' . ($errors->has('direccion') ? ' is-invalid' : ''), 'placeholder' => 'Direccion']) }}
    //             {!! $errors->first('direccion', '<div class="invalid-feedback">:message</div>') !!}
    //         </div>
    //         <div class="form-group">
    //             {{ Form::label('email') }}
    //             {{ Form::text('email', $cliente->email, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => 'Email']) }}
    //             {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
    //         </div>
    //         <div class="form-group">
    //             {{ Form::label('estado') }}
    //             {{ Form::text('estado', $cliente->estado, ['class' => 'form-control' . ($errors->has('estado') ? ' is-invalid' : ''), 'placeholder' => 'Estado']) }}
    //             {!! $errors->first('estado', '<div class="invalid-feedback">:message</div>') !!}
    //         </div>
    //         <div class="form-group">
    //             {{ Form::label('tipo_persona') }}
    //             {{ Form::text('tipo_persona', $cliente->tipo_persona, ['class' => 'form-control' . ($errors->has('tipo_persona') ? ' is-invalid' : ''), 'placeholder' => 'Tipo Persona']) }}
    //             {!! $errors->first('tipo_persona', '<div class="invalid-feedback">:message</div>') !!}
    //         </div>
    //         <div class="form-group">
    //             {{ Form::label('regimen') }}
    //             {{ Form::text('regimen', $cliente->regimen, ['class' => 'form-control' . ($errors->has('regimen') ? ' is-invalid' : ''), 'placeholder' => 'Regimen']) }}
    //             {!! $errors->first('regimen', '<div class="invalid-feedback">:message</div>') !!}
    //         </div>
    //         <div class="form-group">
    //             {{ Form::label('tipo_comercio') }}
    //             {{ Form::text('tipo_comercio', $cliente->tipo_comercio, ['class' => 'form-control' . ($errors->has('tipo_comercio') ? ' is-invalid' : ''), 'placeholder' => 'Tipo Comercio']) }}
    //             {!! $errors->first('tipo_comercio', '<div class="invalid-feedback">:message</div>') !!}
    //         </div>

    //     </div>
    //     <div class="box-footer mt20">
    //         <button type="submit" class="btn btn-primary">Submit</button>
    //     </div>
    // </div>
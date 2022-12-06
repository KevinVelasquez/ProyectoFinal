<div class="box box-info padding-1">
    <div class="row">

        <div class="col-md-6">
            <div class="form-group row">
                {{ Form::label('nombre') }}
                <div class="col-sm-9">
                {{ Form::label('nombre') }}
            {{ Form::text('nombre', $proveedore->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>


        <div class="col-md-6">
            <div class="form-group row">
                {{ Form::label('cédula') }}
                <div class="col-sm-9">
                    {{ Form::label('cedula') }}
                    {{ Form::text('cedula', $proveedore->cedula, ['class' => 'form-control' . ($errors->has('cedula') ? ' is-invalid' : ''), 'placeholder' => 'Cedula']) }}
                    {!! $errors->first('cedula', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>


        <div class="col-md-6">
            <div class="form-group row">
                {{ Form::label('teléfono') }}
                <div class="col-sm-9">
                {{ Form::label('telefono') }}
            {{ Form::text('telefono', $proveedore->telefono, ['class' => 'form-control' . ($errors->has('telefono') ? ' is-invalid' : ''), 'placeholder' => 'Telefono']) }}
            {!! $errors->first('telefono', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group row">
                {{ Form::label('correo') }}
                <div class="col-sm-9">
                {{ Form::label('estado') }}
            {{ Form::text('estado', $proveedore->estado, ['class' => 'form-control' . ($errors->has('estado') ? ' is-invalid' : ''), 'placeholder' => 'Estado']) }}
            {!! $errors->first('estado', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group row">
                {{Form::label('Tipo persona') }}
                <div class="col-sm-7">
                    <select class="form-control" name="tipo_persona" id="tipo_persona">
                        {{ $proveedore -> tipo_persona }}
                        @forelse($tipo_persona as $tipo_persona)
                        <option value="{{$tipo_persona->id}}">
                            {{ $tipo_persona->nombre}}
                        </option>
                        @empty <option>No existen</option>
                        @endforelse
                    </select>
                    {!! $errors->first('tipo_persona', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>


        <div class="col-md-4">
            <div class="form-group row">
                {{ Form::label('Régimen')}}
                <div class="col-sm-7">
                    <select class="form-control" name="regimen" id="regimen">
                        {{ $proveedore -> regimen }}
                        @forelse($regimen as $regimen)
                        <option value="{{$regimen->id}}">
                            {{ $regimen->nombre}}
                        </option>
                        @empty <option>No existen</option>
                        @endforelse
                    </select>
                    {!! $errors->first('regimen', '<div class="invalid-feedback">:message</div>') !!}

                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group row">
                {{ Form::label('Tipo Comercio')}}
                <div class="col-sm-7">
                    <select class="form-control" name="tipo_comercio" id="tipo_comercio">
                        {{ $proveedore -> tipo_comercio }}
                        @forelse($tipo_comercio as $tipo_comercio)
                        <option value="{{$tipo_comercio->id}}">
                            {{ $tipo_comercio->nombre}}
                        </option>
                        @empty <option>No existen</option>
                        @endforelse
                    </select>
                    {!! $errors->first('tipo_comercio', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>


        <div class="col-md-2">
            <div class="form-group row">
                {{ Form::label('Pais') }}
                <div class="col-sm-9">
                    <select class="form-control" name="pais" id="pais">
                        {{ $proveedore -> pais }}
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
                {{ Form::label('Departamento')}}
                <div class="col-sm-7">
                    <select class="form-control" name="departamento" id="departamento">
                        {{ $proveedore -> departamento }}
                        @forelse($departamentos as $departamento)
                        <option value="{{$departamento->id}}">
                            {{ $departamento->nombre}}
                        </option>
                        @empty <option>No existen</option>
                        @endforelse
                    </select>
                    {!! $errors->first('departamento', '<div class="invalid-feedback">:message</div>') !!}

                </div>
            </div>
        </div>


        <div class="col-md-2">
            <div class="form-group row">
                {{ Form::label('Municipio') }}
                <div class="col-sm-8">
                    <select class="form-control" name="id_municipio" id="id_municipio">
                        {{ $proveedore -> municipio }}
                        @forelse($municipios as $municipio)
                        <option value="{{$municipio->id}}">
                            {{ $municipio->nombre}}
                        </option>
                        @empty <option>No existen</option>
                        @endforelse
                    </select>
                    {!! $errors->first('municipio', '<div class="invalid-feedback">:message</div>') !!}

                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group row">
                {{ Form::label('direccion') }}
                <div class="col-sm-9">
                {{ Form::label('direccion') }}
            {{ Form::text('direccion', $proveedore->direccion, ['class' => 'form-control' . ($errors->has('direccion') ? ' is-invalid' : ''), 'placeholder' => 'Direccion']) }}
            {!! $errors->first('direccion', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>

        <!-- <div class="col-md-6">
        <div class="form-group row">
            {{ Form::label('estado') }}
            <div class="col-sm-9">
            {{ Form::text('estado', $proveedore->estado, ['class' => 'form-control' . ($errors->has('estado') ? ' is-invalid' : ''), 'placeholder' => 'Estado']) }}
            {!! $errors->first('estado', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        </div>
        </div> -->

        <!-- <div class="form-group">
            {{ Form::label('id_municipio') }}
            {{ Form::text('id_municipio', $proveedore->id_municipio, ['class' => 'form-control' . ($errors->has('id_municipio') ? ' is-invalid' : ''), 'placeholder' => 'Id Municipio']) }}
            {!! $errors->first('id_municipio', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('regimen') }}
            {{ Form::text('regimen', $proveedore->regimen, ['class' => 'form-control' . ($errors->has('regimen') ? ' is-invalid' : ''), 'placeholder' => 'Regimen']) }}
            {!! $errors->first('regimen', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('tipo_comercio') }}
            {{ Form::text('tipo_comercio', $proveedore->tipo_comercio, ['class' => 'form-control' . ($errors->has('tipo_comercio') ? ' is-invalid' : ''), 'placeholder' => 'Tipo Comercio']) }}
            {!! $errors->first('tipo_comercio', '<div class="invalid-feedback">:message</div>') !!}
        </div> -->

    </div>
    <!-- <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div> -->

    <div class="box-footer mt20">

        <button type="submit" class="btn btn-primary">Registrar</button>
        <button type="reset" value="Borrar" class="btn btn-primary">Limpiar</button>
        <a data-toggle="modal" data-target="#Cancelarproveedor" class="btn btn-primary btn-lg active" aria-pressed="true">Cancelar</a>
    </div>
</div>


<div class="modal fade" id="Cancelarproveedor" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ¿Desea cancelar el registro del proveedor?
            </div>
            <div class="modal-footer">
                <a href="{{ route('proveedore.index') }}" class="btn btn-primary btn-lg active" role="button" aria-hidden="true">Si</a>
                <a href="{{ route('proveedore.create') }}" class="btn btn-primary btn-lg active" role="button" data-dismiss="modal">No</a>
                </a>
            </div>
        </div>
    </div>
</div>
</div>










































<div class="box box-info padding-1">
    <div class="row">

        <div class="col-md-6">
            <div class="form-group row">
                {{ Form::label('nombre') }}
                <div class="col-sm-9">
                    {{ Form::text('nombre', $cliente->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
                    {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>


        <div class="col-md-6">
            <div class="form-group row">
                {{ Form::label('cédula') }}
                <div class="col-sm-9">
                    {{ Form::text('cedula', $cliente->cedula, ['class' => 'form-control' . ($errors->has('cedula') ? ' is-invalid' : ''), 'placeholder' => 'Cédula']) }}
                    {!! $errors->first('cedula', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>


        <div class="col-md-6">
            <div class="form-group row">
                {{ Form::label('teléfono') }}
                <div class="col-sm-9">
                    {{ Form::text('telefono', $cliente->telefono, ['class' => 'form-control' . ($errors->has('telefono') ? ' is-invalid' : ''), 'placeholder' => 'Teléfono']) }}
                    {!! $errors->first('telefono', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group row">
                {{ Form::label('correo') }}
                <div class="col-sm-9">
                    {{ Form::text('email', $cliente->email, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => 'Correo']) }}
                    {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group row">
                {{Form::label('Tipo persona') }}
                <div class="col-sm-7">
                    <select class="form-control" name="tipo_persona" id="tipo_persona">
                        {{ $cliente -> tipo_persona }}
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
                        {{ $cliente -> regimen }}
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
                        {{ $cliente -> tipo_comercio }}
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
                        {{ $cliente -> pais }}
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
                        {{ $cliente -> departamento }}
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
                        {{ $cliente -> municipio }}
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
                    {{ Form::text('direccion', $cliente->direccion, ['class' => 'form-control' . ($errors->has('direccion') ? ' is-invalid' : ''), 'placeholder' => 'Direccion']) }}
                    {!! $errors->first('direccion', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>

        <!-- <div class="col-md-6">
        <div class="form-group row">
            {{ Form::label('estado') }}
            <div class="col-sm-9">
            {{ Form::text('estado', $cliente->estado, ['class' => 'form-control' . ($errors->has('estado') ? ' is-invalid' : ''), 'placeholder' => 'Estado']) }}
            {!! $errors->first('estado', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        </div>
        </div> -->

        <!-- <div class="form-group">
            {{ Form::label('id_municipio') }}
            {{ Form::text('id_municipio', $cliente->id_municipio, ['class' => 'form-control' . ($errors->has('id_municipio') ? ' is-invalid' : ''), 'placeholder' => 'Id Municipio']) }}
            {!! $errors->first('id_municipio', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('regimen') }}
            {{ Form::text('regimen', $cliente->regimen, ['class' => 'form-control' . ($errors->has('regimen') ? ' is-invalid' : ''), 'placeholder' => 'Regimen']) }}
            {!! $errors->first('regimen', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('tipo_comercio') }}
            {{ Form::text('tipo_comercio', $cliente->tipo_comercio, ['class' => 'form-control' . ($errors->has('tipo_comercio') ? ' is-invalid' : ''), 'placeholder' => 'Tipo Comercio']) }}
            {!! $errors->first('tipo_comercio', '<div class="invalid-feedback">:message</div>') !!}
        </div> -->

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
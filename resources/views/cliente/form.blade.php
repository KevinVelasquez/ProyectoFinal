<div class="box box-info padding-1">
    <div class="row">

        <div class="col-md-6">
            <div class="form-group row">
                <label for="nombre">Nombre</label>
                <div class="col-sm-9">
                    <input type="text" name="nombre" value="{{ isset($cliente->nombre)?$cliente->nombre:'' }}" id="nombre" class="form-control">
                </div>
            </div>
        </div>


        <div class="col-md-6">
            <div class="form-group row">
                <label for="cedula">Cédula</label>
                <div class="col-sm-9">
                    <input type="text" name="cedula" value="{{ isset($cliente->cedula)?$cliente->cedula:'' }}" id=" cedula" class="form-control">
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group row">
                <label for="telefono">Teléfono</label>
                <div class="col-sm-9">
                    <input type="text" name="telefono" value="{{ isset($cliente->telefono)?$cliente->telefono:'' }}" id=" telefono" class="form-control">
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group row">
                <label for="email">Correo</label>
                <div class="col-sm-9">
                    <input type="text" name="email" value="{{ isset($cliente->email)?$cliente->email:'' }}" id=" email" class="form-control">
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group row">
                <label for="tipo_persona">Tipo persona</label>
                <div class="col-sm-7">
                    <select class="form-control" name="tipo_persona"  id="tipo_persona">
                        <option value="0">Seleccione</option>
                        @forelse($tipo_persona as $tipo_personas)
                        <option value="{{$tipo_personas->id}}">
                            {{ $tipo_personas->nombre}}
                        </option>
                        @empty <option>No existen</option>
                        @endforelse
                    </select>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group row">
                <label for="regimen">Régimen</label>
                <div class="col-sm-7">
                    
                    <select class="form-control" name="regimen"   id="regimen">
                        <option value="0">Seleccione</option>
                        @forelse($regimen as $regimens)
                        <option value="{{$regimens->id}}">
                            {{ $regimens->nombre}}
                        </option>
                        @empty <option>No existen</option>
                        @endforelse
                    </select>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group row">
                <label for="tipo_comercio">Tipo comercio</label>
                <div class="col-sm-7">
                    <select class="form-control" name="tipo_comercio"  id="tipo_comercio">
                        <option value="0">Seleccione</option>
                        @forelse($tipo_comercio as $tipo_comercios)
                        <option value="{{$tipo_comercios->id}}">
                            {{ $tipo_comercios->nombre}}
                        </option>
                        @empty <option>No existen</option>
                        @endforelse
                    </select>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group row">
                <label for="">País</label>
                <div class="col-sm-9">
                    <select class="form-control" name="pais"  id="pais">
                        <option value="0">Seleccione</option>
                        @forelse($paises as $pais)
                        <option value="{{$pais->id}}">
                            {{ $pais->nombre}}
                        </option>
                        @empty <option>No existen</option>
                        @endforelse
                    </select>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group row">
                <label for="">Departamento</label>
                <div class="col-sm-7">
                    <select class="form-control" name="departamento"  id="departamento">
                        <option value="0">Seleccione</option>
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
                <label for="id_municipio">Municipio</label>
                <div class="col-sm-8">
                    <select class="form-control" name="id_municipio"   id="id_municipio">
                        <option value="0">Seleccione</option>
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
                <label for="direccion">Dirección</label>
                <div class="col-sm-9">
                    <input type="text" name="direccion" value="{{ isset($cliente->direccion)?$cliente->direccion:'' }}" id=" direccion" class="form-control">
                </div>
            </div>
        </div>
    </div>
    <!-- <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button> -->
</div>

<div class="box-footer mt20">

    <button type="submit" class="btn btn-primary">Registrar</button>
    <button type="reset" value="Borrar" class="btn btn-primary">Limpiar</button>

    <a href="{{ route('cliente.index') }}" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Cancelar</a>

</div>


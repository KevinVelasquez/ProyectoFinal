<div class="box box-info padding-1">
    <div class="row">

        <div class="col-md-6">
            <div class="form-group row">
                <label for="nombre">Nombre</label>
                <div class="col-sm-9">
                    <input type="text" name="nombre" value="{{ $cliente->nombre }}" id="nombre" class="form-control">
                </div>
            </div>
        </div>


        <div class="col-md-6">
            <div class="form-group row">
                <label for="cedula">Cédula</label>
                <div class="col-sm-9">
                    <input type="text" name="cedula" value="{{ $cliente->cedula }}" id=" cedula" class="form-control">
                </div>
            </div>
        </div>


        <div class="col-md-6">
            <div class="form-group row">
                <label for="telefono">Teléfono</label>
                <div class="col-sm-9">
                    <input type="text" name="telefono" value="{{ $cliente->telefono }}" id=" telefono" class="form-control">
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group row">
                <label for="email">Correo</label>
                <div class="col-sm-9">
                    <input type="text" name="email" value="{{ $cliente->email }}" id=" email" class="form-control">
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group row">
                <label for="tipo_persona">Tipo persona</label>
                <div class="col-sm-7">
                    <!-- <select class="form-control" name="tipo_persona" id="tipo_persona">
                            <option value="1">Natural</option>
                            <option value="2">Jurídico</option>
                        </select> -->

                    <select class="form-control" name="tipo_persona" id="tipo_persona">
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
                    <!-- <select class="form-control" name="regimen" id="regimen">
                            <option value="1">Simple</option>
                            <option value="2">Contributivo</option>
                        </select> -->

                    <select class="form-control" name="regimen" id="regimen">
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
                    <!-- <select class="form-control" name="tipo_comercio" id="tipo_comercio">
                            <option value="1">Mayorista</option>
                            <option value="2">Minorista</option>
                        </select> -->

                    <select class="form-control" name="tipo_comercio" id="tipo_comercio">
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
                    <!-- <select class="form-control" name="" id="">
                            <option value="1">Colombia</option>
                            <option value="2">Venezuela</option>
                        </select> -->

                    <select class="form-control" name="pais" id="pais">
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
                    <!-- <select class="form-control" name="" id="">
                            <option value="1">Antioquia</option>
                            <option value="2">Bogotá</option>
                        </select> -->

                    <select class="form-control" name="departamento" id="departamento">
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
                    <!-- <select class="form-control" name="id_municipio" id="id_municipio">

                            <option value="1">Medellin</option>
                            <option value="2">Bello</option>
                        </select> -->

                    <select class="form-control" name="id_municipio" id="id_municipio">
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
                    <input type="text" name="direccion" value="{{ $cliente->direccion }}" id=" direccion" class="form-control">
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
    <a data-toggle="modal" data-target="#CancelarCliente" class="btn btn-primary btn-lg active" aria-pressed="true">Cancelar</a>
</div>


<div class="modal fade" id="CancelarCliente" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ¿Desea cancelar el registro del cliente?
            </div>
            <div class="modal-footer">
                <a href="{{ route('cliente.index') }}" class="btn btn-primary btn-lg active" role="button" aria-hidden="true">Si</a>
                <a href="{{ route('cliente.create') }}" class="btn btn-primary btn-lg active" role="button" data-dismiss="modal">No</a>
                </a>
            </div>
        </div>
    </div>
</div>
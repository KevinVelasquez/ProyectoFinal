<div class="box box-info padding-1">
    <div class="row">
        

            <div class="col-md-6">
                <div class="form-group row">
                    <label for="nombre">Nombre</label>
                    <div class="col-sm-9">
                        <input type="text" name="nombre" value="{{ isset($proveedor->nombre)?$proveedor->nombre:'' }}" id="nombre" class="form-control" required>
                        <div class="invalid-feedback">
                            El nombre es requerido
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-md-6">
                <div class="form-group row">
                    <label for="cedula">Cédula</label>
                    <div class="col-sm-9">
                        <input type="text" name="cedula" value="{{  isset($proveedor->cedula)?$proveedor->cedula:'' }}" id="cedula" class="form-control" required>
                        <div class="invalid-feedback">
                            La cédula es requerida
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-md-6">
                <div class="form-group row">
                    <label for="telefono">Teléfono</label>
                    <div class="col-sm-9">
                        <input type="text" name="telefono" value="{{ isset($proveedor->telefono)?$proveedor->telefono:'' }}" id="telefono" class="form-control" required>
                        <div class="invalid-feedback">
                            El teléfono es requerido
                        </div>
                    </div>
                </div>
            </div>

            
            <div class="col-md-6">
                <div class="form-group row">
                    <label for="email">Correo</label>
                    <div class="col-sm-9">
                        <input type="text" name="email" value="{{ isset($proveedor->email)?$proveedor->email:'' }}" id="email" class="form-control" required>
                        <div class="invalid-feedback">
                            El correo es requerido
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-md-4">
                <div class="form-group row">
                    <label for="tipo_persona">Tipo persona</label>
                    <div class="col-sm-7">
                        <select class="form-control" name="tipo_persona" id="tipo_persona" required>
                            <option selected disabled value="">Seleccione</option>
                            @forelse($tipo_persona as $tipo_personas)
                            <option value="{{$tipo_personas->id}} ">
                                {{ $tipo_personas->nombre}}
                            </option>
                            @empty <option>No existen</option>
                            @endforelse
                        </select>
                        <div class="invalid-feedback">
                            Seleccione una opción
                        </div>
                    </div>
                </div>
            </div>



            <div class="col-md-4">
                <div class="form-group row">
                    <label for="regimen">Régimen</label>
                    <div class="col-sm-7">
                        <select class="form-control" name="regimen" id="regimen" required>
                            <option selected disabled value="">Seleccione</option>
                            @forelse($regimen as $regimens)
                            <option value="{{$regimens->id}}">
                                {{ $regimens->nombre}}
                            </option>
                            @empty <option>No existen</option>
                            @endforelse
                        </select>
                        <div class="invalid-feedback">
                            Seleccione una opción
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-md-4">
                <div class="form-group row">
                    <label for="tipo_comercio">Tipo comercio</label>
                    <div class="col-sm-7">
                        <select class="form-control" name="tipo_comercio" id="tipo_comercio" required>
                            <option selected disabled value="">Seleccione</option>
                            @forelse($tipo_comercio as $tipo_comercios)
                            <option value="{{$tipo_comercios->id}}">
                                {{ $tipo_comercios->nombre}}
                            </option>
                            @empty <option>No existen</option>
                            @endforelse
                        </select>
                        <div class="invalid-feedback">
                            Seleccione una opción
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-md-2">
                <div class="form-group row">
                    <label for="pais">País</label>
                    <div class="col-sm-9">
                        <select class="form-control" name="pais" id="pais" required>
                            <option selected disabled value="">Seleccione</option>
                            @forelse($paises as $pais)
                            <option value="{{$pais->id}}">
                                {{ $pais->nombre}}
                            </option>
                            @empty <option>No existen</option>
                            @endforelse
                        </select>
                        <div class="invalid-feedback">
                            Seleccione una opción
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-2">
                <div class="form-group row">
                    <label for="departamento">Departamento</label>
                    <div class="col-sm-7">
                        <select class="form-control" name="departamento" id="departamento" required>
                            <option selected disabled value="">Seleccione</option>
                            @forelse($departamentos as $departamento)
                            <option value="{{$departamento->id}}">
                                {{ $departamento->nombre}}
                            </option>
                            @empty <option>No existen</option>
                            @endforelse
                        </select>
                        <div class="invalid-feedback">
                            Seleccione una opción
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-md-2">
                <div class="form-group row">
                    <label for="id_municipio">Municipio</label>
                    <div class="col-sm-8">
                        <select class="form-control" name="id_municipio" id="id_municipio" required>

                            <option selected disabled value="">Seleccione</option>
                            @forelse($municipios as $municipio)
                            <option value="{{$municipio->id}}">
                                {{ $municipio->nombre}}
                            </option>
                            @empty <option>No existen</option>
                            @endforelse
                        </select>
                        <div class="invalid-feedback">
                            Seleccione una opción
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-md-6">
                <div class="form-group row">
                    <label for="direccion">Dirección</label>
                    <div class="col-sm-9">
                        <input type="text" name="direccion" value="{{ isset($proveedor->direccion)?$proveedor->direccion:'' }}" id="direccion" class="form-control" required>
                        <div class="invalid-feedback">
                            La dirección es requerida
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

        <a href="{{ route('proveedor.index') }}" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Cancelar</a>
    </div>



</div>

<script>
    (function() {
    'use strict'
    var forms = document.querySelectorAll('.needs-validation')
    Array.prototype.slice.call(forms)
        .forEach(function(form) {
            form.addEventListener('submit', function(event) {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }
                form.classList.add('was-validated')
            }, false)
        })
})()
</script>
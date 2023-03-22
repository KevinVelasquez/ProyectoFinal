<div class="box box-info padding-1">
    <div class="row">

        <div class="col-md-6">
            <div class="form-group row">
                <label for="nombre">Nombre</label>
                <div class="col-sm-9">
                    <input type="text" name="nombre" value="{{ isset($cliente->nombre)?$cliente->nombre:'' }}" id="nombre" class="form-control" required>
                     
                </div>
            </div>
        </div>


        <div class="col-md-6">
            <div class="form-group row">
                <label for="cedula">Cédula/Nit</label>
                <div class="col-sm-9">
                    <input id="cedula" type="text" class="form-control @error('cedula') is-invalid @enderror" name="cedula" value="{{ old('cedula') }}" required autocomplete="cedula">
                    @error('cedula')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
        </div>


        <div class="col-md-6">
            <div class="form-group row">
                <label for="telefono">Teléfono</label>
                <div class="col-sm-9">
                    <input type="text" name="telefono" value="{{ isset($cliente->telefono)?$cliente->telefono:'' }}" id=" telefono" class="form-control" required>
                    
                </div>
            </div>
        </div>


        <div class="col-md-6">
            <div class="form-group row">
                <label for="email">Correo</label>
                <div class="col-sm-9">
                    <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
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

                    <select class="form-control" name="regimen" id="regimen" required>
                        <option selected disabled value="">Seleccione</option>
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
                    <select class="form-control" name="tipo_comercio" id="tipo_comercio" required>
                        <option selected disabled value="">Seleccione</option>
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
                    <select class="form-control" name="pais" id="pais" onchange="filtrarDepartamentos()" required>
                        <option selected disabled value="">Seleccione</option>
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
                    <select class="form-control" name="departamento" id="departamento" onchange="filtrarMunicipios()" required>
                        <option selected disabled value="">Seleccione</option>
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
                    <select class="form-control" name="id_municipio" id="id_municipio" required>
                        <option selected disabled value="">Seleccione</option>
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
                    <input type="text" name="direccion" value="{{ isset($cliente->direccion)?$cliente->direccion:'' }}" id=" direccion" class="form-control" required>
                    
                </div>
            </div>
        </div>
    </div>

</div>

<div class="form-group" style="margin-top: 2%;margin-left: 35%;">

    <button type="submit" class="btn btn-primary" style="background-color: #81242E;
                            border-color: #81242E; margin: 10px;  margin-top: 6%;""  >Registrar</button>
    <button type="reset" value="Borrar" class="btn btn-primary" style="background-color: #B0B0B0;
                            border-color: #B0B0B0;">Limpiar</button>

    <a class="btn btn-primary" href="{{ route('cliente.index') }}" style="background-color: #565656;
                            border-color: #565656; margin: 10px;  margin-top: 6%;">Cancelar</a>

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

function filtrarDepartamentos() {
    var pais = document.getElementById("pais").value;
    var selectordepartamentos = document.getElementById("departamento");
    selectordepartamentos.innerHTML = "<option value='' selected disabled>Seleccione</option>";
    let paisseleccion = [];
    let departamentos = <?php echo $departamentos; ?>;
    departamentos.forEach(function(value, index) {
        paisseleccion[index] = value;
        if (paisseleccion[index].id_paises == pais) {
            $("#departamento").append(`
                <option value="${paisseleccion[index].id}">${paisseleccion[index].nombre}</option>
            `);
        }
    });
}


    function filtrarMunicipios() {

        var departamento = document.getElementById("departamento").value;
        var selectormunicipios = document.getElementById("id_municipio");
        selectormunicipios.innerHTML = "<option value='' selected disabled>Seleccione</option>";
        let departamentoseleccion = [];
        let municipios = <?php echo $municipios; ?>;
        console.log(departamento)
        municipios.forEach(function(value, index) {
            departamentoseleccion[index] = value;
            if (departamentoseleccion[index].id_departamentos == departamento) {
                $("#id_municipio").append(    
                `
                <option value="${departamentoseleccion[index].id}"/>${departamentoseleccion[index].nombre}
                `);
            }
        });
    }
</script>
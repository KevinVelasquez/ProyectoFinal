@extends('layouts.app')

@section('template_title')
    Update Cliente
@endsection

@section('content')
<div class="container">
    <main role="main" class="pb-3">

                @includeif('partials.errors')

                        @if (Session::has('mensaje'))
                            {{ Session::get('mensaje') }}
                        @endif

                        <h1>Actualizar Cliente</h1>
        <hr />
                
                <div class="card-body">
                    <form method="POST" action="{{ route('cliente.update', $cliente->id) }}" role="form" enctype="multipart/form-data"  class="row g-3 needs-validation" novalidate>
                        @csrf
                        {{ method_field('PATCH') }}


                        <div class="box box-info padding-1">
                        @if (session('error'))
                                    <div class="alert alert-danger" role="alert">
                                    {{ session('error') }}
                                    </div>
        @endif
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
                                            <input type="text" name="cedula" value="{{ isset($cliente->cedula)?$cliente->cedula:'' }}" id=" cedula" class="form-control" required>
                                            
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
                                            <input type="text" name="email" value="{{ isset($cliente->email)?$cliente->email:'' }}" id=" email" class="form-control" required>
                                            
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <label for="tipo_persona">Tipo persona</label>
                                        <div class="col-sm-7">
                                            <select class="form-control" name="tipo_persona" id="tipo_persona" required>
                                                @forelse($tipo_persona as $tipo_personas)
                                                    <option value="{{$tipo_personas->id}}" {{ $tipo_personas->id == $cliente->tipo_persona ? 'selected' : '' }}>
                                                        {{ $tipo_personas->nombre }}
                                                    </option>                                                
                                                @empty
                                                    <option>No existen</option>
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
                                                    @forelse($regimen as $regi)
                                                        <option value="{{$regi->id}}" {{ $regi->id == $cliente->regimen ? 'selected' : '' }}>
                                                            {{ $regi->nombre }}
                                                        </option>                                                
                                                    @empty
                                                        <option>No existen</option>
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
                                                @forelse($tipo_comercio as $tipocomercio)
                                                    <option value="{{$tipocomercio->id}}" {{ $tipocomercio->id == $cliente->tipo_comercio ? 'selected' : '' }}>
                                                        {{ $tipocomercio->nombre }}
                                                    </option>                                                
                                                @empty
                                                    <option>No existen</option>
                                                @endforelse
                                            </select> 
                                            
                                        </div>
                                    </div>
                                </div>


                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label for="">País</label>
                                            <div class="col-sm-7">
                                                <select class="form-control" name="pais" id="pais"
                                                    onchange="filtrarDepartamentos()" required>
                                                    <option value="">Seleccione</option>
                                                    @forelse($paises as $pais)
                                                        <option value="{{ $pais->id }}" selected>
                                                            {{ $pais->nombre }}
                                                        </option>
                                                    @empty <option>No existen</option>
                                                    @endforelse
                                                </select>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label for="">Departamento</label>
                                            <div class="col-sm-7">
                                                <select class="form-control" name="departamento" id="departamento"
                                                    onchange="filtrarMunicipios()" required>
                                                    <option value="">Seleccione</option>
                                                    @forelse($departamentos as $departamento)
                                                        <option value="{{ $departamento->id }}" selected>
                                                            {{ $departamento->nombre }}
                                                        </option>
                                                    @empty <option>No existen</option>
                                                    @endforelse
                                                </select>

                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label for="id_municipio">Municipio</label>
                                            <div class="col-sm-7">
                                                <select class="form-control" name="id_municipio" id="id_municipio"
                                                    required>
                                                    <option value="">Seleccione</option>
                                                    @forelse($municipios as $municipio)
                                                        <option value="{{ $municipio->id }}"
                                                            {{ $municipio->id == $cliente->id_municipio ? 'selected' : '' }}>
                                                            {{ $municipio->nombre }}
                                                        </option>
                                                    @empty
                                                        <option>No existen</option>
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

                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="estado">Estado</label>
                                            <div class="col-sm-9">
                                                <select class="form-control" name="estado" id="editarEstado" required>
                                                    <option value="1">Activo</option>
                                                    <option value="0">Inactivo</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    
                            </div>

                        </div>

                            <div class="form-group" style="margin-top: 2%;margin-left: 35%;">

                                <button type="submit" class="btn btn-primary" style="background-color: #81242E;
                                border-color: #81242E;" >Actualizar</button>

                                
                                    <a class="btn btn-primary" href="{{ route('cliente.index') }}" style="background-color: #565656;
                                border-color: #565656; margin: 10px;  margin-top: 6%;">Cancelar</a>
                            </div>

                    </form>
                </div>
                
            

        </main>
</div>

        <script>
            $(document).ready(function() {
                let cliente = {!! $clienteEstado->estado !!}
                $('#editarEstado').val(`${cliente}`)
            })

            let idmunicipio = document.getElementById('id_municipio').value;
            let todoMunicipios = <?php echo $municipios; ?>;
            let idDepartMunici = todoMunicipios.find(item => item.id == idmunicipio)
            let iddepartamento = `${idDepartMunici.id_departamentos}`
            let departament = <?php echo $departamentos; ?>;
            let depa = departament.find(item => item.id == iddepartamento)
            $('#departamento').val(`${depa.id}`);
            let idpaisdepa = `${depa.id_paises}`;
            let todoPaises = <?php echo $paises; ?>;
            let paises = todoPaises.find(item => item.id == idpaisdepa)
            $('#pais').val(`${paises.id}`);

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

    </section>
@endsection

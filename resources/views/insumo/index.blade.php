@extends('layouts.app')

@section('template_title')
Insumo
@endsection

@section('content')
<div class="container">
    <main role="main" class="pb-3">
    <div class="content-wrapper">
          <div class="row">
            <div class="col-sm-6" id="tituloinicial">
              <h3 class="mb-0 font-weight-bold">Insumos</h3>
            </div>
          </div>
    </div>
        <p>
            <a class="mdi mdi-plus-circle-multiple-outline" id="iconoadd" data-toggle="modal" data-target="#crearmodal" ></a>
        </p>
        <table id="insumos" class="table table-striped dt-responsive nowrap table" style="width:100%">
            <thead>
                <tr>
                    
                    <th>Nombre</th>
                    <th>Medidas</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($insumo as $insumos)
                                <tr>
                                            
											<td>{{ $insumos->nombre }}</td>
											<td>{{ $insumos->medidas }}</td>
                                            <td><?php if ($insumos->estado == 1) {
                                            echo 'Disponible';
                                            } else {
                                            echo 'No Disponible';
                                            }  ?></td>
                                            <td>
                                <button onclick="editarInsumo('{{ $insumos->id }}')" class="mdi mdi-lead-pencil"
                                    data-toggle="modal" data-target="#editarmodal"></button>
                                    <button onclick="eliminarInsumo('{{ $insumos->id }}')" class="mdi mdi-trash-can-outline"
                                    data-toggle="modal" data-target="#eliminarmodal"></button>
                            </td>
                        </tr>
                @endforeach
            </tbody>
        </table>
        @if (session('error'))
            <div class="alert alert-danger" role="alert">
                {{ session('error') }}
            </div>
        @endif
     </main>     
</div>


<!-- modal crear -->
<div class="modal fade" id="crearmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document" id="modalcrear" style="max-width: 36%;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitlecrear">Crear Insumo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="contenidocrear">
                    <div class="col-12 grid-margin">
                        <div class="card">
                            <div class="card-body">

                                <form method="POST" 
                               action= "{{route('insumos.store')}}"  
                               class="form-sample needs-validation" novalidate
                                    role="form" enctype="multipart/form-data" id="crear-form">
                                    @method('POST')
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group row">
                                                <label class="col-sm-9 col-form-label">Nombre</label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre"
                                                        id="crearnombre" required>
                                                        <div class="invalid-feedback"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>    
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group row">
                                                <label class="col-sm-9 col-form-label">Medidas</label>
                                                <div class="col-sm-12">
                                                    <select class="form-control" name="id_medidas"
                                                        id="crearmedidas" required>
                                                        <option selected disabled value="">Seleccione</option>
                                                        <option value="Metros">Metros</option>
                                                        <option value="Centimetros">Centimetros</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" id="crear-insumo" class="btn btn-primary" style="background-color: #81242E;
                            border-color: #81242E;" >Crear</button>
                            <a class="btn btn-primary" href="{{ route('insumos.index')}}" style="margin: 10px; background-color: #81242E;
                            border-color: #81242E;">Cancelar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>

<!-- modal editar -->
<div class="modal fade" id="editarmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document" id="modalactualizar" style="max-width: 36%;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitleeditar"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="contenidoactualizar">
                    <div class="col-12 grid-margin">
                        <div class="card">
                            <div class="card-body">

                                <form id="actualizar-form" method="POST" action="{{ route('insumos.updateInsumos') }}" 
                                class="form-sample needs-validation" novalidate
                                    role="form" enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf
                                    <input type="hidden" name="id" id="idinsumoeditar" />
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group row">
                                                <label class="col-sm-9 col-form-label">Nombre</label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre"
                                                        id="editarnombre" required>
                                                        <div class="invalid-feedback">{{ $errors->first('nombre') }}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group row">
                                                <label class="col-sm-9 col-form-label">Medidas</label>
                                                <div class="col-sm-12">
                                                    <select class="form-control" name="id_medidas"
                                                        id="editarmedidas" required>
                                                        <option value="Metros">Metros</option>
                                                        <option value="Centimetros">Centimetros</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group row">
                                                <label class="col-sm-9 col-form-label">Estado</label>
                                                <div class="col-sm-12">
                                                <select class="form-control" name="id_estado"
                                                        id="editarestado" required>
                                                        <option value="1">Disponible</option>
                                                        <option value="0">No Disponible</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" style="background-color: #81242E;
                            border-color: #81242E;">Actualizar</button>
                            <a class="btn btn-primary" href="{{ route('insumos.index')}}" style="margin: 10px; 
                            background-color: #81242E; border-color: #81242E;">Cancelar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>

     <!-- modal anular -->
     <div class="modal fade" id="anularmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitleanular"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="text-align: center;">
                    <input type="hidden" name="estadoanular" id="estadoanular" />
                    <form method="POST" action="{{ route('insumos.anularInsumo') }}" class="form-sample"
                        role="form" enctype="multipart/form-data">
                        @method('PATCH')
                        @csrf
                        <div>¿Está seguro que desea anular el insumo?</div>
                        <input type="hidden" name="idanular" id="idanular" />
                        <input type="hidden" name="anulardato" value="2" />
                        <button type="submit" class="btn btn-primary">Si</button>
                        <button type="button" class="btn btn-primary" data-dismiss="modal">No</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

     <!-- modal eliminar -->
     <div class="modal fade" id="eliminarmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitleeliminar">Eliminar Insumo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="text-align: center;">
                    <form method="POST" action="{{ route('insumos.eliminarInsumo') }}" class="form-sample"
                        role="form" enctype="multipart/form-data">
                        @method('DELETE')
                        @csrf
                        <div>¿Está seguro que desea eliminar el insumo?</div>
                        <input type="hidden" name="ideliminar" id="ideliminar" />
                        <button type="submit" class="btn btn-primary" style="background-color: #81242E;
                            border-color: #81242E;">Si</button>
                        <button type="button" class="btn btn-primary" style="background-color: #81242E;
                            border-color: #81242E;" data-dismiss="modal">No</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
<script>
    $(document).ready(function () {
        $('#insumos').DataTable(
            { 
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
                }
            });
    });

    $('#crear-form').submit(function(event) {
        event.preventDefault(); // Previene la acción predeterminada del formulario

        $.ajax({
            url: $(this).attr('action'), // La URL a la que enviar la petición AJAX
            type: $(this).attr('method'), // El método HTTP a utilizar (POST en este caso)
            data: new FormData(this), // Los datos del formulario en formato FormData
            processData: false, // No procesa los datos de forma convencional (necesario para enviar archivos)
            contentType: false, // No establece el tipo de contenido (necesario para enviar archivos)
            success: function(response) {
                // La respuesta del servidor es correcta, cierra el modal
                $('#crearmodal').modal('hide');
                location.reload();
            },
            error: function(xhr) {
                // La respuesta del servidor contiene un error de validación
                if (xhr.status === 422) {
                    var errors = xhr.responseJSON.errors;
                    $.each(errors, function(key, value) {
                        $('#crearnombre').addClass('is-invalid');
                        $('#crearnombre').next('.invalid-feedback').text(value[0])
                    });
                }
            }
        });
    });



    function editarInsumo(id) {
            let consulta = {!! $editarinsumo !!}
            let editardatos = consulta.find(item => item.id == id)
            $('#exampleModalLongTitleeditar').text(`Actualizar Insumo`);
            $('#editarnombre').val(`${editardatos.nombre}`);
            $('#editarmedidas').val(`${editardatos.medidas}`);
            $('#editarestado').val(`${editardatos.estado}`);
            $('#idinsumoeditar').val(`${editardatos.id}`);
            let idinsumo = `${editardatos.id}`;

        }

        $('#actualizar-form').submit(function(event) {
        event.preventDefault(); // Previene la acción predeterminada del formulario

        $.ajax({
            url: $(this).attr('action'), // La URL a la que enviar la petición AJAX
            type: $(this).attr('method'), // El método HTTP a utilizar (POST en este caso)
            data: new FormData(this), // Los datos del formulario en formato FormData
            processData: false, // No procesa los datos de forma convencional (necesario para enviar archivos)
            contentType: false, // No establece el tipo de contenido (necesario para enviar archivos)
            success: function(response) {
                // La respuesta del servidor es correcta, cierra el modal
                $('#editarmodal').modal('hide');
                location.reload();
            },
            error: function(xhr) {
                // La respuesta del servidor contiene un error de validación
                if (xhr.status === 422) {
                    var errors = xhr.responseJSON.errors;
                    $.each(errors, function(key, value) {
                        $('#editarnombre').addClass('is-invalid');
                        $('#editarnombre').next('.invalid-feedback').text(value[0])
                    });
                }
            }
        });
    });

        function anularInsumo(id) {
            let consulta = {!! $editarinsumo !!}
            let datos = consulta.find(item => item.id == id)
            $('#exampleModalLongTitleanular').text(`Anular Insumo #${datos.id}`);
            $('#idanular').val(`${datos.id}`);
            $('#estadoanular').val(`${datos.estado}`);

        }

        function eliminarInsumo(id) {
            let consulta = {!! $editarinsumo !!}
            let datos = consulta.find(item => item.id == id)
            $('#exampleModalLongTitleanular').text(`Eliminar Insumo #${datos.id}`);
            $('#ideliminar').val(`${datos.id}`);
            

        }

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
@endsection
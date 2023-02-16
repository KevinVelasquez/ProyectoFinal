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
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Medidas</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($insumo as $insumos)
                                        <tr>
                                            <td>{{ $insumos->id }}</td>
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
                                <!-- <button onclick="anularInsumo('{{ $insumos->id }}')" class="mdi mdi-block-helper"
                                    data-toggle="modal" data-target="#anularmodal"></button> -->
                                    <button onclick="eliminarInsumo('{{ $insumos->id }}')" class="mdi mdi-trash-can-outline"
                                    data-toggle="modal" data-target="#eliminarmodal"></button>
                            </td>
                        </tr>
                @endforeach
            </tbody>
        </table>
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
                                    role="form" enctype="multipart/form-data">
                                    @method('POST')
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group row">
                                                <label class="col-sm-9 col-form-label">Nombre</label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" name="nombre"
                                                        id="crearnombre" required>
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
                            <button type="submit" class="btn btn-primary">Crear</button>
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
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

                                <form method="POST" action="{{ route('insumos.updateInsumos') }}" 
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
                                                    <input type="text" class="form-control" name="nombre"
                                                        id="editarnombre" required>
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
                            <button type="submit" class="btn btn-primary">Actualizar</button>
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
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
                    <h5 class="modal-title" id="exampleModalLongTitleeliminar"></h5>
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
                        <button type="submit" class="btn btn-primary">Si</button>
                        <button type="button" class="btn btn-primary" data-dismiss="modal">No</button>
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




    function editarInsumo(id) {
            let consulta = {!! $editarinsumo !!}
            let editardatos = consulta.find(item => item.id == id)
            $('#exampleModalLongTitleeditar').text(`Actualizar Insumo #${editardatos.id}`);
            $('#editarnombre').val(`${editardatos.nombre}`);
            $('#editarmedidas').val(`${editardatos.medidas}`);
            $('#editarestado').val(`${editardatos.estado}`);
            $('#idinsumoeditar').val(`${editardatos.id}`);
            let idinsumo = `${editardatos.id}`;

        }

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

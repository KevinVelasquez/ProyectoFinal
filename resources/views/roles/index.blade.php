@extends('layouts.app')

@section('template_title')
Rol
@endsection

@section('content')
<div class="container">
    <main role="main" class="pb-3">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-sm-6" id="tituloinicial">
                    <h3 class="mb-0 font-weight-bold">Roles y Permisos</h3>
                </div>
            </div>
        </div>
        <p> 
            <a class="mdi mdi-lock-plus-outline" id="iconoadd" href="{{ route('roles.create') }}" ></a>
        </p>
        <table id="roles" class="table table-striped dt-responsive nowrap table" style="width:100%">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($roles as $role)
                <tr>
                    <td>{{ $role->name }}</td>
                    <td><?php if ($role->estado == 1) {
                                echo 'Disponible';
                            } else {
                                echo 'No Disponible';
                            } ?></td>
                    <td>
                        <a href="{{ route('roles.edit',$role->id) }}"><button class="mdi mdi-lead-pencil"></button></a>
                        <button onclick="eliminarRol('{{ $role->id }}')" class="mdi mdi-trash-can-outline"
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

  <!-- modal eliminar rol -->
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
                    <form method="POST" action="{{ route('roles.eliminarrol') }}" class="form-sample"
                        role="form" enctype="multipart/form-data">
                        @method('DELETE')
                        @csrf
                        <div>¿Está seguro que desea eliminar el rol?</div>
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
        $('#roles').DataTable(
            { 
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
                }
            });
});

function eliminarRol(id) {
        let consulta = {!! $filtro !!}
        let datos = consulta.find(item => item.id == id)
        $('#exampleModalLongTitleeliminar').text(`Eliminar Rol`);
        $('#ideliminar').val(`${datos.id}`);
    }

</script>

@endsection

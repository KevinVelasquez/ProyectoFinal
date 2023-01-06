@extends('layouts.app')

@section('template_title')
Usuario
@endsection

@section('content')
<div class="container">
    <main role="main" class="pb-3">
        <p>
            <a class="mdi mdi-account-plus" id="iconoadd" href="{{ route('usuario.create') }}"></a>
        </p>
        <div class="dataTables_length" id="insumos_length"><label>Mostrar <select name="insumos_length" aria-controls="insumos" class="">
                    <option value="10">10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select> registros</label>
        </div>
        <div id="insumos_filter" class="dataTables_filter">
            <label>Buscar:<input type="search" class="" placeholder="" aria-controls="usuarios"></label>
        </div>
        <table id="insumos" class="table table-striped dt-responsive nowrap table" style="width:100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Cédula</th>
                    <th>Nombre</th>
                    <th>Correo Electrónico</th>
                    <th>Rol</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>{{ ++$i }}</td>

                    <td>{{ $user->cedula }}</td>
                    <td>{{ $user->nombre }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->rol }}</td>
                    <td>{{ $user->estado }}</td>

                    <td>
                        <form action="{{ route('usuario.destroy',$user->id) }}" method="POST">
                            <a class="btn btn-sm btn-success" href="{{ route('usuario.edit',$user->id) }}"><i class="fa fa-fw fa-edit"></i>Editar</a>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </main>
</div>
<script>
    $(document).ready(function() {
        $('#user').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
            }
        });
    });
</script>
@endsection
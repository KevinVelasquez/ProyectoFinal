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
                    <td>{{ $user->id }}</td>

                    <td>{{ $user->cedula }}</td>
                    <td>{{ $user->nombre }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->rol }}</td>
                    <td id="resp{{ $user->id }}">

                        <input data-id="{{$user->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Activo" data-off="Inactivo" {{$user->estado ? 'checked' : ''}}>

                    </td>
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
        $(function() {
            $('.toggle-class').change(function() {
                var estado = $(this).prop('checked') == true ? 1 : 0;
                var id = $(this).data('id');
                $ajax({
                    type: "GET",
                    dataType: "json",
                    url: '/CambioEstado',
                    data: {
                        'estado': estado,
                        'id': id
                    },
                    success: function(data) {
                        console.log(data.success)
                    }
                });
            });
        });
    });
</script>
@endsection

<!-- @section("script")

<script type="text/javascript">
    $(document).ready(function() {
        $(window).load(function() {
            $(".cargando").fadeOut(1000);
        });
        $('.cambio_estado').change(function() {
    //Verifico el estado del checkbox, si esta seleccionado sera igual a 1 de lo contrario sera igual a 0
    var estado = $(this).prop('checked') == true ? 1 : 0; 
    var id = $(this).data('id'); 
        console.log(estado);
     $.ajax({
        type: "GET",
        dataType: "json",
        //url: '/StatusNoticia',
        url: '{{route('CambioEstado')}}',
        data: {'estado': estado, 'id': id},
        success: function(data){
            $('#resp' + id).html(data.var); 
            console.log(data.var)
         
        }
    });
})
      
});
</script>
@endsection -->
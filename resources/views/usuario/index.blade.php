@extends('layouts.app')

@section('template_title')
Usuarios
@endsection

@section('content')
<div class="container">
    <main role="main" class="pb-3">
        <p>
            <a class="mdi mdi-account-plus" id="iconoadd" href="{{ route('usuario.create') }}"></a>
        </p>
        <table id="usuarios" class="table table-striped dt-responsive nowrap table" style="width:100%">
            <thead>
                <tr>
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

                    <td>{{ $user->cedula }}</td>
                    <td>{{ $user->nombre }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @if(!empty($user->getRoleNames()))
                        @foreach($user->getRoleNames() as $rolName)
                        <h5><span class="role-label">{{$rolName}}</span></h5>
                        @endforeach
                        @endif
                    </td>
                    <td>
                        @if($user->estado == 1)
                        <button type="button" class="btn btn-sm btn-success">Activo</button>
                        @else
                        <button type="button" class="btn btn-sm btn-danger">Inactivo</button>
                        @endif
                    </td>
                    <td>
                        <form action="{{ route('usuario.destroy',$user->id) }}" method="POST">
                            <a class="btn btn-primary btn-lg active" href="{{ route('usuario.edit',$user->id) }}"><i class="fa fa-fw fa-edit"></i>Editar</a>
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
        $('#usuarios').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
            }
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
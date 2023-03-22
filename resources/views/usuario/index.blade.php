@extends('layouts.app')

@section('template_title')
Usuarios
@endsection

@section('content')
<div class="container">
    <main role="main" class="pb-3">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-sm-6" id="tituloinicial">
                    <h3 class="mb-0 font-weight-bold">Usuarios</h3>
                </div>
            </div>
        </div>
        <p>
            <a class="mdi mdi-account-multiple-plus-outline" id="iconoadd" href="{{ route('usuario.create') }}"></a>
        </p>
        @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

        @if (session('error'))
        <div class="alert alert-danger" role="alert">
            {{ session('error') }}
        </div>
        @endif
        <table id="usuarios" class="table table-striped dt-responsive nowrap table" style="width:100%">
            <thead>
                <tr>
                    <th>Cédula</th>
                    <th>Nombre</th>
                    <th>Correo Electrónico</th>
                    <th>Rol</th>
                    <th>Estado</th>
                    <th>Acciones</th>
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
                        {{$rolName}}
                        @endforeach
                        @endif
                    </td>
                    <td>
                        <!-- 1->Activo-0->Inactivo -->
                        @if($user->estado == 1)
                        Activo
                        @else
                        Inactivo
                        @endif
                    </td>
                    <td>

                        <a href="{{ route('usuario.edit',$user->id) }}"><button class="mdi mdi-lead-pencil"></button></a>


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
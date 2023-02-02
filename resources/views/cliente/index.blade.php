@extends('layouts.app')

@section('template_title')
Cliente
@endsection

@section('content')
<div class="container">
    <main role="main" class="pb-3">
        <p>
            <a class="mdi mdi-cart-outline" id="iconoadd" href="{{ route('cliente.create') }}"></a>
        </p>

        <table id="clientes" class="table table-striped dt-responsive nowrap table" style="width:100%">
            <thead>
                <tr>


                    <th>Cedula</th>
                    <th>Nombre</th>
                    <th>Telefono</th>
                    <th>Direccion</th>
                    <th>Email</th>
                    <th>Tipo Persona</th>
                    <th>SaldoPendiente</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>


                @foreach ($clientes as $cliente)
                <tr>

                    <td>{{ $cliente->cedula }}</td>
                    <td>{{ $cliente->nombre }}</td>
                    <td>{{ $cliente->telefono }}</td>
                    <td>{{ $cliente->direccion }}</td>
                    <td>{{ $cliente->email }}</td>
                    @if ($cliente->tipo_persona==1)
                    <td>Juridico</td>
                    @else
                    <td>Natural</td>
                    @endif
                    
                    <td>150000</td>
                    @if ($cliente->estado==1)
                    <td>
                        <a class="btn btn-sm btn-success" type="button" href="{{route('updateStatusCliente', $cliente)}}">Activo <i class="mdi mdi-check" ></i></a>
                    </td>
                    @else
                    <td>
                        <a class="btn btn-sm btn-danger" type="button" href="{{route('updateStatusCliente', $cliente)}}">Inactivo <i class="mdi mdi-window-close" ></i></a>
                    </td>
                    @endif





                    <!-- <input value="{{ $cliente->estado }}" data-id="{{ $cliente->id }}" class="mi_checkbox" type="checkbox" id="switch" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" {{ $cliente->estado ? 'checked' : '' }}>
                    <label for="switch" class="lbl">
                    
                    </label> -->




                    <td>

                        <a href="{{ url('/cliente/'.$cliente->id.'/edit') }}"><button class="mdi mdi-lead-pencil"></button></a>
                        <a href=""><button class="mdi mdi-checkbox-multiple-blank"></button></a>

                        <form action="{{ url('/cliente/'.$cliente->id) }}" method="POST">


                            @csrf
                            {{ method_field('DELETE') }}
                            <a data-toggle="modal" data-target="#eliminar"><button class="mdi mdi-trash-can-outline"></button></a>

                            <div class="modal fade" id="eliminar" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Eliminar Cliente</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            ¿Está seguro que desea eliminar el Cliente?
                                        </div>
                                        <div class="modal-footer">
                                            <input type="submit" value="Sí" class="btn btn-primary btn-lg active" role="button" aria-hidden="true">

                                            <a href="{{ route('cliente.index') }}" class="btn btn-primary btn-lg active" role="button" data-dismiss="modal">No</a>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>


</div>


{!! $clientes->links() !!}


<!-- scripts -->

<script>
    $(document).ready(function() {
        $('#clientes').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
            }
        });
    });
</script>



@endsection
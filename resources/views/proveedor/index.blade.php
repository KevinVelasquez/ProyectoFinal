@extends('layouts.app')

@section('template_title')
Proveedor
@endsection

@section('content')
<div class="container">
    <main role="main" class="pb-3">
        <p>
            <a class="mdi mdi-cart-outline" id="iconoadd" href="{{ route('proveedor.create') }}"></a>
        </p>

        <table id="proveedores" class="table table-striped dt-responsive nowrap table" style="width:100%">
            <thead>
                <tr>


                    <th>Cedula</th>
                    <th>Nombre</th>
                    <th>Telefono</th>
                    <th>Direccion</th>
                    <th>Email</th>
                    <th>Estado</th>
                    <th>Tipo Persona</th>
                    <th>SaldoPendiente</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>


                @foreach ($proveedores as $proveedor)
                <tr>

                    <td>{{ $proveedor->cedula }}</td>
                    <td>{{ $proveedor->nombre }}</td>
                    <td>{{ $proveedor->telefono }}</td>
                    <td>{{ $proveedor->direccion }}</td>
                    <td>{{ $proveedor->email }}</td>
                    <td>{{ $proveedor->estado }}</td>
                    <td>{{ $proveedor->tipo_persona }}</td>
                    <td></td>
                    <td></td>

                    <td>

                        <a href="{{ url('/proveedor/'.$proveedor->id.'/edit') }}"><button class="mdi mdi-lead-pencil"></button></a>
                        <a href=""><button class="mdi mdi-checkbox-multiple-blank"></button></a>

                        <form action="{{ url('/proveedor/'.$proveedor->id) }}" method="POST">


                            @csrf
                            {{ method_field('DELETE') }}
                            <a data-toggle="modal" data-target="#eliminar"><button class="mdi mdi-trash-can-outline"></button></a>

                            <div class="modal fade" id="eliminar" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Eliminar Proveedor</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            ¿Está seguro que desea eliminar el proveedor?
                                        </div>
                                        <div class="modal-footer">
                                            <input type="submit" value="Sí" class="btn btn-primary btn-lg active" role="button" aria-hidden="true">

                                            <a href="{{ route('proveedor.index') }}" class="btn btn-primary btn-lg active" role="button" data-dismiss="modal">No</a>
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


{!! $proveedores->links() !!}


<!-- scripts -->

<script>
    $(document).ready(function() {
        $('#proveedores').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
            }
        });
    });
</script>

@endsection
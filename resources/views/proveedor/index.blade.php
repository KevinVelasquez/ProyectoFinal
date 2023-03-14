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


                    <th>Cédula/Nit</th>
                    <th>Nombre</th>
                    <th>Teléfono</th>
                    <th>Dirección</th>
                    <th>Email</th>
                    <th>Tipo Persona</th>
                    <th>Saldo Pendiente</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($proveedor as $proveedores)
                <tr>

                    <td>{{ $proveedores->cedula }}</td>
                    <td>{{ $proveedores->nombre }}</td>
                    <td>{{ $proveedores->telefono }}</td>
                    <td>{{ $proveedores->direccion }}</td>
                    <td>{{ $proveedores->email }}</td>
                    @if ($proveedores->tipo_persona==1)
                    <td>Juridico</td>
                    @else
                    <td>Natural</td>
                    @endif

                    <td>{{ $proveedores->total_compra-$proveedores->total_abonos }}</td>
                   

                    <td>
                        <?php if ($proveedores->estado == 1) {
                            echo 'Activo';
                        } else {
                            echo 'Inactivo';
                        }  ?></td>
                    
                    <td>

                        <a href="{{ url('/proveedor/'.$proveedores->id.'/edit') }}"><button class="mdi mdi-lead-pencil"></button></a>

                        <!-- Button trigger modalvisualizar facturas -->
                        <a href="{{ route('proveedor.mostrar', $proveedores->id) }}"><button class="mdi mdi-format-align-left"></button></a>

                    
                        <button onclick="eliminarCliente('{{ $proveedores->id }}')" class="mdi mdi-trash-can-outline"
                                    data-toggle="modal" data-target="#eliminar"></button>
                        
                        
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

        <!-- modal eliminar -->
     <div class="modal fade" id="eliminar" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitleeliminar">Eliminar Proveedor</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="text-align: center;">
                    <form method="POST" action="{{ route('proveedor.eliminarProveedor') }}" class="form-sample"
                        role="form" enctype="multipart/form-data">
                        @method('DELETE')
                        @csrf
                        <div>¿Está seguro que desea eliminar el proveedor?</div>
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

</div>





<!-- scripts -->

<script>
    $(document).ready(function() {
        $('#proveedores').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
            }
        });
    });

    function eliminarCliente(id) {
            let consulta = {!! $proveedor !!}
            let datos = consulta.find(item => item.id == id)
            $('#exampleModalLongTitleanular').text(`Eliminar Proveedor #${datos.id}`);
            $('#ideliminar').val(`${datos.id}`);
            
        }

</script>




@endsection
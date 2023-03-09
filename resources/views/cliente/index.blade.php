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


                    <th>Cédula</th>
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

                    <td>{{ $cliente->total_pedido-$cliente->total_abonos }}</td>

                    <td>
                        <?php if ($cliente->estado == 1) {
                            echo 'Activo';
                        } else {
                            echo 'Inactivo';
                        }  ?></td>


                    <td>

                        <a href="{{ url('/cliente/'.$cliente->id.'/edit') }}"><button class="mdi mdi-lead-pencil"></button></a>


                        <button id="figura" type="button" class="mdi mdi-checkbox-multiple-blank" data-toggle="modal" data-target="#verdiseños" onclick="verdiseños('{{$cliente->id}}')"></button>

                       
                        
                        <button onclick="eliminarCliente('{{ $cliente->id }}')" class="mdi mdi-trash-can-outline"
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

        <!-- modal ver diseño -->

        <div class="modal fade" id="verdiseños" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">

            <div class="modal-dialog modal-dialog-centered" role="document" id="modalactualizar" style="max-width: 63%;">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitlediseños">Diseños Cliente</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="contenidomarcas">
                        <div class="page-content container">
                            <div class="container px-0">

                                <div class="row mt-4" id="listadoimg">

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- modal eliminar -->
     <div class="modal fade" id="eliminar" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitleeliminar">Eliminar Cliente</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="text-align: center;">
                    <form method="POST" action="{{ route('cliente.eliminarCliente') }}" class="form-sample"
                        role="form" enctype="multipart/form-data">
                        @method('DELETE')
                        @csrf
                        <div>¿Está seguro que desea eliminar el cliente?</div>
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
        $('#clientes').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
            }
        });
    });



    function verdiseños(id) {
        let listafiguras = [];
        let figura = <?php echo $figuras; ?>;
        $("#listadoimg").children().remove();
        figura.forEach(function(value, index) {
            listafiguras[index] = value;
            if (listafiguras[index].id_cliente == id) {
                let figuri = listafiguras[index].imagen;
                let idimagen = listafiguras[index].id;
                let etiqueta = listafiguras[index].etiqueta;
                const imagen = `
                <div class="col-md-2 p-1" style="width:14%">
                    <div class="card">
                        <div class="row">
                            <div class='col text-center'>
                                <label for="${idimagen}">
                                <img src="http://127.0.0.1:8000/storage/images/figuras/${figuri}" id="${idimagen}" style="margin-top: 24%"/>
                                <p class="card-text">${etiqueta}</p> 
                                </label>
                            </div>
                            
                        </div>
                    </div>
                </div>
                                `
                $("#listadoimg").append(imagen)
            }
        });

    }


    function eliminarCliente(id) {
            let consulta = {!! $clientes !!}
            let datos = consulta.find(item => item.id == id)
            $('#exampleModalLongTitleanular').text(`Eliminar Insumo #${datos.id}`);
            $('#ideliminar').val(`${datos.id}`);
            
        }



</script>



@endsection
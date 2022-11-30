@extends('layouts.app')

@section('template_title')
Cliente
@endsection

@section('content')
<div class="container">
    <main role="main" class="pb-3">
        <p>
            <a class="mdi mdi-cart-outline" id="iconoadd" href="{{ route('clientes.create') }}"></a>
        </p>

        <table id="clientes" class="table table-striped dt-responsive nowrap table" style="width:100%">
            <thead>
                <tr>


                    <th>Cedula</th>
                    <th>Nombre</th>
                    <th>Telefono</th>
                    <th>Pais</th>
                    <th>Departamento</th>
                    <th>Municipio</th>
                    <th>Direccion</th>
                    <th>Email</th>
                    <th>Estado</th>
                    <th>Tipo Persona</th>
                    <th>Regimen</th>
                    <th>Tipo Comercio</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>


                @foreach ($clientes as $cliente)
                <tr>
                    <td>{{ ++$i }}</td>

                    <td>{{ $cliente->cedula }}</td>
                    <td>{{ $cliente->nombre }}</td>
                    <td>{{ $cliente->telefono }}</td>
                    <td>{{ $cliente->pais }}</td>
                    <td>{{ $cliente->departamento }}</td>
                    <td>{{ $cliente->municipio }}</td>
                    <td>{{ $cliente->direccion }}</td>
                    <td>{{ $cliente->email }}</td>
                    <td>{{ $cliente->estado }}</td>
                    <td>{{ $cliente->tipo_persona }}</td>
                    <td>{{ $cliente->regimen }}</td>
                    <td>{{ $cliente->tipo_comercio }}</td>

                    <td>
                        <form action="{{ route('clientes.destroy',$cliente->id) }}" method="POST">
                            <a class="btn btn-sm btn-primary " href="{{ route('clientes.show',$cliente->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                            <a class="btn btn-sm btn-success" href="{{ route('clientes.edit',$cliente->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
</div>
</div>
</div>
{!! $clientes->links() !!}
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
</script>

@endsection
@extends('layouts.app')

@section('template_title')
    Pedido
@endsection

@section('content')


<div class="container">
    <main role="main" class="pb-3">
        <p>
            <a class="mdi mdi-cart-outline" id="iconoadd" href="{{ route('pedidos.create') }}"></a>
        </p>

        <table id="pedidos" class="table table-striped dt-responsive nowrap table" style="width:100%">
            <thead>
                <tr>
                    <th>Número Pedido</th>
                    <th>Cédula</th>
                    <th>Nombre</th>
                    <th>Fecha Registro</th>
                    <th>Fecha Entrega</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pedidos as $pedido)
                <tr>
                    <td>{{ ++$i }}</td>
                    
                    <td>{{ $pedido->id_cliente }}</td>
                    <td>{{ $pedido->id_municipio }}</td>
                    <td>{{ $pedido->id_metodo_entrega }}</td>
                    <td>{{ $pedido->id_medio_pago }}</td>
                    <td>{{ $pedido->id_metodo_pago }}</td>
                    <td>{{ $pedido->direccion }}</td>
                    <td>{{ $pedido->fecha_registro }}</td>
                    <td>{{ $pedido->fecha_entrega }}</td>
                    <td>{{ $pedido->estado }}</td>
                    <td>{{ $pedido->proceso }}</td>
                    <td>{{ $pedido->abono }}</td>
                    <td>{{ $pedido->totalpedido }}</td>

                    <td>
                        <form action="{{ route('pedidos.destroy',$pedido->id) }}" method="POST">
                            <a class="btn btn-sm btn-primary " href="{{ route('pedidos.show',$pedido->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                            <a class="btn btn-sm btn-success" href="{{ route('pedidos.edit',$pedido->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {!! $pedidos->links() !!}
    </main>
</div>

<!-- scripts -->

<script>

    $(document).ready(function () {
        $('#pedidos').DataTable(
            {
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
                }
            });
    });

</script>
@endsection

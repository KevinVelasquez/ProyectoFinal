@extends('layouts.app')

@section('template_title')
Compra
@endsection

@section('content')
<div class="container">
    <main role="main" class="pb-3">
        <p>
            <a class="mdi mdi-cart-outline" id="iconoadd" href="{{ route('compra.create') }}"></a>
        </p>
        <table id="compra" class="table table-striped dt-responsive nowrap table" style="width:100%">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>No Orden</th>
                    <th>Fecha Compra</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($compras as $compra)
                <tr>
                    <td>{{ ++$i }}</td>

                    <td>{{ $compra->id}}</td>
                    <td>{{ $compra->n_orden}}</td>
                    <td>{{ $compra->fecha_compra}}</td>
                    <td>{{ $compra->estado}}</td>
                    <td>
                        <form action="{{ route('compra.destroy',$compra->id) }}" method="POST">
                            <a class="btn btn-sm btn-primary " href="{{ route('compra.show',$compra->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                            <a class="btn btn-sm btn-success" href="{{ route('compra.edit',$compra->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
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
<script>
    $(document).ready(function() {
        $('#compra').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
            }
        });
    });
</script>
</div>
</div>
{!! $compras->links() !!}
</div>
</div>
</div>
@endsection
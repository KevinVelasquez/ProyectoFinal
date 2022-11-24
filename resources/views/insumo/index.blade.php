@extends('layouts.app')
@section('content')
<div class="container">
    <main role="main" class="pb-3">
        <p>
            <a class="mdi mdi-cart-outline" id="iconoadd" href="{{ route('insumos.create') }}"></a>
        </p>

        <table id="insumos" class="table table-striped dt-responsive nowrap table" style="width:100%">
            <thead>
                <tr>

                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Medidas</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($insumos as $insumo)
                <tr>
                    <td>{{ ++$i }}</td>

                    <td>{{ $insumo->nombre }}</td>
                    <td>{{ $insumo->medidas }}</td>
                    <td>{{ $insumo->estado }}</td>

                    <td>
                        <form action="{{ route('insumos.destroy',$insumo->id) }}" method="POST">
                            <a class="btn btn-sm btn-primary " href="{{ route('insumos.show',$insumo->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                            <a class="btn btn-sm btn-success" href="{{ route('insumos.edit',$insumo->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        {!! $insumos->links() !!}
    </main>


</div>
<script>
    $(document).ready(function() {
        $('#insumos').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
            }
        });
    });
</script>
@endsection
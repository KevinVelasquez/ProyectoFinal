@extends('layouts.app')

@section('template_title')
Compra
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title">
                            {{ __('Compra') }}
                        </span>

                        <div class="float-right">
                            <a href="{{ route('compra.create') }}" class="btn btn-primary btn-sm float-right" data-placement="left">
                                {{ __('Create New') }}
                            </a>
                        </div>
                    </div>
                </div>
                @if ($message = Session::get('success') )
                <script>
                    swal({
                        title: "{{session::get('success')}}",
                        icon: "success",
                        button: "Aceptar",
                    });
                </script>
                @endif
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="thead">
                                <tr>
                                    <th>No</th>

                                    <th>N Orden</th>
                                    <th>Fecha Compra</th>
                                    <th>Cantidad</th>
                                    <th>Precio Unitario</th>
                                    <th>Total</th>
                                    <th>Estado</th>
                                    <th>Id Proveedor</th>
                                    <th>Id Insumo</th>
                                    <th>Id Metodo Pago</th>

                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($compras as $compra)
                                <tr>
                                    <td>{{ ++$i }}</td>

                                    <td>{{ $compra->n_orden }}</td>
                                    <td>{{ $compra->fecha_compra }}</td>
                                    <td>{{ $compra->cantidad }}</td>
                                    <td>{{ $compra->precio_unitario }}</td>
                                    <td>{{ $compra->total }}</td>
                                    <td>{{ $compra->estado }}</td>
                                    <td>{{ $compra->id_proveedor }}</td>
                                    <td>{{ $compra->id_insumo }}</td>
                                    <td>{{ $compra->id_metodo_pago }}</td>

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
                </div>
            </div>
            {!! $compras->links() !!}
        </div>
    </div>
</div>
@endsection
@extends('layouts.app')

@section('template_title')
    Proveedor
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Proveedor') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('proveedor.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
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

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($proveedors as $proveedor)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $proveedor->cedula }}</td>
											<td>{{ $proveedor->nombre }}</td>
											<td>{{ $proveedor->telefono }}</td>
											<td>{{ $proveedor->pais }}</td>
											<td>{{ $proveedor->departamento }}</td>
											<td>{{ $proveedor->municipio }}</td>
											<td>{{ $proveedor->direccion }}</td>
											<td>{{ $proveedor->email }}</td>
											<td>{{ $proveedor->estado }}</td>
											<td>{{ $proveedor->tipo_persona }}</td>
											<td>{{ $proveedor->regimen }}</td>
											<td>{{ $proveedor->tipo_comercio }}</td>

                                            <td>
                                                <form action="{{ route('proveedor.destroy',$proveedor->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('proveedor.show',$proveedor->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('proveedor.edit',$proveedor->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
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
                {!! $proveedors->links() !!}
            </div>
        </div>
    </div>
@endsection

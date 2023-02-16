@extends('layouts.app')

@section('template_title')
    Pago Proveedore
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Pago Proveedore') }}
                            </span>
                            <div class="float-right">
                                <a href="{{ route('compra.index') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Volver a Ordenes') }}
                                </a>
                              </div>
                             <div class="float-right">
                                <a href="{{ route('pago-proveedore.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Realizar Abono') }}
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
										<th>Fecha</th>
										<th>Abono</th>
										<th>Estado</th>
										<th>Id Medio Pagos</th>
										<th>Id Compra</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pagoProveedores as $pagoProveedore)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $pagoProveedore->fecha }}</td>
											<td>{{ $pagoProveedore->abono }}</td>
											<td>{{ $pagoProveedore->estado }}</td>
											<td>{{ $pagoProveedore->id_medio_pagos }}</td>
											<td>{{ $pagoProveedore->id_compra }}</td>

                                            <td>
                                                <form action="{{ route('pago-proveedores.destroy',$pagoProveedore->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('pago-proveedore.show',$pagoProveedore->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('pago-proveedore.edit',$pagoProveedore->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
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
                {!! $pagoProveedores->links() !!}
            </div>
        </div>
    </div>
@endsection

@extends('layouts.app')

@section('template_title')
Cliente
@endsection

@section('content')

<div class="container">
    <main role="main" class="pb-3">
    <p>
    <div class="card-header">
        <span class="card-title">Ordenes de compra</span>

    </div>
    </p>
    

        <table id="factproveedor" class="table table-striped dt-responsive nowrap table" style="width:100%">
            <thead>
                <tr>

                    <th>N° Factura</th>
                    <th>Fecha Compra</th>
                    <th>Método Pago</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
            
            @foreach ($compra as $compras)
                <tr>

                    <td>{{ $compras->n_orden }}</td>
                    <td>{{ $compras->fecha_compra }}</td>
                    
                    @if ($compras->id_metodo_pagos==1)
                    <td>Crédito</td>
                    @else
                    <td>Contado</td>
                    @endif

                    @if ($compras->estado==1)
                    <td>Pendiente</td>
                    @else
                    <td>Finalizada</td>
                    @endif
                    <td>

                        <!-- Button detalle factura -->

                        <button type="button" class="mdi mdi-eye" data-toggle="modal" data-target="#verdetalle"></button>
                    </td>


                </tr>
                
                @endforeach
            </tbody>
        </table>
        <!-- Modal detalle facturas proveedor-->
        <div class="modal fade" id="verdetalle" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document" id="modalactualizar" style="max-width: 63%;">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Orden de Compra 0102</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="contenidoactualizar">
                        <div class="page-content container">


                            <div class="container px-0">
                                <div class="row mt-4">
                                    <div class="col-12 col-lg-12">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="text-center text-150">
                                                    <img src="/assets/img/LOGO LAS MARCAS TINTO-1.png" style="width:70px;">
                                                    <span class="text-default-d3">LAS MARCAS PARA GANADO</span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- .row -->
                                        <br>

                                        <hr class="row brc-default-l1 mx-n1 mb-4" />

                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div>
                                                    <span class="text-sm text-grey-m2 align-middle">Proveedor:</span>
                                                    <span class="text-600 text-110 text-blue align-middle">Julio
                                                        Varillas</span>
                                                </div>
                                                <div class="text-grey-m2">
                                                    <div class="my-1">
                                                        nit 99753839-1
                                                    </div>
                                                    <div class="my-1">
                                                        Calle 44 = 53 - 30, Medellín
                                                    </div>
                                                    <div class="my-1">
                                                        Antioquia, Colombia
                                                    </div>
                                                    <div class="my-1"><i class="fa fa-phone fa-flip-horizontal text-secondary"></i> <b class="text-600">3029984563</b></div>
                                                </div>
                                            </div>
                                            <!-- /.col -->

                                            <div class="text-95 col-sm-6 align-self-start d-sm-flex justify-content-end">
                                                <hr class="d-sm-none" />
                                                <div class="text-grey-m2">
                                                    <div class="mt-1 mb-2 text-secondary-m1 text-600 text-125">
                                                        Orden de Compra
                                                    </div>
                                                    <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i>
                                                        <span class="text-600 text-90">ID:</span> #010101
                                                    </div>
                                                    <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i>
                                                        <span class="text-600 text-90">Fecha Registro:</span> Nov 23,2022
                                                    </div>
                                                    <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i>
                                                        <span class="text-600 text-90">Fecha de Compra:</span> Nov 17,2022
                                                    </div>
                                                    <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i>
                                                        <span class="text-600 text-90">Estado:</span> <span>Cancelada</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.col -->
                                        </div>

                                        <div class="table-responsive pt-3" style="margin-bottom: 0%;">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>
                                                            Insumos
                                                        </th>
                                                        <th>
                                                            Cantidad
                                                        </th>
                                                        <th>
                                                            Precio Unitario
                                                        </th>
                                                        <th>
                                                            Precio Total
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            Lámina 1/2
                                                        </td>
                                                        <td>
                                                            3
                                                        </td>
                                                        <td>
                                                            200.000
                                                        </td>
                                                        <td>
                                                            600.000
                                                        </td>

                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                        <div class="mt-4">


                                            <div class="row mt-3">
                                                <div class="col-12 col-sm-7 text-grey-d2 text-95 mt-2 mt-lg-0">
                                                    <div class="my-1">
                                                        Metodo de Pago: Credito
                                                    </div>
                                                    <div class="my-1">
                                                        Abono: 300.000
                                                    </div>
                                                </div>

                                                <div class="col-12 col-sm-5 text-grey text-90 order-first order-sm-last">
                                                    <div class="row my-2">
                                                        <div class="col-7 text-right">
                                                            Total
                                                        </div>
                                                        <div class="col-5">
                                                            <span class="text-120 text-secondary-d1">600.000</span>
                                                        </div>
                                                    </div>

                                                    <div class="row my-2">
                                                        <div class="col-7 text-right">
                                                            Abono
                                                        </div>
                                                        <div class="col-5">
                                                            <span class="text-110 text-secondary-d1">300.000</span>
                                                        </div>
                                                    </div>

                                                    <div class="row my-2 align-items-center bgc-primary-l3 p-2">
                                                        <div class="col-7 text-right">
                                                            Resta
                                                        </div>
                                                        <div class="col-5">
                                                            <span class="text-150 text-success-d3 opacity-2">300.000</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr />
                                            <div>
                                                <a href="{{ route('proveedor.pdf') }}" class="btn btn-primary " target="_blank">Descargar</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

</div>



<!-- scripts -->

<script>
    $(document).ready(function() {
        $('#factproveedor').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
            }
        });
    });

    


</script>

@endsection
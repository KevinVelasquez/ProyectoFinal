@extends('layouts.app')

@section('template_title')
Mostrar Ordenes de Compra
@endsection

@section('content')

<div class="container">
    <main role="main" class="pb-3">
    <div class="content-wrapper">
          <div class="row">
            <div class="col-sm-6" id="tituloinicial">
              <h3 class="mb-0 font-weight-bold">Ordenes de compra del Proveedor</h3>
            </div>
          </div>
    </div>
    
    
   
    

        <table id="factproveedor" class="table table-striped dt-responsive nowrap table" style="width:100%">
            <thead>
                <tr>

                    <th>N° Factura</th>
                    <th>Fecha Compra</th>
                    <th>Método Pago</th>
                    <th>Cancelado</th>
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
                    <td>No</td>
                    @else
                    <td>Sí</td>
                    @endif
                    <td>

                        <!-- Button detalle factura -->

                        <button type="button" class="mdi mdi-eye" data-toggle="modal" data-target="#verdetalle" onclick="verDatos ('{{ $compras->n_orden }}')" ></button>
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
                        <h5 class="modal-title" id="titulomodal"></h5>
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
                                                    <span class="text-600 text-110 text-blue align-middle" id="nombreproveedor"></span>
                                                </div>
                                                <div class="text-grey-m2">
                                                    <div class="my-1" id="ccproveedor">
                                                    </div>
                                                    <div class="my-1" id="direccionproveedor">
                                                    
                                                    </div>
                                                    <div class="my-1" id="municipio">
                                                    </div>
                                                <div class="my-1"><i
                                                        class="fa fa-phone fa-flip-horizontal text-secondary"></i> <b
                                                        class="text-600" id="telefonoproveedor"
                                                        name="telefonoclientedetalle"></b></div>
                                            </div>
                                            </div>
                                            <!-- /.col -->

                                            <div class="text-95 col-sm-6 align-self-start d-sm-flex justify-content-end">
                                                <hr class="d-sm-none" />
                                                <div class="text-grey-m2">
                                                    <div class="mt-1 mb-2 text-secondary-m1 text-600 text-125">
                                                    Factura
                                                    </div>
                                                    <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i>
                                                        <span class="text-600 text-90" id="n_orden">ID:</span> 
                                                    </div>
                                                    <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i>
                                                        <span class="text-600 text-90" id="fechacompra"></span>
                                                    </div>
                                                    <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i>
                                                        <span class="text-600 text-90" id="estadocompra"></span> <span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.col -->
                                        </div>
                                        
                                        
                                        <div class="table-responsive pt-3" style="margin-bottom: 0%;">
                                            <table class="table table-bordered" id="tabladetallecompraseleccionada" >
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
                                                            Sub Total
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                
                                                </tbody>
                                            </table>
                                        </div>
                                        
                                        <div class="mt-4">


                                            <div class="row mt-3">
                                                <div class="col-12 col-sm-7 text-grey-d2 text-95 mt-2 mt-lg-0">
                                                    <div class="my-1" id="metodopago" >
                                                    </div>
                                                </div>

                                                <div class="col-12 col-sm-5 text-grey text-90 order-first order-sm-last">
                                                    <div class="row my-2">
                                                         </div>
                                                        <div class="col-5">
                                                            <span class="text-150 text-success-d3 opacity-2" id="preciototal"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <hr />
                                            <input type="hidden"  id="iddescarga">
                                            <div>
                                            <a type="button" id="botonDescarga"  class="btn btn-primary " target="_blank"  style="background-color:#81242E;border:#81242E"><i
                        class="mdi mdi-download"></i>Descargar</a>
                            
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

    function verdetalleorden (n_orden)
    {
        let consulta = {!! $comprasss !!}
        let filtrocompra = consulta.find(item=>item.n_orden==n_orden)
        $('#nombreproveedor').text(` ${filtrocompra.nombre}`)
        $('#ccproveedor').text(`C.C ${filtrocompra.cedula}`)
        $('#direccionproveedor').text(` ${filtrocompra.direccion}`)
        $('#municipio').text(` ${filtrocompra.nombremunicipio}`)
        $('#telefonoproveedor').text(` ${filtrocompra.telefono}`)
        $('#n_orden').text(`ID: ${filtrocompra.n_orden}`)
        $('#fechacompra').text(`Fecha Compra: ${filtrocompra.fecha_compra}`)
        $('#metodopago').text(`Método Pago: ${filtrocompra.nombremetodopago}`)
        $('#preciototal').text(`Total: ${filtrocompra.total}`)
        $('#titulomodal').text(`N° de Orden: ${filtrocompra.n_orden}`)
        $('#iddescarga').val(`${filtrocompra.n_orden}`)


        

        if (filtrocompra.estado == 1) {
                $('#estadocompra').text(`Cancelado: No`)
            } else {
                $('#estadocompra').text(`Cancelado: Sí`)
            }


    }

    

    function verDatos(n_orden){
        verdetalleorden (n_orden)

        let compradatos = {!! $detallecompra !!}
        let detallecompras = compradatos.filter(item => item.n_orden == n_orden)
        $("#tabladetallecompraseleccionada tbody").children().remove();
        detallecompras.forEach(function(value, index){
            
            if (value.n_orden == n_orden){
                let fila =` 
                <tr>
                <td>
                ${value.nombre}
                </td>
                <td>
                ${value.cantidad}
                </td>
                <td>
                ${value.valor_unitario}
                </td>
                <td>
                ${value.valor_unitario*value.cantidad}
                </td>
                </tr>
                `;
                $("#tabladetallecompraseleccionada tbody").append(fila)
            }
         
        })

        

    }

    $("#botonDescarga").on("click", (event) => {
            window.open('/pdf?'+ 'id=' + $("#iddescarga").val());
        })


</script>

@endsection
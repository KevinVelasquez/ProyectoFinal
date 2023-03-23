@extends('layouts.app')

@section('template_title')
Compra
@endsection

@section('content')
<div class="container">
    <main role="main" class="pb-3">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-sm-6" id="tituloinicial">
                <h3 class="mb-0 font-weight-bold">Ordenes de Compra</h3>
                </div>
            </div>
        </div>
        <p>
            <a class="mdi mdi-store-plus" id="iconoadd" href="{{ route('compra.create') }}"></a>
        </p>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <table id="compras" class="table table-striped dt-responsive nowrap table display mowrap" style="width:100%">
            <thead>
                <tr>
                    <th>N Orden</th>
                    <th>Fecha Compra</th>
                    <th>Total</th>
                    <th>Proveedor</th>
                    <th>Método Pago</th>
                    <th>Estado</th>
                    <th>Cancelado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($compras as $compra)
                <tr>
                    <td>{{ $compra->n_orden }}</td>
                    <td>{{ $compra->fecha_compra }}</td>
                    <td>{{ $compra->total }}</td>

                    <td>
                        {{ $compra->proveedor->nombre }}
                    </td>

                    <td>{{ $compra->metodo__pagos->nombre }}</td>

                    <td>
                        @if($compra->anulado == 0)
                            Activo
                        @else
                            Anulado
                        @endif
                    </td>
                    <td>
                        @if($compra->estado == 1)
                            No
                        @else
                            Si
                        @endif
                    </td>
                    <td>
                            <!-- <a class="btn btn-primary btn-lg active" href="{{ route('compra.show',$compra->id) }}"><i class="fa fa-fw fa-eye"></i>Detalle</a> -->
                            <button onclick="verDatos('{{ $compra->id }}')" class="mdi mdi-format-align-justify "
                                    data-toggle="modal" data-target="#verdetalle"></button>

                           
                            <!-- <a class="btn btn-primary btn-lg active" type="button" onclick="verDatosAbono('{{ $compra->id }}')" data-toggle="modal" data-target="#abonos">Abonos</a> -->
                            <button onclick="verDatosAbono('{{ $compra->id }}')" class="mdi mdi-cash-multiple"
                                    data-toggle="modal" data-target="#abonos" @if ($compra->anulado !== 0)disabled @endif></button>
                            

                            @csrf
                    
                        <button onclick="anularCompra('{{ $compra->id }}')" class="mdi mdi-block-helper"
                                    data-toggle="modal" data-target="#anularmodal"></button>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </main>
</div>

<!-- modal detalle -->

<div class="modal fade" id="verdetalle" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered" role="document" id="modalactualizar" style="max-width: 63%;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitledetalle"></h5>
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
                                                <span class="text-default-d3"> <b>LAS MARCAS PARA GANADO </b></span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- .row -->

                                    <hr class="row brc-default-l1 mx-n1 mb-4" />

                                    <div class="row">
                                        <div class="col-sm-6">Información Proveedor:
                                            <div>
                                                <span class="text-sm text-grey-m2 align-middle">Para:</span>
                                                <span class="text-600 text-110 text-blue align-middle"
                                                    id="nombreproveedordetalle" name="nombreproveedordetalle"></span>
                                            </div>
                                            <div class="text-grey-m2">
                                                <div class="my-1" id="cedulaproveedordetalle"
                                                    name="cedulaproveedordetalle">
                                                </div>
                                                <div class="my-1" id="direccionproveedordetalle"
                                                    name="direccionproveedordetalle">
                                                </div>
                                                <div class="my-1">

                                                </div>
                                                <div class="my-1"><i
                                                        class="fa fa-phone fa-flip-horizontal text-secondary"></i> <b
                                                        class="text-600" id="telefonoproveedordetalle"
                                                        name="telefonoproveedordetalle"></b></div>
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
                                                    <span class="text-600 text-90" id="idcompradetalle"></span>
                                                </div>

                                                <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i>
                                                    <span class="text-600 text-90" id="fechacompradetalle"></span>
                                                </div>
                                                <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i>
                                                    <span class="text-600 text-90" id="estadocompradetalle"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.col -->
                                    </div>

                                    <div class="table-responsive pt-3" style="margin-bottom: 0%;">
                                        <table id="tablaDetalleCompraSeleccionado" class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        Insumo
                                                    </th>
                                                    <th>
                                                        Cantidad
                                                    </th>
                                                    <th>
                                                        Precio Unitario
                                                    </th>
                                                    <th>
                                                        Subtotal
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
                                                <div class="my-1" id="metodopagocompradetalle">
                                                </div>
                                            </div>

                                            <div class="col-12 col-sm-5 text-grey text-90 order-first order-sm-last">
                                                <h5>
                                                    <div class="row my-2">
                                                        <div class="col-7 text-right">
                                                            Total:
                                                        </div>
                                                        <div class="col-5">
                                                            <span class="text-120 text-secondary-d1"
                                                                id="totalcompradetalle"></span>
                                                        </div>
                                                    </div>
                                                </h5>
                                            </div>
                                        </div>

                                        <hr />
                                        <input type="hidden" id="iddescarga">
                                        <div>
                                            <a type="button" id="botonDescarga" class="btn btn-primary  btn-lg active" target="_blank"><i class="mdi mdi-download"></i> Descargar</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>

<!-- modal anular -->
<div class="modal fade" id="anularmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Anular Orden de Compra</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="text-align: center;">
                <input type="hidden" name="estadoanular" id="estadoanular" />
                <form method="POST" action="{{ route('compras.anularCompra') }}" class="form-sample" role="form" enctype="multipart/form-data">
                    @method('PATCH')
                    @csrf
                    <div>¿Está seguro que desea anular la órden de compra?</div>
                    <input type="hidden" name="idanular" id="idanular" />
                    <input type="hidden" name="anulardato" value="2" />
                    <button type="submit" class="btn btn-primary btn-lg active">Sí</button>
                    <button type="button" id="boton-regresar" class="btn btn-primary btn-lg active" data-dismiss="modal">No</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- modal abono -->
<div class="modal fade" id="abonos" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:42%;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitleAbono">Orden de Compra</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="totalcompraresta">
                <form role="form" method="POST" action="{{ route('agregarAbonoCompra') }}" enctype="multipart/form-data" class="form-sample needs-validation" onsubmit="return validarMonto()" novalidate>
                    @csrf
                    <input type="hidden" name="id" id="idcomprabonar" />
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Fecha</label>
                                <div class="col-sm-9">
                                <?php
                                $fechamax = date('Y-m-d');
                                ?>
                                    <input type="date" name="fechaabono" max="<?=$fechamax;?>" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                @error('fechaabono')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Abono</label>
                                <div class="col-sm-9">
                                    <input type="number" id="cantidadabono" name="cantidadabono" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                @error('cantidadabono')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
            </div>
            <div class="botonestabla" style="text-align: center;">
                <button type="submit" id="agregarAbono" class="btn btn-primary btn-lg active">Agregar</button>
                <button type="button" id="boton-regresar" class="btn btn-primary btn-lg active" data-dismiss="modal" aria-label="Close">Cancelar</button>
            </div>
            </form>
            <br>
            <br>
            <input placeholder="Buscar" style="width: 20%;margin-left: 63%;" id="buscarAbono">
            <div class="table-responsive pt-3" style="padding:3%">
                <table class="table table-bordered" id="tablaabonos" style="width:70%" align="center">
                    <thead>
                        <tr>
                            <th>
                                Fecha
                            </th>
                            <th>
                                Abono
                            </th>
                            <th>
                                Acciones
                            </th>
                            <th id="ocultar" style="display: none">
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
                <h5><span id="resta">Resta </span></h5>
                <br>
                <h5><span id="total">Total</span></h5>
            </div>
        </div>
    </div>
</div>
<!-- modal anular abono -->
<div class="modal fade" id="anularabono" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitleanularabono"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="text-align: center;">
                <input type="hidden" name="estadoanularabono" id="estadoanularabono" />
                <form method="POST" action="{{ route('anularAbonoCompra') }}" class="form-sample" role="form" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div>¿Está seguro que desea anular el abono?</div>
                    <input type="hidden" name="idanularabono" id="idanularabono" />
                    <input type="hidden" name="idcomprabono" id="idcomprabono" />
                    <input type="hidden" name="anulardato" value="2" />
                    <button type="submit" class="btn btn-primary btn-lg active">Si</button>
                    <button type="button" id="boton-regresar" class="btn btn-primary btn-lg active" data-dismiss="modal">No</button>
                </form>
            </div>
        </div>
    </div>
</div>


<script>
    
    $(document).ready(function() {
        $('#compras').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
            }
        });
    });

    $(document).ready(function() {
        let pathname = window.location.pathname;
        if (pathname == "/compras") {
            window.location.href = "/compra"
        };

        $('#compra').DataTable({
            "columns": [
            { "mData": "nombre" },
            { "mData": "apellidos" },
            { "mData": "edad" }
         ]} );
    });

    function datosDetalle(id) {

        let datos = {!! $pedidoproveedor !!}
        let detalledatos = datos.find(item => item.id == id)
        $('#exampleModalLongTitledetalle').text(`Orden #${detalledatos.id}`)
        $('#nombreproveedordetalle').text(`${detalledatos.nombreproveedor}`)
        $('#cedulaproveedordetalle').text(`C.C ${detalledatos.cedula}`)
        $('#direccionproveedordetalle').text(`${detalledatos.direccion}`)
        $('#telefonoproveedordetalle').text(`${detalledatos.telefono}`)
        $('#idcompradetalle').text(`ID: ${detalledatos.id}`)
        $('#fechacompradetalle').text(`Fecha Registro: ${detalledatos.fecha_compra}`)
        if (detalledatos.estado == 1) {
            $('#estadocompradetalle').text(`Estado: Pendiente`)
        } else if (detalledatos.estado == 0) {
            $('#estadocompradetalle').text(`Estado: Finalizada`)
        } 
        $('#metodopagocompradetalle').text(`Metodo Pago:  ${detalledatos.nombremetodopago}`)
        $('#totalcompradetalle').text(`${detalledatos.total}`)
        console.log(detalledatos);

        $('#iddescarga').val(`${detalledatos.id}`)

        }

    function verDatos(id) {
            datosDetalle(id)
            let compras = {!! $detallecompra !!}
            let detalleCompras = compras.filter(item => item.id == id)
            $("#tablaDetalleCompraSeleccionado tbody").children().remove();
            detalleCompras.forEach(function(value, index) {

                if (value.id == id) {
                    let fila = `
              <tr>
                  <td>
                    ${value.nombreinsumo}
                  </td>
                  <td>
                    ${value.cantidadinsumos}
                  </td>
                  <td>
                    ${value.precioUnitario}
                  </td>
                  <td>
                   ${value.cantidadinsumos * value.precioUnitario}
                  </td>
                </tr>
              `;
                    $("#tablaDetalleCompraSeleccionado tbody").append(fila)
                }
            })
        }

    function verDatosAbono(id) {
        $('#idcomprabonar').val(`${id}`)
        let abonos = {!!$detalleabono!!}
        let detalleabonos = abonos.filter(item => item.idcomprabono == id)
        let resta = 0
        $("#tablaabonos tbody").children().remove();
        detalleabonos.forEach(function(value, index) {
            console.log(detalleabonos)
            resta = value.abono + resta
            if (value.idcomprabono == id) {
                let fila = `
                   
              <tr>
                  <td>
                    ${value.fechapago}
                  </td>
                  <td>
                    ${value.abono}
                  </td>
                  <td>
                    <button onclick="anularAbonoCompra(' ${value.idabono} ') " class="mdi mdi-block-helper" data-toggle="modal"
                    data-target="#anularabono"></button>
                    </td>
                <td type="hidden" id="idcomprabonotabla" style="display: none">
                    ${value.idcomprabono}
                </td>
                </tr>
                
              `
                $('#exampleModalLongTitleAbono').text(`Compra #${value.idcomprabono}`)
                $('#total').text(`TOTAL ${value.total}`)
                $('#totalcompraresta').val(`${value.total}`)
                let preciototal = `${value.total}`
                let restatotal = preciototal - resta
                $('#resta').text(`RESTA ${restatotal}`)
                $('#agregarAbono').attr(`disabled`, !restatotal)
                $('#resta').val(`${restatotal}`)
                $("#tablaabonos tbody").append(fila)
            }
        })
        var fila = document.getElementById("tablaabonos").rows[1];
        var valor = fila.cells[4].innerHTML;
        document.getElementById("idcomprabonar").value = valor;
    }

    $("#botonDescarga").on("click", (event) => {
            window.open('generarPDF?' + 'id=' + $("#iddescarga").val());
        })

    function validarMonto() {
        var input = parseInt(document.getElementById("cantidadabono").value);
        var resta = parseInt(document.getElementById("resta").value);
        if (input > resta) {
            alert("El abono no puede superar la cantidad de " + resta);
            return false;
        }
        return true;
    }
    function anularAbonoCompra(id) {
        let consulta = {!!$detalleabono!!}
        let datos = consulta.find(item => item.idabono == id)
        $('#exampleModalLongTitleanularabono').text(`Anular Abono `);
        $('#idanularabono').val(`${datos.idabono}`);
        $('#idcomprabono').val(`${datos.idcomprabono}`);
        $('#estadoanularabaono').val(`${datos.estado}`);
    }
    document.getElementById("buscarAbono").addEventListener("keyup", function(event) {
        if (event.key === "Enter") {
            buscarTabla();
        }
    });
    function anularCompra(id) {
        let consulta = {!!$editarCompra!!}
        let values = consulta.find(item => item.id == id)
        $('#exampleModalLongTitleanular').text(`Anular Pedido #${values.id}`);
        $('#idanular').val(`${values.id}`);
        $('#estadoanular').val(`${values.estado}`);
    }
    function buscarTabla() {
        var busqueda = document.getElementById("buscarAbono").value;
        var filas = document.getElementById("tablaabonos").getElementsByTagName("tr");
        for (var i = 0; i < filas.length; i++) {
            var celdas = filas[i].getElementsByTagName("td");
            var coincide = false;
            for (var j = 0; j < celdas.length; j++) {
                if (celdas[j].innerHTML.toUpperCase().indexOf(busqueda.toUpperCase()) > -1) {
                    coincide = true;
                    break;
                }
            }
            if (coincide) {
                filas[i].style.display = "";
            } else {
                filas[i].style.display = "none";
            }
        }
    }

    function buscarTabla() {
            var busqueda = document.getElementById("buscarAbono").value;
            var filas = document.getElementById("tablaabonos").getElementsByTagName("tr");
            for (var i = 0; i < filas.length; i++) {
                var celdas = filas[i].getElementsByTagName("td");
                var coincide = false;
                for (var j = 0; j < celdas.length; j++) {
                    if (celdas[j].innerHTML.toUpperCase().indexOf(busqueda.toUpperCase()) > -1) {
                        coincide = true;
                        break;
                    }
                }
                if (coincide) {
                    filas[i].style.display = "";
                } else {
                    filas[i].style.display = "none";
                }
            }
        }

    (function() {
            'use strict'

            var forms = document.querySelectorAll('.needs-validation')

            Array.prototype.slice.call(forms)
                .forEach(function(form) {
                    form.addEventListener('submit', function(event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }

                        form.classList.add('was-validated')
                    }, false)
                })
        })();

</script>
@endsection

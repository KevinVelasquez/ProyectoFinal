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
                        <th>Cancelado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pedido as $pedidos)
                        <tr>
                            <td>{{ $pedidos->id }}</td>
                            <td>{{ $pedidos->cedula }}</td>
                            <td>{{ $pedidos->nombre }}</td>

                            <td>{{ ucwords(\Carbon\Carbon::parse($pedidos->fecha_registro)->locale('es_MX', 'es_MX.utf8')->isoFormat('dddd[,] D [de] MMMM [del] Y')) }}
                            </td>
                            <td>{{ ucwords(\Carbon\Carbon::parse($pedidos->fecha_entrega)->locale('es_MX', 'es_MX.utf8')->isoFormat('dddd[,] D [de] MMMM [del] Y')) }}
                            </td>
                            <td><?php if ($pedidos->proceso == 0) {
                                echo 'Pendiente';
                            } elseif ($pedidos->proceso == 1) {
                                echo 'Despachado';
                            } else {
                                echo 'Entregado';
                            } ?></td>
                            <td><?php if ($pedidos->cancelado == 0) {
                                echo 'No';
                            } else {
                                echo 'Si';
                            } ?></td>
                            <td>
                                <button onclick="verDatos('{{ $pedidos->id }}')" class="mdi mdi-format-align-justify"+
                                    data-toggle="modal" data-target="#verdetalle"></button>
                                <button onclick="verDatosAbono('{{ $pedidos->id }}')" class="mdi mdi-cash-usd"
                                    data-toggle="modal" data-target="#abonos"></button>
                                <button onclick="editarPedido('{{ $pedidos->id }}')" class="mdi mdi-lead-pencil"
                                    data-toggle="modal" data-target="#editarmodal"></button>
                                <button onclick="anularPedido('{{ $pedidos->id }}')" class="mdi mdi-block-helper"
                                    data-toggle="modal" data-target="#anularmodal"></button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </main>
    </div>

    <!-- modales -->
    <!-- modal editar -->
    <div class="modal fade" id="editarmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document" id="modalactualizar" style="max-width: 63%;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitleeditar"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="contenidoactualizar">
                    <div class="col-12 grid-margin">
                        <div class="card">
                            <div class="card-body">

                                <form method="POST" action="{{ route('pedidos.updatePedido') }}" class="form-sample"
                                    role="form" enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf
                                    <input type="hidden" name="id" id="idpedidoeditar" />
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Cedula</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="editarcedula" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Fecha Registro</label>
                                                <div class="col-sm-9">
                                                    <input type="date" name="fecha_registro" id="editarfecharegistro"
                                                        class="form-control" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Nombre</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="editarnombre" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Fecha Entrega</label>
                                                <div class="col-sm-9">
                                                    <input type="date" class="form-control" name="fecha_entrega"
                                                        id="editarfechaentrega">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Telefono</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="editartelefono" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Metodo Entrega</label>
                                                <div class="col-sm-9">
                                                    <select class="form-control" name="id_metodo_entrega"
                                                        id="editarmetodoentrega">
                                                        @forelse($metodo_entrega  as $metodo_entregas)
                                                            <option value="{{ $metodo_entregas->id }}">
                                                                {{ $metodo_entregas->nombre }}
                                                            </option>
                                                        @empty <option>No existen</option>
                                                        @endforelse
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Dirección</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" name="direccion"
                                                        id="editardireccion">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Estado</label>
                                                <div class="col-sm-9">
                                                    <select class="form-control" name="proceso" id="editarproceso">
                                                        <option value="0">Pendiente</option>
                                                        <option value="1">Despachado</option>
                                                        <option value="2">Entregado</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Actualizar</button>
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>

    <!-- modal anular -->
    <div class="modal fade" id="anularmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitleanular"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="text-align: center;">
                    <input type="hidden" name="estadoanular" id="estadoanular" />
                    <form method="POST" action="{{ route('pedidos.anularPedido') }}" class="form-sample"
                        role="form" enctype="multipart/form-data">
                        @method('PATCH')
                        @csrf
                        <div>¿Está seguro que desea anular el pedido?</div>
                        <input type="hidden" name="idanular" id="idanular" />
                        <input type="hidden" name="anulardato" value="2" />
                        <button type="submit" class="btn btn-primary">Si</button>
                        <button type="button" class="btn btn-primary" data-dismiss="modal">No</button>
                    </form>
                </div>
            </div>
        </div>
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
                                        <div class="col-sm-6">
                                            <div>
                                                <span class="text-sm text-grey-m2 align-middle">Para:</span>
                                                <span class="text-600 text-110 text-blue align-middle"
                                                    id="nombreclientedetalle" name="nombreclientedetalle"></span>
                                            </div>
                                            <div class="text-grey-m2">
                                                <div class="my-1" id="cedulaclientedetalle"
                                                    name="cedulaclientedetalle">
                                                </div>
                                                <div class="my-1" id="direccionclientedetalle"
                                                    name="direccionclientedetalle">
                                                </div>
                                                <div class="my-1">

                                                </div>
                                                <div class="my-1"><i
                                                        class="fa fa-phone fa-flip-horizontal text-secondary"></i> <b
                                                        class="text-600" id="telefonoclientedetalle"
                                                        name="telefonoclientedetalle"></b></div>
                                            </div>
                                        </div>
                                        <!-- /.col -->

                                        <div class="text-95 col-sm-6 align-self-start d-sm-flex justify-content-end">
                                            <hr class="d-sm-none" />
                                            <div class="text-grey-m2">
                                                <div class="mt-1 mb-2 text-secondary-m1 text-600 text-125">
                                                    Pedido
                                                </div>

                                                <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i>
                                                    <span class="text-600 text-90" id="idpedidodetalle"></span>
                                                </div>

                                                <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i>
                                                    <span class="text-600 text-90" id="fecharegipedidodetalle"></span>
                                                </div>

                                                <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i>
                                                    <span class="text-600 text-90" id="fechaentrepedidodetalle"></span>
                                                </div>


                                                <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i>
                                                    <span class="text-600 text-90" id="procesopedidodetalle"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.col -->
                                    </div>

                                    <div class="table-responsive pt-3" style="margin-bottom: 0%;">
                                        <table id="tablaDetallePedidoSeleccionado" class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        Producto
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
                                                <div class="my-1" id="metodoentregapedidodetalle">
                                                </div>
                                                <div class="my-1" id="metodopagopedidodetalle">
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
                                                                id="totalpedidodetalle"></span>
                                                        </div>
                                                    </div>
                                                </h5>
                                            </div>
                                        </div>

                                        <hr />
                                        <input type="hidden" id="iddescarga">
                                        <div>
                                            <a type="button" id="botonDescarga" class="btn btn-primary">Descargar</a>
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

    <!-- modal abono -->
    <div class="modal fade" id="abonos" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:42%;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitleAbono">Pedido</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="totalpedidoresta">
                    <form role="form" method="POST" {{-- id="formAbonos"  --}} action="{{ route('agregarAbono') }}"
                        onsubmit="return validarMonto()" enctype="multipart/form-data" class="form-sample">
                        @csrf
                        <input type="hidden" name="id" id="idpedidoabonar" />
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Fecha</label>
                                    <div class="col-sm-9">
                                        <input type="date" name="fechaabono" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Abono</label>
                                    <div class="col-sm-9">
                                        <input type="text" id="cantidadabono" name="cantidadabono"
                                            class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-3 ">Medio de Pago</label>
                            <div class="col-3">
                                <select class="form-control" name="medioabono">
                                    <option value="1">Efectivo</option>
                                    <option value="2">Transferencia</option>
                                </select>
                            </div>

                        </div>
                </div>
                <div class="botonestabla" style="text-align: center;">
                    <button type="submit" class="btn btn-primary">Agregar</button>
                    <button type="button" class="btn btn-primary">Cancelar</button>
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
                                    Medio
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
                    <h5><span id="total"></span></h5>
                </div>
            </div>
        </div>
    </div>

    <!-- modal anular abono -->
    <div class="modal fade" id="anularabono" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
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
                    <form method="POST" action="{{ route('anularAbono') }}" class="form-sample" role="form"
                        enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div>¿Está seguro que desea anular el abono?</div>
                        <input type="hidden" name="idanularabono" id="idanularabono" />
                        <input type="hidden" name="idpedidoabono" id="idpedidoabono" />
                        <input type="hidden" name="anulardato" value="2" />
                        <button type="submit" class="btn btn-primary">Si</button>
                        <button type="button" class="btn btn-primary" data-dismiss="modal">No</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- scripts -->

    <script>
        $(document).ready(function() {
            let pathname = window.location.pathname;
            if (pathname == "/pedido") {
                window.location.href = "/pedidos"
            }
            $('#pedidos').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
                }
            });

        });

        function datosDetalle(id) {

            let datos = {!! $pedidocliente !!}
            let detalledatos = datos.find(item => item.id == id)
            $('#exampleModalLongTitledetalle').text(`Pedido #${detalledatos.id}`)
            $('#nombreclientedetalle').text(`${detalledatos.nombrecliente}`)
            $('#cedulaclientedetalle').text(`C.C ${detalledatos.cedula}`)
            $('#direccionclientedetalle').text(`${detalledatos.direccion}, ${detalledatos.nombremunicipio}`)
            $('#telefonoclientedetalle').text(`${detalledatos.telefono}`)
            $('#idpedidodetalle').text(`ID: ${detalledatos.id}`)
            $('#fecharegipedidodetalle').text(`Fecha Registro: ${detalledatos.fecha_registro}`)
            $('#fechaentrepedidodetalle').text(`Fecha Entrega: ${detalledatos.fecha_entrega}`)
            if (detalledatos.proceso == 0) {
                $('#procesopedidodetalle').text(`Estado: Pendiente`)
            } else if (detalledatos.proceso == 1) {
                $('#procesopedidodetalle').text(`Estado: Despachado`)
            } else {
                $('#procesopedidodetalle').text(`Estado: Entregado`)
            }
            $('#metodoentregapedidodetalle').text(`Metodo Entrega:  ${detalledatos.nombremetodoentrega}`)
            $('#metodopagopedidodetalle').text(`Metodo Pago:  ${detalledatos.nombremetodopago}`)
            $('#totalpedidodetalle').text(`${detalledatos.totalpedido}`)

            $('#iddescarga').val(`${detalledatos.id}`)
        }

        function verDatos(id) {
            datosDetalle(id)
            let pedidos = {!! $detallepedido !!}
            let detallePedidos = pedidos.filter(item => item.id == id)
            $("#tablaDetallePedidoSeleccionado tbody").children().remove();
            detallePedidos.forEach(function(value, index) {
                if (value.id == id) {
                    let fila = `
              <tr>
                  <td>
                    ${value.nombreproducto}
                  </td>
                  <td>
                    ${value.cantidadproductos}
                  </td>
                  <td>
                    ${value.precioUnitario}
                  </td>
                  <td>
                   ${value.cantidadproductos * value.precioUnitario}
                  </td>
                </tr>
              `;
                    $("#tablaDetallePedidoSeleccionado tbody").append(fila)
                }
            })
        }

        function verDatosAbono(id) {
            let abonos = {!! $detalleabono !!}
            let detalleabonos = abonos.filter(item => item.id == id)
            let resta = 0
            $("#tablaabonos tbody").children().remove();
            detalleabonos.forEach(function(value, index) {
                resta = value.abono + resta
                if (value.id == id) {
                    let fila = `
                   
              <tr>
                  <td>
                    ${value.fechapago}
                  </td>
                  <td>
                    ${value.abono}
                  </td>
                  <td>
                    ${value.nombre}
                  </td>
                  <td>
                    <button onclick="descargarAbonoPedido(' ${value.idabono}','${value.id}','${value.fechapago}') "class="mdi mdi-download" id="botondescargaabono"></button>
                    <button onclick="anularAbonoPedido(' ${value.idabono} ') " class="mdi mdi-block-helper" data-toggle="modal"
                    data-target="#anularabono"></button>
                    </td>
                <td type="hidden" id="idpedidoabonotabla" style="display: none">
                    ${value.id}
                </td>
                </tr>
                
              `
                    $('#exampleModalLongTitleAbono').text(`Pedido #${value.id}`)
                    $('#total').text(`TOTAL ${value.totalpedido}`)
                    $('#totalpedidoresta').val(`${value.totalpedido}`)
                    let preciototal = `${value.totalpedido}`
                    let restatotal = preciototal - resta
                    $('#resta').text(`RESTA ${restatotal}`)
                    $('#resta').val(`${restatotal}`)
                    $("#tablaabonos tbody").append(fila)
                }
            })

            var fila = document.getElementById("tablaabonos").rows[1];
            var valor = fila.cells[4].innerHTML;
            document.getElementById("idpedidoabonar").value = valor;
        }

        function editarPedido(id) {
            let consulta = {!! $editarpedido !!}
            let editardatos = consulta.find(item => item.id == id)
            $('#exampleModalLongTitleeditar').text(`Actualizar Pedido #${editardatos.id}`);
            $('#editarcedula').val(`${editardatos.cedula}`);
            $('#editarnombre').val(`${editardatos.nombre}`);
            $('#editartelefono').val(`${editardatos.telefono}`);
            $('#editardireccion').val(`${editardatos.direccion}`);
            $('#editarmetodoentrega').val(`${editardatos.id_metodo_entrega}`);
            $('#editarfecharegistro').val(`${editardatos.fecha_registro}`);
            $('#editarfechaentrega').val(`${editardatos.fecha_entrega}`);
            $('#editarmetodopago').val(`${editardatos.id_metodo_pago}`);
            $('#editarproceso').val(`${editardatos.proceso}`);
            $('#idpedidoeditar').val(`${editardatos.id}`);
            let idpedido = `${editardatos.id}`;

        }

        function anularPedido(id) {
            let consulta = {!! $editarpedido !!}
            let datos = consulta.find(item => item.id == id)
            $('#exampleModalLongTitleanular').text(`Anular Pedido #${datos.id}`);
            $('#idanular').val(`${datos.id}`);
            $('#estadoanular').val(`${datos.estado}`);
        }

        $("#botonDescarga").on("click", (event) => {
            window.open('generate-pdf?' + 'id=' + $("#iddescarga").val());
        })

        function anularAbonoPedido(id) {
            let consulta = {!! $detalleabono !!}
            let datos = consulta.find(item => item.idabono == id)
            $('#exampleModalLongTitleanularabono').text(`Anular Abono `);
            $('#idanularabono').val(`${datos.idabono}`);
            $('#idpedidoabono').val(`${datos.idpedidoabono}`);
            $('#estadoanularabaono').val(`${datos.estado}`);
        }

        document.getElementById("buscarAbono").addEventListener("keyup", function(event) {
            if (event.key === "Enter") {
                buscarTabla();
            }
        });

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


        function validarMonto() {
            var input = document.getElementById("cantidadabono").value;
            var resta = document.getElementById("resta").value
            if (!isNumeric(input)) {
                alert("El abono debe ser un valor numérico");
                return false;
            } else {
                console.log(resta)
                if (input > resta) {
                    alert("El abono no puede superar la cantidad de " + resta);
                    return false;
                }
                return true;
            }

            function isNumeric(n) {
                return !isNaN(parseFloat(n)) && isFinite(n);
            }


        }

        function descargarAbonoPedido(idabono, idpedido, fecha) {
            window.open('abono-pdf?' + 'idabono=' + idabono + '&idpedido=' + idpedido + '&fecha=' + fecha);
        }
    </script>
@endsection

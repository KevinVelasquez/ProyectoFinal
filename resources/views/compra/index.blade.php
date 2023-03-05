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

        <table id="compras" class="table table-striped dt-responsive nowrap table" style="width:100%">
            <thead>
                <tr>
                    <th>N Orden</th>
                    <th>Fecha Compra</th>
                    <th>Total</th>
                    <th>Proveedor</th>
                    <th>Método Pago</th>
                    <th>Estado</th>
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
                        @if($compra->estado == 1)
                        <button type="button" class="btn btn-sm btn-success">Activo</button>
                        @else
                        <button type="button" class="btn btn-sm btn-danger">Inactivo</button>
                        @endif
                    </td>
                    <td>
                        <form action="{{ route('compra.destroy',$compra->id) }}" method="POST">
                            <a class="btn btn-primary btn-lg active" href="{{ route('compra.show',$compra->id) }}"><i class="fa fa-fw fa-eye"></i>Detalle</a>

                           @if($compra->anulado == 0)
                            <a class="btn btn-primary btn-lg active" type="button" onclick="verDatosAbono('{{ $compra->id }}')" data-toggle="modal" data-target="#abonos">Abonos</a>
                            @else
                            <button type="button" class="btn btn-primary btn-lg active">Abonos</button>
                            @endif 

                            @csrf
                        </form>
                    </td>
                    <td>
                        @if($compra->anulado == 0)
                        <button onclick="anularCompra('{{ $compra->id }}')" type="submit" class="btn btn-primary btn-lg active" data-toggle="modal" data-target="#anularmodal"><i class="fa fa-fw fa-trash"></i>Anular</button>
                        @else
                        <button type="button" class="btn btn-sm btn-danger">Anulado</button>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </main>
</div>
<!-- modal anular -->
<div class="modal fade" id="anularmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Anular Órden de Compra</h5>
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
                    <button type="button" class="btn btn-primary btn-lg active" data-dismiss="modal">No</button>
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
                                    <input type="date" name="fechaabono" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Abono</label>
                                <div class="col-sm-9">
                                    <input type="number" id="cantidadabono" name="cantidadabono" class="form-control" required>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="botonestabla" style="text-align: center;">
                <button type="submit" id="agregarAbono" class="btn btn-primary">Agregar</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal" aria-label="Close">Cancelar</button>
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
                <form method="POST" action="{{ route('anularAbono') }}" class="form-sample" role="form" enctype="multipart/form-data">
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


<script>
    $(document).ready(function() {
        $('#compra').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
            }
        });
    });

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

    function validarMonto() {
        var input = document.getElementById("cantidadabono").value;
        var resta = document.getElementById("resta").value
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
</script>
@endsection
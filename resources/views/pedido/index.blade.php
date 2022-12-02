@extends('layouts.app')

@section('template_title')
    Pedido
@endsection

@section('content')


<div class="container" style="">
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
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($clientes as $cliente)
                <tr>
                    <td>{{ $cliente->id }}</td>
                    <td>{{ $cliente->cedula }}</td>
                    <td>{{ $cliente->nombre }}</td>
                    <td>{{ $cliente->fecha_registro }}</td>
                    <td>{{ $cliente->fecha_entrega }}</td>
                    <td><?php if($cliente->proceso == "0"){ echo "Pendiente";}
                    else if($cliente->proceso == "1"){ echo "Despachado";}  
                    else{ echo "Entregado";} ?></td>


                    <td>
                        <button onclick="verDatos('{{$cliente->id}}')" class="mdi mdi-format-align-justify"+ data-toggle="modal" data-target="#verdetalle" value="{{$cliente->id}}"  ></button>
                        <button class="mdi mdi-cash-usd" data-toggle="modal" data-target="#abonos"></button>
                        <button class="mdi mdi-lead-pencil" data-toggle="modal" data-target="#editarmodal" action="{{ route('pedidos.edit', $cliente->id) }}"></button>
                        <button class="mdi mdi-block-helper" data-toggle="modal" data-target="#anularmodal"></button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </main>
</div>

<script>
  function verDatos(id){

    


      let detallePedidos = [];
      let pedidos = <?php echo  $detallepedido  ?>;
          pedidos.forEach(function(value, index) {
            detallePedidos[index] = value;
      });

      console.log(detallePedidos)
      detallePedidos.forEach(function(value, index) {
            if(detallePedidos[index].id_pedido == id){
              let fila = `
              <tr>
                  <td>
                    ${detallePedidos[index].id_pedido}
                  </td>
                  <td>
                    ${detallePedidos[index].id_pedido}
                  </td>
                  <td>
                    ${detallePedidos[index].id_pedido}
                  </td>
                  <td>
                    ${detallePedidos[index].id_pedido}
                  </td>
                </tr>
              `;

              $("#tablaDetallePedidoSeleccionado tbody").append(fila)
            }
      })

  }
</script>
<!-- modales -->
<!-- modal editar -->
<div class="modal fade" id="editarmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" id="modalactualizar" style="max-width: 63%;">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Actualizar Pedido</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" id="contenidoactualizar">
          <div class="col-12 grid-margin">
            <div class="card">
              <div class="card-body">
                <form method="POST" action="{{ route('pedidos.update', $cliente->id) }}"class="form-sample">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Cedula</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control"  readonly>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Fecha Registro</label>
                        <div class="col-sm-9">
                          <input type="date" class="form-control">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Nombre</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control"  readonly>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Fecha Entrega</label>
                        <div class="col-sm-9">
                          <input type="date" class="form-control" >
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Telefono</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control"  readonly>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Metodo Pago</label>
                          <div class="col-sm-9">
                            <select class="form-control">
                              <option value="1">Contado</option>
                              <option value="2">Credito</option>
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
                          <input type="text" class="form-control" >
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Medio Pago</label>
                          <div class="col-sm-9">
                            <select class="form-control">
                              <option value="1">Efectivo</option>
                              <option value="2">Transferencia</option>
                          </select>
                          </div>
                        </div>
                      </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Metodo Entrega</label>
                        <div class="col-sm-9">
                          <select class="form-control">
                            <option value="1">Feria</option>
                            <option value="2">Taller</option>
                            <option value="3">Transportadora</option>
                        </select>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Abono</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control">
                          </div>
                        </div>
                      </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label" >Estado</label>
                          <div class="col-sm-9">
                            <select class="form-control">
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
              <button type="submit" class="btn btn-primary" data-dismiss="modal">Actualizar</button>
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
        <h5 class="modal-title" id="exampleModalLongTitle">Anular Pedido</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="text-align: center;">
        <div>¿Está seguro que desea anular el pedido?
          <br>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Si</button>
          <button type="button" class="btn btn-primary" data-dismiss="modal">No</button>
        </div>
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
      <h5 class="modal-title" id="exampleModalLongTitle">Pedido </h5>
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

              <hr class="row brc-default-l1 mx-n1 mb-4" />

              <div class="row">
                <div class="col-sm-6">
                  <div>
                    <span class="text-sm text-grey-m2 align-middle">Para:</span>
                    <span class="text-600 text-110 text-blue align-middle">Kely Sanguino</span>
                  </div>
                  <div class="text-grey-m2">
                    <div class="my-1">
                      C.C 103667045
                    </div>
                    <div class="my-1">
                      Calle 63 # 61 - 44, Medellín
                    </div>
                    <div class="my-1">
                      Antioquia, Colombia
                    </div>
                    <div class="my-1"><i class="fa fa-phone fa-flip-horizontal text-secondary"></i> <b
                        class="text-600">31178318250</b></div>
                  </div>
                </div>
                <!-- /.col -->

                <div class="text-95 col-sm-6 align-self-start d-sm-flex justify-content-end">
                  <hr class="d-sm-none" />
                  <div class="text-grey-m2">
                    <div class="mt-1 mb-2 text-secondary-m1 text-600 text-125">
                      Pedido
                    </div>

                    <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span
                        class="text-600 text-90">ID:</span> #010101</div>

                    <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span
                        class="text-600 text-90">Fecha Registro:</span> Nov 19,2022</div>

                    <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span
                        class="text-600 text-90">Fecha Entrega:</span> Nov 28,2022</div>


                    <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span
                        class="text-600 text-90">Estado:</span> <span>Pendiente</span></div>
                  </div>
                </div>
                <!-- /.col -->
              </div>

              <div class="table-responsive pt-3" style="margin-bottom: 0%;">
                <table id="tablaDetallePedidoSeleccionado" class="table table-bordered">
                  <thead>
                    <tr>
                      <th>
                        Productos
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
                    <div class="my-1">
                      Metodo de Entrega: Feria de Ganado
                    </div>
                    <div class="my-1">
                      Metodo de Pago: Credito
                    </div>
                    <div class="my-1">
                      Medio de Pago: Transferencia
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
                        <span class="text-110 text-secondary-d1">200.000</span>
                      </div>
                    </div>

                    <div class="row my-2 align-items-center bgc-primary-l3 p-2">
                      <div class="col-7 text-right">
                        Resta
                      </div>
                      <div class="col-5">
                        <span class="text-150 text-success-d3 opacity-2">400.000</span>
                      </div>
                    </div>
                  </div>
                </div>

                <hr />

                <div>

                  <a href="#" class="btn btn-primary ">Descargar</a>
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
      <h5 class="modal-title" id="exampleModalLongTitle">Pedido</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      <form class="form-sample">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Fecha</label>
              <div class="col-sm-9">
                <input type="date" class="form-control">
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Abono</label>
              <div class="col-sm-9">
                <input type="text" class="form-control">
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <label class="col-sm-3 ">Medio de Pago</label>
          <div class="col-3">
            <select class="form-control">
              <option>Efectivo</option>
              <option>Transferencia</option>
            </select>
          </div>
        </div>
    </div>
    <div class="botonestabla" style="text-align: center;">
      <button type="button" class="btn btn-primary">Agregar</button>
      <button type="button" class="btn btn-primary">Cancelar</button>
    </div>
  </form>
    <br>
    <br>
    <div class="table-responsive pt-3" style="padding:3%">
      <table class="table table-bordered">
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
              Resta
            </th>
            <th>
              Total
            </th>
            <th>
              Acciones
            </th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>
              11/09/2022
            </td>
            <td>
              500.000
            </td>
            <td>
              Efectivo
            </td>
            <td>
              1'500.000
            </td>
            <td>
              2'000.000
            </td>
            <td>
              <button class="mdi mdi-download"></button>
              <button class="mdi mdi-block-helper" data-toggle="modal" data-target="#anularabono"></button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
</div>
<!-- scripts -->

<script>

    $(document).ready(function () {
        $('#pedidos').DataTable(
            {
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
                }
            });
    });

</script>
@endsection

@extends('layouts.app')

@section('template_title')
Calendario
@endsection

@section('content')
<div class="container">
    <main role="main" class="pb-3">
        <div id="calendario">

        </div>

        <!-- modal detalle -->

    <div class="modal fade" id="verdetalle" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered" role="document" id="modalactualizar" style="max-width: 63%;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitledetalle"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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

                                                    </th>

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
                                                <div class="my-1" id="abono">abono
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


    </main>
</div>





<script>
$(document).ready(function() {
  $('#calendario').fullCalendar({
    locale: 'es',
    events: [
      @foreach($pedidos as $pedido)
      {
        title: '{{ $pedido->nombre }}',
        start: '{{ $pedido->fecha_entrega }}',
        id_pedido: '{{ $pedido->id }}',
        cedula: '{{ $pedido->cedula }}',
        direccion: '{{ $pedido->direccion }}',
        telefono: '{{ $pedido->telefono }}',
        fecha_registro: '{{ $pedido->fecha_registro }}',
        fecha_entrega: '{{ $pedido->fecha_entrega }}',
        proceso: '{{ $pedido->proceso }}',
        nombremetodopago: '{{ $pedido->nombremetodopago }}',
        nombremetodoentrega: '{{ $pedido->nombremetodoentrega }}',
        totalpedido: '{{ $pedido->totalpedido }}',
        municipio: '{{ $pedido->municipio }}',
         
      },
      @endforeach
    ],
 
    eventClick: function(calEvent, jsEvent, view) {
      var idPedido = calEvent.id_pedido;
      var nombre = calEvent.title;
      var cedula = calEvent.cedula;
      var direccion = calEvent.direccion;
      var telefono = calEvent.telefono;
      var fecha_registro = calEvent.fecha_registro;
      var fecha_entrega = calEvent.fecha_entrega;
      var proceso = calEvent.proceso;
      var nombremetodopago = calEvent.nombremetodopago;
      var nombremetodoentrega = calEvent.nombremetodoentrega;
      var totalpedido = calEvent.totalpedido;
      var municipio = calEvent.municipio;


      $('#nombreclientedetalle').text(nombre);
      $('#cedulaclientedetalle').text(`CC:${cedula}`);
      $('#direccionclientedetalle').text(direccion+', '+municipio);
      $('#telefonoclientedetalle').text(telefono);
      $('#idpedidodetalle').text(`ID: ${idPedido}`)
            $('#fecharegipedidodetalle').text(`Fecha Registro: ${fecha_registro}`)
            $('#fechaentrepedidodetalle').text(`Fecha Entrega: ${fecha_entrega}`)
            if (proceso == 0) {
                $('#procesopedidodetalle').text(`Estado: Pendiente`)
            } else if (proceso == 1) {
                $('#procesopedidodetalle').text(`Estado: Despachado`)
            } else {
                $('#procesopedidodetalle').text(`Estado: Entregado`)
            }
            $('#metodoentregapedidodetalle').text(`Metodo Entrega:  ${nombremetodoentrega}`)
            $('#metodopagopedidodetalle').text(`Metodo Pago:  ${nombremetodopago}`)
            $('#totalpedidodetalle').text(`${totalpedido}`)


            
           
            let pedidos = {!! $detallepedido !!}
            console.log(pedidos);
            let detallePedidos = pedidos.filter(item => item.id == idPedido)
            $("#tablaDetallePedidoSeleccionado tbody").children().remove();
            detallePedidos.forEach(function(value, index) {
                if(value.imagen === null){
                    ruta = "";
                }else{
                    ruta = `<img src="http://127.0.0.1:8000/storage/images/figuras/${value.imagen}"/>`
                }
                if (value.id == idPedido) {
                    let fila = `
              <tr>
              <td id="imagen-ruta">
                    ${ruta}
                  </td>
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
       
            let abonos = {!! $abono !!}
            let consulta = abonos.filter(item => item.id_pedido == idPedido)
            let valorabono = `${consulta.totalabonado}`
           console.log(valorabono);
            $('#abono').text(`Abono: ${consulta[0].totalabonado}`);
            
            
console.log(consulta);
            
      $('#verdetalle').modal('show');




    },

    eventRender: function(event, element) {
    if (event.proceso == 0) {
      element.css('background-color', '#ff6b6b',);
    }else if (event.proceso == 1) {
      element.css('background-color', 'yellow');
    }else{
      element.css('background-color', '#49b675');
    }
  }


  });
});


    
</script>



@endsection
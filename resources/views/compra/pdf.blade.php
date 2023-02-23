<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Compra PDF</span>
                        </div>
                    </div>
                    <div class="card-body">

                        <div class="form-group">
                            <strong>N Orden:</strong>
                            {{ $compra[0]->n_orden }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha Compra:</strong>
                            {{ $compra[0]->fecha_compra }}
                        </div>
                        <div class="form-group">
                            <strong>Total:</strong>
                            {{ $compra[0]->total }}
                        </div>
                        <div class="form-group">
                            <strong>Estado:</strong>
                            <?php if ($compra[0]->estado == 1) {
                                echo 'Activo';
                            } elseif ($compra[0]->estado == 2) {
                                echo 'Inactivo';
                            } ?>
                        </div>
                        <div class="form-group">
                            <strong>Anulado:</strong>
                            <?php if ($compra[0]->anulado == 0) {
                                echo 'No anulado';
                            } elseif ($compra[0]->anulado == 1) {
                                echo 'Anulado';
                            } ?>
                        </div>
                        <div class="form-group">
                            <strong>Proveedor:</strong>
                            {{ $compra[0]->proveedor->nombre}}
                        </div>
                        <div class="form-group">
                            <strong>Metodo Pago:</strong>
                            {{ $compra[0]->metodo__pagos->nombre }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <table class="table">
                    <thead>
                        <tr>
                            <th colspan="4" class="text-center">Insumos</th>
                        </tr>
                        <tr>
                            <th>Nombre</th>
                            <th>Cantidad</th>
                            <th>Precio</th>
                            <th>Sub total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($detalle as $detalles)
                        <tr>
                            <td>{{$detalles->insumo->nombre}}</td>
                            <td>{{$detalles->cantidad}}</td>
                            <td>{{$detalles->valor_unitario}}</td>
                            <td>{{$detalles->valor_unitario * $detalles->cantidad}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</body>

</html>
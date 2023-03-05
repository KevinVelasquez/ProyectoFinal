<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Descarga_Detalle_Compra</title>
    <style>
        body {
            font-family: sans-serif;
        }
        table,
        th,
        td {
            border: 1px solid;
            border-collapse: collapse;
        }
        .titulo {
            color: #79242f;
        }
        .texto {
            color: black;
        }
    </style>
</head>

<body>
    <div>
        <div>
            <div>
                <div>
                    <div>
                        <div>
                        </div>
                        <hr>
                        <!-- .row -->
                        <div>
                            <div>
                                <br>
                                <div style="padding: 10px; float: left; width: 45%; text-align: justify;">
                                    <span class="titulo">Proveedor: <span class="texto">{{ $compra[0]->proveedor->nombre}}</span></span><br>
                                    <span class="titulo">Cédula-Nit: <span class="texto">{{ $compra[0]->proveedor->cedula}}</span><br>
                                        <span class="titulo">Dirección: <span class="texto">{{ $compra[0]->proveedor->direccion}}</span><br>
                                            <span class="titulo">Teléfono: <span class="texto">{{ $compra[0]->proveedor->telefono}}</span><br>
                                                <span class="titulo">Correo electrónico: <span class="texto">{{ $compra[0]->proveedor->email}}</span><br>

                                </div>
                                <div style="padding: 10px; float: right; width: 45%; text-align: justify;">
                                    <span class="titulo">Número de órden: <span class="texto">{{ $compra[0]->n_orden }}</span><br>
                                        <span class="titulo">Fecha Compra: <span class="texto">{{ $compra[0]->fecha_compra }}</span><br>
                                            <span class="titulo">Método de pago: <span class="texto">{{ $compra[0]->metodo__pagos->nombre }}</span><br>
                                </div>
                            </div>
                        </div>
                        <hr style="margin-top:120px;" />
                        <table style="margin-top:20px;width: 100%;">
                            <thead class="titulo">
                                <tr>
                                    <th colspan="4" class="text-center">Insumos</th>
                                </tr>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Cantidad</th>
                                    <th>Precio Unitario</th>
                                    <th>Subtotal</th>
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
                <div style="text-align:right">
                    <b class="titulo">TOTAL:<span class="texto">{{ $compra[0]->total }}</b>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
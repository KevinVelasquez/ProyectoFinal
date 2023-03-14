@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Dashboard</h1>
        <form method="get" action="{{ route('dashboard.index') }}">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="start-date">Fecha de inicio:</label>
                        <input type="date" id="start-date" name="start_date" class="form-control"
                            value="{{ $startDate }}">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="end-date">Fecha final:</label>
                        <input type="date" id="end-date" name="end_date" class="form-control"
                            value="{{ $endDate }}">
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary" style="margin-top: 0%">Generar gráfico</button>
        </form>
        <div class="row">
            <div class="col-md-6">
                <div>
                    <canvas id="grafica-pedidos"></canvas>
                </div>
                <a href="{{ route('dashboard.pedidosmes') }}" target="_blank" class="btn btn-primary">Ver en PDF</a>
            </div>
            <div class="col-md-3">
                <div style="width:100%;height: 21em;">
                    <canvas id="proceso-pedidos"></canvas>
                </div>
                <a href="{{ route('dashboard.pedidosproceso') }}" target="_blank" class="btn btn-primary">Ver en PDF</a>
            </div>
            <div class="col-md-3">
                <div style="width:100%;height: 21em;">
                    <canvas id="productosvendidos"></canvas>
                </div>
                <a href="" target="_blank" class="btn btn-primary">Ver en PDF</a>
            </div>
        </div>
        <br>
        <br>

        <div class="row">
            <div class="col-md-6">
                <div>
                    <canvas id="frecuencia-clientes"></canvas>
                </div>
            </div>
            <div class="col-md-6">
                <div>
                    <canvas id="frecuencia-proveedores"></canvas>
                </div>
            </div>
        </div>
        <br>
        <br>

        <div class="row">
            <div class="col-md-4">
                <div style="width:100%;height: 21em;">
                    <canvas id="metodo_entregas"></canvas>
                </div>
            </div>
            <div class="col-md-4">
                <div style="width:100%;height: 21em;">
                    <canvas id="metodo_pagos"></canvas>
                </div>
            </div>
            <div class="col-md-4">
                <div style="width:100%;height: 21em;">
                    <canvas id="tipoclientes"></canvas>
                </div>
            </div>
        </div>
        <br>
        <br>
        <div class="row">
            <div class="col-md-12">
                <div>
                    <canvas id="balance"></canvas>
                </div>
            </div>
        </div>


        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>

        <script>
            //cantidadpedidosmes
            var meses = <?php echo json_encode($meses); ?>;
            var data = <?php echo json_encode(array_values($data)); ?>;


            var ctx = document.getElementById('grafica-pedidos').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: meses,
                    datasets: [{
                        label: 'Pedidos en el año',
                        data: data,
                        backgroundColor: '#B81D15',
                        borderColor: '#B81D15',
                        borderWidth: 1
                    }]
                },
                options: {
                    title: {
                        display: true,
                        text: 'Pedidos en el año'
                    }
                }
            });

            //procesopedidos
            const datosProceso = @json($datosProceso);
            const procesosChart = new Chart(document.getElementById('proceso-pedidos'), {
                type: 'pie',
                data: {
                    labels: Object.keys(datosProceso),
                    datasets: [{
                        data: Object.values(datosProceso),
                        backgroundColor: ['#c73a40', 'yellow', '#49b675'],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    title: {
                        display: true,
                        text: 'Pedidos por proceso'
                    }
                }
            });

            //productosvendidos
            var productosvendidos = <?php echo json_encode($productosvendidos); ?>;

            var etiquetas = [];
            var valores = [];

            productosvendidos.forEach(function(productos) {
                etiquetas.push(productos.nombre);
                valores.push(productos.cantidad_total);
            });

            var canvas = document.getElementById('productosvendidos');
            var grafico = new Chart(canvas, {
                type: 'doughnut',
                data: {
                    labels: etiquetas,
                    datasets: [{
                        label: 'Cantidad productos vendidos',
                        data: valores,
                        backgroundColor: ['#cc0000', '#cc3300', '#ffcc00', '#49b675', '#006666', '#0066ff',
                            '#0000cc', '#663399', '#cc0099'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    title: {
                        display: true,
                        text: 'Cantidad productos vendidos'
                    }
                }
            });

            //frecuenciacliente
            var frecuenciacliente = <?php echo json_encode($frecuenciacliente); ?>;

            var etiquetas = [];
            var valores = [];

            frecuenciacliente.forEach(function(cliente) {
                etiquetas.push(cliente.nombre);
                valores.push(cliente.total_pedidos);
            });

            var canvas = document.getElementById('frecuencia-clientes');
            var grafico = new Chart(canvas, {
                type: 'bar',
                data: {
                    labels: etiquetas,
                    datasets: [{
                        label: 'Total de pedidos por cliente',
                        data: valores,
                        backgroundColor: '#49b675',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    },
                    title: {
                        display: true,
                        text: 'Total de pedidos por cliente'
                    }
                }
            });

            //frecuenciaproveedor
            var frecuenciaproveedor = <?php echo json_encode($frecuenciaproveedor); ?>;

            var etiquetas = [];
            var valores = [];

            frecuenciaproveedor.forEach(function(proveedor) {
                etiquetas.push(proveedor.nombre);
                valores.push(proveedor.total_compra);
            });

            var canvas = document.getElementById('frecuencia-proveedores');
            var grafico = new Chart(canvas, {
                type: 'bar',
                data: {
                    labels: etiquetas,
                    datasets: [{
                        label: 'Total de compras por proveedor',
                        data: valores,
                        backgroundColor: '#004677',
                        borderColor: '#004677',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    },
                    title: {
                        display: true,
                        text: 'Total de compras por proveedor'
                    }
                }
            });

            //metodoentrega
            var pedidos_por_metodo_entrega = <?php echo json_encode($pedidos_por_metodo_entrega); ?>;

            var etiquetas = [];
            var valores = [];

            pedidos_por_metodo_entrega.forEach(function(entrega) {
                etiquetas.push(entrega.nombre);
                valores.push(entrega.cantidad_pedidos);
            });

            var canvas = document.getElementById('metodo_entregas');
            var grafico = new Chart(canvas, {
                type: 'doughnut',
                data: {
                    labels: etiquetas,
                    datasets: [{
                        label: 'Cantidad de pedidos por lugar de entrega',
                        data: valores,
                        backgroundColor: ['#cc0000', '#0066ff', '#663399'],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    title: {
                        display: true,
                        text: 'Cantidad de pedidos por lugar de entrega'
                    }
                }
            });

            //metodopagos
            var pedidos_por_metodo_pago = <?php echo json_encode($pedidos_por_metodo_pago); ?>;

            var etiquetas = [];
            var valores = [];

            pedidos_por_metodo_pago.forEach(function(pagos) {
                etiquetas.push(pagos.nombre);
                valores.push(pagos.cantidad_pedidos);
            });

            var canvas = document.getElementById('metodo_pagos');
            var grafico = new Chart(canvas, {
                type: 'doughnut',
                data: {
                    labels: etiquetas,
                    datasets: [{
                        label: 'Cantidad de pedidos por metodo de pago',
                        data: valores,
                        backgroundColor: ['#006666', '#cc0099'],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    title: {
                        display: true,
                        text: 'Cantidad de pedidos por metodo de pago'
                    }
                }
            });

            //metodopagos
            var clientes_por_tipo = <?php echo json_encode($clientes_por_tipo); ?>;

            var etiquetas = [];
            var valores = [];

            clientes_por_tipo.forEach(function(cliente) {
                etiquetas.push(cliente.nombre);
                valores.push(cliente.cantidad_clientes);
            });

            var canvas = document.getElementById('tipoclientes');
            var grafico = new Chart(canvas, {
                type: 'doughnut',
                data: {
                    labels: etiquetas,
                    datasets: [{
                        label: 'Tipos de Cliente',
                        data: valores,
                        backgroundColor: ['#FFCC00', '#996633'],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    title: {
                        display: true,
                        text: 'Tipos de Cliente'
                    }
                }
            });

            //balance
            var abonosPorMesClientes = <?php echo json_encode($abonosPorMesClientes); ?>;
            var valorescli = [];

            abonosPorMesClientes.forEach(function(cliente) {
                valorescli.push(cliente.total);
            });
            var abonosPorMesProveedor = <?php echo json_encode($abonosPorMesProveedor); ?>;
            var valorespro = [];

            abonosPorMesProveedor.forEach(function(proveedor) {
                valorespro.push(proveedor.total);
            });  

            var ctx = document.getElementById('balance').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: meses,
                    datasets: [{
                        label: 'Entradas',
                        backgroundColor: '#49b675',
                        borderWidth: 1,
                        data: valorescli
                    }, {
                        label: 'Salidas',
                        backgroundColor: '#cc3333',
                        borderWidth: 1,
                        data: valorespro
                    }]
                },
                options: {
                    title: {
                        display: true,
                        text: 'Balance entradas y salidas'
                    }
                }
            });

        </script>
    @endsection

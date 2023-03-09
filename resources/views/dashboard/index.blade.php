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
            <div class="col-md-7">
                <div>
                    <canvas id="grafica-pedidos"></canvas>
                </div>
            </div>
                <div class="col-md-5">
                    <div style="width:100%;height: 21em;" >
                        <canvas id="proceso-pedidos"></canvas>
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
                        type: 'bar',
                        data: {
                            labels: meses,
                            datasets: [{
                                label: 'PEDIDOS EN EL AÑO',
                                data: data,
                                backgroundColor: '#B81D15',
                                borderColor: '#B81D15',
                                borderWidth: 1
                            }]
                        },
                    });

                    //procesopedidos
                    const datosProceso = @json($datosProceso);
                    const procesosChart = new Chart(document.getElementById('proceso-pedidos'), {
                        type: 'pie',
                        data: {
                            labels: Object.keys(datosProceso),
                            datasets: [{
                                data: Object.values(datosProceso),
                                backgroundColor: ['#B81D15', 'yellow', '#49b675'],
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
                </script>
            @endsection

@extends('adminlte::page')

@section('title', 'Admin')

@section('content_header')
    <h2>Bienvenido {{Auth::user()->name}}</h2>
@stop

@section('content')
        @if (session('info'))
        <div class="alert alert-success">
            <strong>{{(session('info'))}}</strong>
        </div>
        @endif

        <div class="card ">
            <div class="card-header text-center text-success ">
                <h5>{{ $rol }}</h5>
            </div>
            <div class="card-body text-center size-14">

                @if ($rol == "Coordinador")
                     {{ $seller->municipio }}<br>
                     {{ $seller->puesto}}<br>
                    Codigo del Puesto: {{ Auth::user()->codpuesto }}<br>
                    Total de mesas: {{ $tmc }}<br>
                    <div class="progress">

                        <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: {{ ($tml/$tmc)*100 }}%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">{{ ($tml/$tmc)*100 }}%</div>
                    </div>

                @else
                    @if ($rol == "Esctrutador")
                        Comision Auxiliar escrutadora {{ Auth::user()->codzon }}
                    @else
                         Acreditacion, reporte y seguimiento electoral.
                    @endif
                @endif
            </div>




            <div class="card-footer text-muted text-center" >
                <h6>TestiApp todos los derechos reservados</h6>
            </div>
        </div>

            @if (Auth::user()->role == 2)
                <div class="row">
                    <div  class="col-sm-12 col-xs-12 ">
                        <div class="card card-success">
                            <div class="card-header">
                            <h3   class="card-title">Avence por Comisiones Auxiliares</h3>
                                <div class="card-tools">
                            </div>
                            <!-- /.card-tools -->
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body " >
                                <div class="chart">
                                    <div class="chartjs-size-monitor">

                                        <canvas id="zonas" width="400" height="150" aria-label="" role="img"></canvas>

                                    </div>
                                </div>

                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">

                            </div>
                            <!-- /.card-footer -->
                        </div>
                    </div>
                </div>
            @else

            @endif


@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>
    <script>
        const ctx3 = document.getElementById('zonas').getContext('2d');
        const mis = new Chart(ctx3, {
            type: 'bar',
            scales: {

                x: {
                    stacked: true,

                },

                },
            data: {
                labels: [
                    @foreach ($data as $data)
                        '{{ $data->codescru}}',
                    @endforeach
                ],
                    datasets: [{
                    label: 'Acreditados',
                    backgroundColor: 'green',
                    data: [
                        @foreach ($dat as $dat)
                            {{ $dat->T}},
                        @endforeach

                    ]
                }, {
                    label: 'Pendientes',
                    backgroundColor: 'red',
                    data: [

                        @foreach ($not as $not)
                        {{ $not->F }},
                         @endforeach
                    ]
                }]
            },
            options: {
                scales: {

                }
            }
        });
    </script>



@endsection


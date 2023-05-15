@extends('adminlte::page')

@section('title', 'Resultados')

@section('content_header')



    <h1 style="text-align: center">Resultados</h1>
@stop

@section('content')

    <div class="row">
        <div class="col-sm-4 col-xs-12">
            <div class="card text-center card-success">
                <div class="card-header">
                    <h3 class="card-title">Felipe Carreño</h3>
                    
                        <div class="card-tools">
                    </div>
                <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body " >
                    <div class="chart">
                        <div class="chartjs-size-monitor">
                            <h4>Total votos:{{ $tv1 }}</h4>


                            <canvas id="goodCanvas1" width="400" height="5" aria-label="" role="img"></canvas>
                        </div>
                    </div>

                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    @if ($tm == 0)
                        0% de mesas Informadas
                    @else
                    <h6>{{ round(($tmi/$tm)*100 ,3)}}% de mesas Informadas </h6>
                    @endif


                </div>
                <!-- /.card-footer -->
            </div>
        </div>
        <div class="col-sm-4 col-xs-12">
            <div class="card text-center card-indigo">
                <div class="card-header">
                <h3 class="card-title" >Candidato 2</h3>
                <div class="card-tools">
                    <!-- Buttons, labels, and many other things can be placed here! -->
                    <!-- Here is a label for example -->

                </div>
                <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body " >
                    <div class="chart">
                        <div class="chartjs-size-monitor">
                            <h4>Total votos:{{ $tv2 }}</h4>
                            <canvas id="goodCanvas2" width="400" height="10" aria-label="Hello ARIA World" role="img"></canvas>
                        </div>
                    </div>

                </div>
                <!-- /.card-body -->
                <div class="card-footer">

                    @if ($tm == 0)
                        0% de mesas Informadas
                    @else
                        <h6>{{ round(($tmi2/$tm)*100 ,3)}}% de mesas Informadas </h6>
                    @endif

                </div>
                <!-- /.card-footer -->
            </div>
        </div>
        <div class="col-sm-4 col-xs-12">
            <div class="card text-center card-info">
                <div class="card-header">
                <h3 class="card-title">Candidato 3</h3>
                    <div class="card-tools">
                </div>
                <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body " >
                    <div class="chart">
                        <div class="chartjs-size-monitor">
                            <h4>Total votos:{{ $tv3 }}</h4>
                            <canvas id="vill" width="400" height="10" aria-label="Hello ARIA World" role="img"></canvas>
                        </div>
                    </div>

                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    @if ($tm == 0)
                    0% de mesas Informadas
                @else
                    <h6>{{ round(($tmi3/$tm)*100 ,3)}}% de mesas Informadas</h6>
                @endif

                </div>
                <!-- /.card-footer -->
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4 col-xs-12">
            <div class="card card-success text-center">
                <div class="card-header">
                <h3 class="card-title"  >Reporte de escrutinio</h3>
                    <div class="card-tools">
                </div>
                <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body " >
                    <div class="chart">
                        <div  class="chartjs-size-monitor">
                            <h3>Recuperados:{{ $tr }}</h3>
                            <canvas id="goodCanvas1" width="400" height="10" ></canvas>
                        </div>
                    </div>

                </div>
                <!-- /.card-body -->

                <!-- /.card-footer -->
            </div>
        </div>
        <div class="col-sm-8 col-xs-12">
            <div class="card card-info text-center">
                <div class="card-header">
                <h3 class="card-title" >Votos recuperados por comision escrutadora</h3>
                <div class="card-tools">
                    <!-- Buttons, labels, and many other things can be placed here! -->
                    <!-- Here is a label for example -->

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
                    Datos Reportados en tiempo real por los escrutadores.
                </div>
                <!-- /.card-footer -->
            </div>
        </div>

    </div>



@stop

@section('css')

@endsection

@section('js')
    <script> console.log('de tu mano señor!'); </script>
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
                    label: 'Votos recuperados',
                    backgroundColor: 'green',
                    data: [
                        @foreach ($dat as $dat)
                            {{ $dat->T}},
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
@stop


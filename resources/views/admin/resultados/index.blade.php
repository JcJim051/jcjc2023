@extends('adminlte::page')

@section('title', 'Resultados')

@section('content_header')



    <h1 style="text-align: center">Resultados</h1>
@stop

@section('content')

    <div class="row">
        <div class="col-sm-6 col-xs-12">
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
        <div class="col-sm-3 col-xs-6">
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
        <div class="col-sm-3 col-xs-6">
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
                            <h4>Total votos: {{ $tv3 }}</h4>
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
        <div class="col-sm-6 col-xs-12">
                <div class="info-box ">
                    <span class="info-box-icon bg-info bg-success"><i class="far fa-flag"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Promedio votos</span>
                        <span class="info-box-number"> @if ($tmi == 0)
                            Sin reporte
                        @else
                        
                            {{round($tv1/$tmi)}} votos por mesa
                        
                        @endif </span>
                    </div>
                </div>        
        </div>        
        <div class="col-sm-6 col-xs-12">
            <div class="info-box ">
                <span class="info-box-icon bg-info bg-success"><i class="far fa-flag"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Mesas con Reclamacion</span>
                    <span class="info-box-number"> @if ($recl == 0)
                        0
                    @else
                    
                        {{$recl}}
                    
                    @endif </span>
                </div>
            </div>       
        </div>
        {{-- <div class="col-sm-4 col-xs-12">
            <div class="info-box ">
                <span class="info-box-icon bg-info bg-success"><i class="far fa-flag"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Mesas con Reclamacion</span>
                    <span class="info-box-number"> @if ($recl == 0)
                        0
                    @else
                    
                        {{$recl}}
                    
                    @endif </span>
                </div>
            </div>         
        </div>
         --}}
    </div>
    <div class="row">
        <div class="col-sm-12 col-xs-12">
            <div class="card card-info text-center">
                <div class="card-header">
                <h3 class="card-title" >Votos por comisión escrutadora</h3>
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
                            <canvas id="zona" width="400" height="150" aria-label="" role="img"></canvas>
                        </div>
                    </div>

                </div>
                <!-- /.card-body -->
                
                <!-- /.card-footer -->
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-sm-12 col-xs-12">
            <div class="card card-info text-center">
                <div class="card-header">
                    <h3 class="card-title" >Votos por municipios</h3>
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
                            <canvas id="barchar" width="400" height="150" aria-label="" role="img"></canvas>
                        </div>
                    </div>

                </div>
                <!-- /.card-body -->
                
                <!-- /.card-footer -->
            </div>
        </div>
    </div>

     <h2 style="text-align: center">Resultados de Escrutinio</h2>
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
                <h3 class="card-title" >Votos recuperados por comisión escrutadora</h3>
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
                    label: 'Acreditados',
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

        const ctx1 = document.getElementById('zona').getContext('2d');
        const mr = new Chart(ctx1, {
            type: 'bar',
            scales: {

                x: {
                    stacked: true,

                },

                },
            data: {
                labels: [
                    @foreach ($d as $d)
                        '{{ $d->codescru}}',
                    @endforeach
                ],
                    datasets: [{
                    label: 'Votos',
                    backgroundColor: 'green',
                    data: [
                        @foreach ($dt as $dt)
                            {{ $dt->T}},
                        @endforeach

                    ]
                }]
            },
            options: {
                scales: {

                }
            }
        });


        const ctx4 = document.getElementById('barchar').getContext('2d');
        
        const mir = new Chart(ctx4, {
            type: 'bar',

            scales: {


                x: {
                    stacked: true,

                },

                },
            data: {
                labels: [
                    @foreach ($lablemun as $lablemun)
                        '{{ $lablemun->municipio}}',
                    @endforeach
                ],
                    datasets: [{
                    label: 'Votos',
                    backgroundColor: 'green',
                    data: [

                        @foreach ($okmun as $okmun)
                        {{ $okmun->T }},
                         @endforeach
                    ]
                }]
            },
            options: {
                scales: {
                    xAxes: [{
                        ticks: {
                        fontSize: 10,
                        maxRotation: 90 // aquí estableces el tamaño de letra para el eje x
                        }
                    }]
                },
                plugins: {
                    legend: {
                        labels: {
                            // This more specific font property overrides the global property
                        font: {
                            size: 12
                            }
                        }
                    }
                }
            }
        });
    </script>
@stop


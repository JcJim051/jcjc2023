@extends('adminlte::page')

@section('title', 'Indicadores')

@section('content_header')



    <h1 style="text-align: center">Métricas</h1>
@stop

@section('content')
       
    <div class="row">

        <div class="col-sm-2 col-xs-12" >
            <div class="small-box bg-info bg-gradient-success" >
                <div class="inner">
                    <h3> {{$okd}} </h3>
                    <p>Mesas Acreditadas Departamental</p>
                    <span class="info-box-text">Remanentes</span>
                    <span class="info-box-number"> {{$remokd}} </span>
                </div>
                
                <div class="icon">
                    <i class="fas fa-user-check"></i>
                </div>
            </div>
        </div>

        <div class="col-sm-2 col-xs-12">
            <div class="small-box bg-info bg-gradient-danger ">
                <div class="inner">
                <h3> {{$nookd}} </h3>
                <p>Mesas Faltantes Departamental</p>
                <span class="info-box-text">Remanentes</span>
                <span class="info-box-number"> {{$remnookd}} </span>
                </div>
                <div class="icon">
                    <i class="fas fa-user-slash"></i>
                </div>

            </div>
        </div>
        <div class="col-sm-2 col-xs-12">
            <div class="small-box bg-info bg-gradient-success">
                <div class="inner">
                <h3>{{$okv}} </h3>
                <p>Mesas Acreditadas Villavicencio</p>
                <span class="info-box-text">Remanentes</span>
                <span class="info-box-number"> {{$remokv}} </span>
                </div>
                <div class="icon">
                    <i class="fas fa-street-view"></i>
                </div>
            </div>
        </div>

        <div class="col-sm-2 col-xs-12">
            <div class="small-box bg-info bg-gradient-danger ">
                <div class="inner">
                <h3>{{$nookv}} </h3>
                <p>Mesas Faltantes VIllavicencio</p>
                <span class="info-box-text">Remanentes</span>
                <span class="info-box-number"> {{$remnookv}} </span>
                </div>
                <div class="icon">
                    <i class="fas fa-store-alt"></i>
                </div>

            </div>
        </div><div class="col-sm-2 col-xs-12">
            <div class="small-box bg-info bg-gradient-success">
                <div class="inner">
                <h3> {{$okm}} </h3>
                <p>Mesas Acreditadas municipios</p>
                <span class="info-box-text">Remanentes</span>
                <span class="info-box-number"> {{$remokm}} </span>
                </div>
                <div class="icon">
                <i class="fas fa-user-check"></i>
                </div>
            </div>
        </div>

        <div class="col-sm-2 col-xs-12">
            <div class="small-box bg-info bg-gradient-danger ">
                <div class="inner">
                <h3> {{$nookm}} </h3>
                <p>Mesas Faltantes municipios</p>
                <span class="info-box-text">Remanentes</span>
                <span class="info-box-number"> {{$remnookm}} </span>
                </div>
                <div class="icon">
                    <i class="fas fa-user-slash"></i>
                </div>

            </div>
        </div>

    </div>
   

       
    <div class="row">
        <div class="col-sm-4 col-xs-12">
            <div class="card card-success">
                <div class="card-header">
                <h3 class="card-title">Avance Departamental
                    @if ($okd+$nookd == 0);
                        0
                    @else
                        {{ round(($okd/($okd+$nookd))*100, 2) }};
                    @endif
                %</h3>
                    <div class="card-tools">
                </div>
                <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body" >
                    <div class="chart">
                        <div class="chartjs-size-monitor">
                            <canvas id="goodCanvas1" width="400" height="100" aria-label="Hello ARIA World" role="img"></canvas>
                        </div>
                    </div>

                </div>
                <!-- /.card-body -->
                <div class="card-footer">

                </div>
                <!-- /.card-footer -->
            </div>
        </div>
        <div class="col-sm-4 col-xs-12">
            <div class="card card-indigo">
                <div class="card-header">
                <h3 class="card-title" >Avance Villavicencio
                    @if ($okv+$nookv == 0)
                        0
                    @else
                        {{ round(($okv/($okv+$nookv))*100, 2)}}
                    @endif
                %</h3>
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
                            <canvas id="goodCanvas2" width="400" height="200" aria-label="Hello ARIA World" role="img"></canvas>
                        </div>
                    </div>

                </div>
                <!-- /.card-body -->
                <div class="card-footer">

                </div>
                <!-- /.card-footer -->
            </div>
        </div>
        <div class="col-sm-4 col-xs-12">
            <div class="card card-info">
                <div class="card-header">
                <h3 class="card-title">Avance Municipios
                    @if ($okm+$nookm == 0)
                    0
                    @else
                        {{ round(($okm/($okm+$nookm))*100, 2)}}
                    @endif
                %</h3>
                    <div class="card-tools">
                </div>
                <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body " >
                    <div class="chart">
                        <div class="chartjs-size-monitor">
                            <canvas id="vill" width="400" height="100" aria-label="" role="img"></canvas>
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

    <div class="row">
        <div class="info-box">
            <span class="info-box-icon bg-info"><i class="far fa-bookmark"></i></span>
            <div class="info-box-content">
              <span class="info-box-text" >Validación Ani y contacto</span>
              <span class="info-box-number"> {{$okani}} </span>
              <div class="progress">
                <div class="progress-bar bg-info" style="width: {{($okani/($okani+$nookani))}}% "></div>
              </div>
              <span class="progress-description">
                <p>{{  round(($okani/($okani+$nookani)),2)}}% Avance total</p>
              </span>
            </div>
          </div>
    </div>

    <div class="row">
        <div  class="col-sm-12 col-xs-12 ">
            <div class="card card-success">
                <div class="card-header">
                <h3   class="card-title">Avance por Comisiones Auxiliares</h3>
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
    <div class="row">
        <div class="col-sm-12 col-xs-12">
            <div class="card card-primary">
                <div class="card-header">
                <h3 class="card-title">Avance por municipios</h3>
                    <div class="card-tools">
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
                <div class="card-footer">

                </div>
                <!-- /.card-footer -->
            </div>
        </div>
    </div>


</div>

@stop

@section('css')

@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>
    <script>
        const ctx = document.getElementById('goodCanvas1').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['Pendientes', 'Acreditados'],
                datasets: [{
                    label: '# of Votes',
                    data: [{{ $nookd}},{{ $okd}}],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(75, 192, 192, 0.2)',

                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(75, 192, 192, 1)',

                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {

                }
            }
        });

        const ctxa = document.getElementById('goodCanvas2').getContext('2d');
        const my = new Chart(ctxa, {
            type: 'doughnut',
            data: {
                labels: ['Pendientes', 'Acreditados'],
                datasets: [{
                    label: '# de testigos',
                    data: [{{ $nookv}},{{ $okv}}],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',

                        'rgba(75, 192, 192, 0.2)',

                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',

                        'rgba(75, 192, 192, 1)',

                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {

                }
            }
        });
        const ctx2 = document.getElementById('vill').getContext('2d');
        const my1 = new Chart(ctx2, {
            type: 'doughnut',
            data: {
                labels: ['Pendientes', 'Acreditados'],
                datasets: [{
                    label: '# of Votes',
                    data: [{{ $nookm}},{{ $okm}}],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',

                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',

                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {

                }
            }
        });


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


        const ctx4 = document.getElementById('barchar').getContext('2d');
        Chart.defaults.font.size = 11;
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
                    label: 'Acreditados',
                    backgroundColor: 'green',
                    data: [

                        @foreach ($okmun as $okmun)
                        {{ $okmun->T }},
                         @endforeach
                    ]
                }, {
                    label: 'Pendientes',
                    backgroundColor: 'red',
                    data: [
                        @foreach ($nookmun as $nookmun)
                        {{ $nookmun->F }},
                         @endforeach

                    ]
                }]
            },
            options: {
                scales: {
                    xAxes: [{
                        ticks: {
                        fontSize: 10 // aquí estableces el tamaño de letra para el eje x
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



@endsection

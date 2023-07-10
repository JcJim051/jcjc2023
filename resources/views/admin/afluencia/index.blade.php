@extends('adminlte::page')

@section('title', 'Resultados')

@section('content_header')



    <h1 style="text-align: center">Indicadores de Afluencia de Votantes</h1>
@stop

@section('content')

   
    <div class="row">
        <div class="col-sm-4 col-xs-12">
                <div class="info-box ">
                    <span class="info-box-icon bg-info bg-success"><i class="far fa-flag"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Promedio votantes por mesa 9 am</span>
                        <span class="info-box-number"> @if ($tmi_1 == 0)
                            Sin reporte
                        @else
                        
                            {{round($tv1/$tmi_1)}} votantes por mesa
                        
                        @endif </span>
                    </div>
                </div>        
        </div>        
        
        <div class="col-sm-4 col-xs-12">
            <div class="info-box ">
                <span class="info-box-icon bg-info bg-success"><i class="far fa-flag"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Promedio votantes por mesa 11 am</span>
                    <span class="info-box-number"> @if ($tmi_1 == 0)
                        Sin reporte
                    @else
                    
                        {{round($tv2/$tmi_2)}} votantes por mesa
                    
                    @endif </span>
                </div>
            </div>        
        </div>
        <div class="col-sm-4 col-xs-12">
            <div class="info-box ">
                <span class="info-box-icon bg-info bg-success"><i class="far fa-flag"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Promedio votantes por mesa 2 pm</span>
                    <span class="info-box-number"> @if ($tmi_1 == 0)
                        Sin reporte
                    @else
                    
                        {{round($tv3/$tmi_3)}} votantes por mesa
                    
                    @endif </span>
                </div>
            </div>        
        </div>
    </div>
    <h4 style="text-align: center">Afluencia de Votantes en villavicencio por Zonas</h4>
    <div class="row">
        <div class="col-sm-12 col-xs-12">
            <div class="card card-outline card-info">
                <div class="card-header">
                <h3 class="card-title" ><span style="color: red">PRIMER REPORTE</span>   </h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-toggle="collapse" data-target="#collapseContent">
                        <i class="fas fa-minus"></i>
                      </button>
                </div>
                <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div  id="collapseContent" class="collapse " class="card-body " >
                    
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
            <div class="card card-outline card-info">
                <div class="card-header">
                <h3 class="card-title" > <span style="color:red">SEGUNDO REPORTE</span>   </h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-toggle="collapse" data-target="#collapseContent1">
                        <i class="fas fa-minus"></i>
                      </button>
                </div>
                <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div  id="collapseContent1" class="collapse " class="card-body " >
                    
                        <div class="chart">
                            <div class="chartjs-size-monitor">
                                <canvas id="zona2" width="400" height="150" aria-label="" role="img"></canvas>
                            </div>
                        </div>
                    
                   

                   

                </div>
                <!-- /.card-body -->
                
                <!-- /.card-footer -->
            </div>
    </div>
    </div><div class="row">
        <div class="col-sm-12 col-xs-12">
            <div class="card card-outline card-info">
                <div class="card-header">
                <h3 class="card-title" > <span style="color: red">TERCER REPORTE </span>  </h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-toggle="collapse" data-target="#collapseContent3">
                        <i class="fas fa-minus"></i>
                      </button>
                </div>
                <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div  id="collapseContent3" class="collapse " class="card-body " >
                    
                        <div class="chart">
                            <div class="chartjs-size-monitor">
                                <canvas id="zona3" width="400" height="150" aria-label="" role="img"></canvas>
                            </div>
                        </div>
                    
                   

                   

                </div>
                <!-- /.card-body -->
                
                <!-- /.card-footer -->
            </div>
        </div>

    </div>
    <h4 style="text-align: center">Afluencia de Votantes por municipios</h4>
        <div class="row">
            <div class="col-sm-12 col-xs-12">
                <div class="card card-outline card-warning">
                    <div class="card-header">
                        <h3 class="card-title" ><span style="color: red">PRIMER REPORTE</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-toggle="collapse" data-target="#collapseContent5">
                                <i class="fas fa-minus"></i>
                            </button>

                        </div>
                    <!-- /.card-tools -->
                    </div>
                    <!-- /.card-header -->
                    <div  id="collapseContent5" class="collapse " class="card-body " >
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
        </div><div class="row">
            <div class="col-sm-12 col-xs-12">
                <div class="card card-outline card-warning">
                    <div class="card-header">
                        <h3 class="card-title" ><span style="color: red">SEGUNDO REPORTE</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-toggle="collapse" data-target="#collapseContent6">
                                <i class="fas fa-minus"></i>
                            </button>

                        </div>
                    <!-- /.card-tools -->
                    </div>
                    <!-- /.card-header -->
                    <div  id="collapseContent6" class="collapse " class="card-body " >
                        <div class="chart">
                            <div class="chartjs-size-monitor">
                                <canvas id="barchar2" width="400" height="150" aria-label="" role="img"></canvas>
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
                <div class="card card-outline card-warning">
                    <div class="card-header">
                        <h3 class="card-title" ><span style="color: red">TERCER REPORTE</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-toggle="collapse" data-target="#collapseContent7">
                                <i class="fas fa-minus"></i>
                            </button>

                        </div>
                    <!-- /.card-tools -->
                    </div>
                    <!-- /.card-header -->
                    <div  id="collapseContent7" class="collapse " class="card-body " >
                        <div class="chart">
                            <div class="chartjs-size-monitor">
                                <canvas id="barchar3" width="400" height="150" aria-label="" role="img"></canvas>
                            </div>
                        </div>

                    </div>
                    <!-- /.card-body -->
                    
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
                yAxes: [{
                    ticks: {
                    beginAtZero: true
                    }
                }]
                }
            }
        });

        const ctx8 = document.getElementById('zona2').getContext('2d');
        const mr8 = new Chart(ctx8, {
            type: 'bar',
            scales: {

                x: {
                    stacked: true,

                },

                },
            data: {
                labels: [
                    @foreach ($d2 as $d2)
                        '{{ $d2->codescru}}',
                    @endforeach
                ],
                    datasets: [{
                    label: 'Votos',
                    backgroundColor: 'green',
                    data: [
                        @foreach ($dt2 as $dt2)
                            {{ $dt2->T}},
                        @endforeach

                    ]
                }]
            },
            options: {
                scales: {
                yAxes: [{
                    ticks: {
                    beginAtZero: true
                    }
                }]
                }
            }
        });
        const ctx9 = document.getElementById('zona3').getContext('2d');
        const mr9 = new Chart(ctx9, {
            type: 'bar',
            scales: {

                x: {
                    stacked: true,

                },

                },
            data: {
                labels: [
                    @foreach ($d3 as $d3)
                        '{{ $d3->codescru}}',
                    @endforeach
                ],
                    datasets: [{
                    label: 'Votos',
                    backgroundColor: 'green',
                    data: [
                        @foreach ($dt3 as $dt3)
                            {{ $dt3->T}},
                        @endforeach

                    ]
                }]
            },
            options: {
                scales: {
                yAxes: [{
                    ticks: {
                    beginAtZero: true
                    }
                }]
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
                    }],
                    yAxes: [{
                    ticks: {
                    beginAtZero: true
                    }}]
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


        const ctx12 = document.getElementById('barchar2').getContext('2d');
        
        const mir12 = new Chart(ctx12, {
            type: 'bar',

            scales: {


                x: {
                    stacked: true,

                },

                },
            data: {
                labels: [
                    @foreach ($lablemun2 as $lablemun2)
                        '{{ $lablemun2->municipio}}',
                    @endforeach
                ],
                    datasets: [{
                    label: 'Votos',
                    backgroundColor: 'green',
                    data: [

                        @foreach ($okmun2 as $okmun2)
                        {{ $okmun2->T }},
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
                    }],
                    yAxes: [{
                    ticks: {
                    beginAtZero: true
                    }}]
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

        const ctx13 = document.getElementById('barchar3').getContext('2d');
        
        const mir13 = new Chart(ctx13, {
            type: 'bar',

            scales: {


                x: {
                    stacked: true,

                },

                },
            data: {
                labels: [
                    @foreach ($lablemun3 as $lablemun3)
                        '{{ $lablemun3->municipio}}',
                    @endforeach
                ],
                    datasets: [{
                    label: 'Votos',
                    backgroundColor: 'green',
                    data: [

                        @foreach ($okmun3 as $okmun3)
                        {{ $okmun3->T }},
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
                    }],
                    yAxes: [{
                    ticks: {
                    beginAtZero: true
                    }}]
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


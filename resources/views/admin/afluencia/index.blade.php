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
    
    <div class="row">
        <div class="col-sm-12 col-xs-12">
            <div class="card card-outline card-info">
                <div class="card-header">
                <h3 class="card-title" style="text-align: center"> Afluencia de Votantes en villavicencio por Zonas  </h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-toggle="collapse" data-target="#collapseContent">
                        <i class="fas fa-minus"></i>
                      </button>
                </div>
                <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div  id="collapseContent"  class="card-body " >
                    
                        <div class="chart">
                            <div class="chartjs-size-monitor">
                                <canvas id="zona" width="400" height="130" aria-label="" role="img"></canvas>
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
                        <h3 class="card-title "style="text-align: center">  Afluencia de Votantes por municipios</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-toggle="collapse" data-target="#collapseContent5">
                                <i class="fas fa-minus"></i>
                            </button>

                        </div>
                    <!-- /.card-tools -->
                    </div>
                    <!-- /.card-header -->
                    <div  id="collapseContent5"  class="card-body " >
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
                        '{{ $d->codzon}}',
                    @endforeach
                ],
                    datasets: [{
                    label: '9 am',
                    backgroundColor: 'green',
                    data: [
                        @foreach ($dt as $dt)
                            {{ $dt->T}},
                        @endforeach

                    ]
                     }, {
                    label: '11 am',
                    backgroundColor: 'orange',
                    data: [

                        @foreach ($dt3 as $dt3)
                            {{ $dt3->T}},
                        @endforeach
                    ]},
                    {
                    label: '2pm',
                    backgroundColor: 'brown',
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
                    backgroundColor: 'turquoise',
                    data: [

                        @foreach ($okmun as $okmun)
                        {{ $okmun->T }},
                         @endforeach
                    ]
                    }, {
                    label: '11 am',
                    backgroundColor: 'purple',
                    data: [

                        @foreach ($okmun2 as $okmun2)
                        {{ $okmun2->T }},
                         @endforeach
                    ]},
                    {
                    label: '2pm',
                    backgroundColor: 'tan',
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


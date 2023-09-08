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
            <div class="text-center card-header text-success ">
                <h5>{{ $rol }}</h5>
            </div>
            <div class="text-center card-body size-14">
                
                @if ($rol == "Delegado")
                    <div class="text-center text-info text-success">
                        <h4>Tu rol</h5>
                        <h5>Delegado de puesto de votación   {{$seller1->puesto}}
                        {{ $seller1->municipio }}<br>
                        Código del Puesto: {{ Auth::user()->codpuesto }}<br>
                        </h5>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <div class="small-box bg-info bg-gradient-warning">
                                <div class="inner">
                                <h3> {{$tmc}}</h3>
                                <p>Total mesas en el puesto</p>
                                <h4> {{$tremc}}</h4>
                                <p>Remanentes</p>
                                
                                </div>
                                <div class="icon">
                                    <i class="fas fa-store-alt"></i>
                                </div>
                            </div>
                        </div>

                        <div class="col-3">
                            <div class="small-box bg-info ">
                                <div class="inner">
                                <h3> {{ $tml }}</h3>
                                <p>Mesas Acreditadas</p>
                                <h4> {{ $treml }}</h4>
                                <p>Remanentes</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-street-view"></i>
                                </div>

                            </div>
                        </div>
                        <div class="col-3">
                            <div class="small-box bg-info bg-gradient-danger">
                                <div class="inner">
                                <h3> {{ ($tmc-$tml) }}</h3>
                                <p>Mesas faltantes</p>
                                <h4> {{ ($tremc-$treml) }}</h4>
                                <p>Remanentes</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-user-slash"></i>
                                </div>

                            </div>
                        </div>

                        <div class="col-3">
                            <div class="small-box bg-info bg-gradient-success ">
                                <div class="inner">
                                @if ($tmc == 0)
                                <h3> 0% </h3>    
                                @else
                                <h3>{{ round(($tml/$tmc)*100,2)}}%</h3>
                                @endif 
                                <p>% de mesas Acreditadas</p>

                                @if ($tremc == 0)
                                <h4> 0% </h4>    
                                @else
                                <h4>{{ round(($treml/$tremc)*100,2)}}%</h4>
                                @endif 
                                <p>% Remanentes</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-user-check"></i>
                                </div>

                            </div>
                        </div>
                    </div>


                @else
                    @if ($rol == "Esctrutador")
                        <div class="text-center text-info text-success">
                            <h5>Tu rol</h5>
                            @if (Auth::user()->mun == 1)
                                <p>Escrutador comision Auxiliar escrutadora {{ Auth::user()->codzon }} <br></p>
                            @else
                             <p>Escrutador Municipal de {{$mun->municipio}} <br>Código del municipio: {{ Auth::user()->codzon }} </p>
                            @endif
                           
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <div class="small-box bg-info bg-gradient-warning">
                                    <div class="inner">
                                    <h3> {{$tmcom}}</h3>
                                    <p>Total mesas en comision</p>
                                    <h4> {{$tremcom}}</h4>
                                    <p>Remanentes</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-store-alt"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="col-3">
                                <div class="small-box bg-info ">
                                    <div class="inner">
                                    <h3> {{ $tmlc }}</h3>
                                    <p>Mesas Acreditadas</p>
                                    <h4> {{ $tremlc }}</h4>
                                    <p>Remanentes</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-street-view"></i>
                                    </div>

                                </div>
                            </div>
                            <div class="col-3">
                                <div class="small-box bg-info bg-gradient-danger">
                                    <div class="inner">
                                    <h3> {{ ($tmcom-$tmlc) }}</h3>
                                    <p>Mesas faltantes</p>
                                    <h4> {{ ($tremcom-$tremlc) }}</h4>
                                    <p>Remanentes</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-user-slash"></i>
                                    </div>

                                </div>
                            </div>

                            <div class="col-3">
                                <div class="small-box bg-info bg-gradient-success ">
                                    <div class="inner">
                                        <h3> 
                                            @if ($tmcom == 0)
                                            0
                                            @else
                                            {{round(($tmlc/$tmcom)*100,2) }}% 
                                            @endif
                                        </h3>
                                    <p>% de mesas Acreditadas</p>
                                    <h4> 
                                        @if ($tremcom == 0)
                                        0
                                        @else
                                        {{round(($tremlc/$tremcom)*100,2) }}% 
                                        @endif
                                    </h4>
                                <p>% Remanentes</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-user-check"></i>
                                    </div>
 
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="info-box ">
                                <span class="info-box-icon bg-info bg-success"><i class="far fa-flag"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Testigos Posesionados : {{$ttpc}}</span>
                                    <span class="info-box-number">Remanentes Disponibles: {{$trpc}} </span>
                                  
                                </div>
                            </div>   
                        </div>
                    @else                    
                        @if (Auth::user()->role == 2)
                            @if (Auth::user()->mun == 1)
                                <div class="text-center text-info text-success">
                        
                                    <h5>Zona electoral {{Auth::user()->codzon}}</h5>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        <div class="small-box bg-info bg-gradient-warning">
                                            <div class="inner">
                                            <h3> {{$tmcom}}</h3>
                                            <p>Total mesas en la zona</p>
                                            <h4> {{$tremcom}}</h4>
                                            <p>Remanentes</p>
                                            </div>
                                            <div class="icon">
                                                <i class="fas fa-store-alt"></i>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-3">
                                        <div class="small-box bg-info ">
                                            <div class="inner">
                                            <h3> {{ $tmlc }}</h3>
                                            <p>Mesas Acreditadas</p>
                                            <h4> {{ $tremlc }}</h4>
                                            <p>Remanentes</p>
                                            </div>
                                            <div class="icon">
                                                <i class="fas fa-street-view"></i>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="small-box bg-info bg-gradient-danger">
                                            <div class="inner">
                                            <h3> {{ ($tmcom-$tmlc) }}</h3>
                                            <p>Mesas faltantes</p>
                                            <h4> {{ ($tremcom-$tremlc) }}</h4>
                                            <p>Remanentes</p>
                                            </div>
                                            <div class="icon">
                                                <i class="fas fa-user-slash"></i>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="col-3">
                                        <div class="small-box bg-info bg-gradient-success ">
                                            <div class="inner">
                                                <h3> 
                                                    @if ($tmcom == 0)
                                                    0
                                                    @else
                                                    {{round(($tmlc/$tmcom)*100,2) }}% 
                                                    @endif
                                                </h3>
                                            <p>% de mesas Acreditadas</p>
                                            <h4> 
                                                @if ($tremcom == 0)
                                                0
                                                @else
                                                {{round(($tremlc/$tremcom)*100,2) }}% 
                                                @endif
                                            </h4>
                                        <p>% Remanentes</p>
                                            </div>
                                            <div class="icon">
                                                <i class="fas fa-user-check"></i>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="info-box ">
                                        <span class="info-box-icon bg-info bg-success"><i class="far fa-flag"></i></span>
                                        <div class="info-box-content">
                                            <span class="info-box-text">Testigos Posesionados : {{$ttpc}}</span>
                                            <span class="info-box-number">Remanentes Disponibles: {{$trpc}} </span>
                                        
                                        </div>
                                    </div>   
                                </div>  
                            @else
                                <div class="text-center text-info text-success">
                                    <h5>Tu rol</h5>
                                    @if (Auth::user()->mun == 1)
                                        <p>Escrutador comision Auxiliar escrutadora {{ Auth::user()->codzon }} <br></p>
                                    @else
                                    <p>Escrutador Municipal de {{$mun->municipio}} <br>Código del municipio: {{ Auth::user()->codzon }} </p>
                                    @endif
                                
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        <div class="small-box bg-info bg-gradient-warning">
                                            <div class="inner">
                                            <h3> {{$tmcom}}</h3>
                                            <p>Total mesas en el municipio</p>
                                            <h4> {{$tremcom}}</h4>
                                            <p>Remanentes</p>
                                            </div>
                                            <div class="icon">
                                                <i class="fas fa-store-alt"></i>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-3">
                                        <div class="small-box bg-info ">
                                            <div class="inner">
                                            <h3> {{ $tmlc }}</h3>
                                            <p>Mesas Acreditadas</p>
                                            <h4> {{ $tremlc }}</h4>
                                            <p>Remanentes</p>
                                            </div>
                                            <div class="icon">
                                                <i class="fas fa-street-view"></i>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="small-box bg-info bg-gradient-danger">
                                            <div class="inner">
                                            <h3> {{ ($tmcom-$tmlc) }}</h3>
                                            <p>Mesas faltantes</p>
                                            <h4> {{ ($tremcom-$tremlc) }}</h4>
                                            <p>Remanentes</p>
                                            </div>
                                            <div class="icon">
                                                <i class="fas fa-user-slash"></i>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="col-3">
                                        <div class="small-box bg-info bg-gradient-success ">
                                            <div class="inner">
                                                <h3> 
                                                    @if ($tmcom == 0)
                                                    0
                                                    @else
                                                    {{round(($tmlc/$tmcom)*100,2) }}% 
                                                    @endif
                                                </h3>
                                            <p>% de mesas Acreditadas</p>
                                            <h4> 
                                                @if ($tremcom == 0)
                                                0
                                                @else
                                                {{round(($tremlc/$tremcom)*100,2) }}% 
                                                @endif
                                            </h4>
                                        <p>% Remanentes</p>
                                            </div>
                                            <div class="icon">
                                                <i class="fas fa-user-check"></i>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="info-box ">
                                        <span class="info-box-icon bg-info bg-success"><i class="far fa-flag"></i></span>
                                        <div class="info-box-content">
                                            <span class="info-box-text">Testigos Posesionados : {{$ttpc}}</span>
                                            <span class="info-box-number">Remanentes Disponibles: {{$trpc}} </span>
                                        
                                        </div>
                                    </div>   
                                </div>               
                            @endif
                        @else
                            @if (Auth::user()->role == 1)
                                @if (Auth::user()->mun == 0)
                                    <div class="text-center text-info text-success">
                                        <p>Bloque de municipios número: {{ Auth::user()->codzon }} </p>
                                    </div>
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="small-box bg-info bg-gradient-warning">
                                                <div class="inner">
                                                <h3> {{$tmrut}}</h3>
                                                <p>Total mesas</p>
                                                <h4> {{$tremrut}}</h4>
                                                <p>Remanentes</p>
                                                </div>
                                                <div class="icon">
                                                    <i class="fas fa-store-alt"></i>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-3">
                                            <div class="small-box bg-info ">
                                                <div class="inner">
                                                <h3> {{ $tmlr }}</h3>
                                                <p>Mesas Acreditadas</p>
                                                <h4> {{ $tremlr }}</h4>
                                                <p>Remanentes</p>
                                                </div>
                                                <div class="icon">
                                                    <i class="fas fa-street-view"></i>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="small-box bg-info bg-gradient-danger">
                                                <div class="inner">
                                                <h3> {{ ($tmrut-$tmlr) }}</h3>
                                                <p>Mesas faltantes</p>
                                                <h4> {{ ($tremrut-$tremlr) }}</h4>
                                                <p>Remanentes</p>
                                                </div>
                                                <div class="icon">
                                                    <i class="fas fa-user-slash"></i>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="col-3">
                                            <div class="small-box bg-info bg-gradient-success ">
                                                <div class="inner">
                                                    <h3> 
                                                        @if ($tmrut == 0)
                                                        0
                                                        @else
                                                        {{round(($tmlr/$tmrut)*100,2) }}% 
                                                        @endif
                                                    </h3>
                                                <p>% de mesas Acreditadas</p>
                                                <h4> 
                                                    @if ($tremrut == 0)
                                                    0
                                                    @else
                                                    {{round(($tremlr/$tremrut)*100,2) }}% 
                                                    @endif
                                                </h4>
                                            <p>% Remanentes</p>
                                                </div>
                                                <div class="icon">
                                                    <i class="fas fa-user-check"></i>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="info-box ">
                                            <span class="info-box-icon bg-info bg-success"><i class="far fa-flag"></i></span>
                                            <div class="info-box-content">
                                                <span class="info-box-text">Testigos Posesionados : {{$ttpc}}</span>
                                                <span class="info-box-number">Remanentes Disponibles: {{$trpc}} </span>
                                            
                                            </div>
                                        </div>   
                                    </div> 
                                @else
                                    @if (Auth::user()->mun == 0)
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
                                @endif
                            @else
                            @endif
                        @endif
                    @endif
                @endif
            </div>




            <div class="text-center card-footer text-muted" >
                <h6>TestiApp todos los derechos reservados</h6>
            </div>
        </div>

        


@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>
    <script>
   
        const ctx3 = document.getElementById('zonas').getContext('2d');
        const mis1 = new Chart(ctx3, {
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


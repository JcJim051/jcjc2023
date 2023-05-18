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
                    <div class="text-center text-info text-success">
                        <h4>Tu rol</h5>
                        <h5>Coordinador puesto de votacion   {{ $seller->puesto}}
                        {{ $seller->municipio }}<br>
                        Codigo del Puesto: {{ Auth::user()->codpuesto }}<br>
                        </h5>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <div class="small-box bg-info bg-gradient-warning">
                                <div class="inner">
                                <h3> {{$tmc}}</h3>
                                <p>Total mesas en el puesto</p>
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
                            <p>Escrutador comision Auxiliar escrutadora {{ Auth::user()->codzon }} <br></p>
                        </div>


                        <div class="row">
                            <div class="col-3">
                                <div class="small-box bg-info bg-gradient-warning">
                                    <div class="inner">
                                    <h3> {{$tmcom}}</h3>
                                    <p>Total mesas en la comision</p>
                                    </div>
                                    <div class="icon">
                                    <i class="fas fa-shopping-cart"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="col-3">
                                <div class="small-box bg-info ">
                                    <div class="inner">
                                    <h3> {{ $tmlc }}</h3>
                                    <p>Mesas Acreditadas</p>
                                    </div>
                                    <div class="icon">
                                    <i class="fas fa-shopping-cart"></i>
                                    </div>

                                </div>
                            </div>
                            <div class="col-3">
                                <div class="small-box bg-info bg-gradient-danger">
                                    <div class="inner">
                                    <h3> {{ ($tmcom-$tmlc) }}</h3>
                                    <p>Mesas faltantes</p>
                                    </div>
                                    <div class="icon">
                                    <i class="fas fa-shopping-cart"></i>
                                    </div>

                                </div>
                            </div>

                            <div class="col-3">
                                <div class="small-box bg-info bg-gradient-success ">
                                    <div class="inner">
                                    <h3> {{round(($tmlc/$tmcom)*100,2) }}%</h3>
                                    <p>% de mesas Acreditadas</p>
                                    </div>
                                    <div class="icon">
                                    <i class="fas fa-shopping-cart"></i>
                                    </div>

                                </div>
                            </div>
                        </div>


                    @else
                    Acreditación, reporte y seguimiento electoral.
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


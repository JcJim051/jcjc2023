@extends('adminlte::page')

@section('title', 'Resultados')

@section('content_header')



    <h1 style="text-align: center">Control de asistencia</h1>
@stop

@section('content')

    <div class="row">
        <div class="col-sm-6 col-xs-12">
            <div class="text-center card card-success">
                <div class="card-header">
                    <h3 class="card-title">Total Testigos en mesa (Villavicencio)  </h3>
                    
                        <div class="card-tools">
                    </div>
                <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body " >
                    <div class="chart">
                        <div class="chartjs-size-monitor">
                            <h4>Principales : {{ $ttpv }}</h4>
                               
                        </div>
                    </div>

                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <h4>Remanentes: {{ $trpv }}</h4>


                </div>
                <!-- /.card-footer -->
            </div>
        </div>
        <div class="col-sm-6 col-xs-12">
            <div class="text-center card card-info">
                <div class="card-header">
                    <h3 class="card-title">Total Testigos en mesa (Municipios)  </h3>
                    
                        <div class="card-tools">
                    </div>
                <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body " >
                    <div class="chart">
                        <div class="chartjs-size-monitor">
                            <h4>Principales : {{ $ttpm }}</h4>
                               
                        </div>
                    </div>

                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <h4>Remanentes: {{ $trpm }}</h4>


                </div>
                <!-- /.card-footer -->
            </div>
        </div>
    </div>
 
    <div class="row">
        <div class="col-sm-12 col-xs-12">
            <div class="text-center card card-info">
                <div class="card-header">
                <h3 class="card-title" >Testigos Presentes por zona en villavicencio</h3>
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
            <div class="text-center card card-info">
                <div class="card-header">
                    <h3 class="card-title" >Testigos presentes por municipios</h3>
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
                    label: 'Acreditados',
                    backgroundColor: 'green',
                    data: [
                        @foreach ($dt as $dt)
                            {{ $dt->T}},
                        @endforeach

                    ]
                }, {
                    label: 'Pendientes',
                    backgroundColor: 'red',
                    data: [

                        @foreach ($ndt as $ndt)
                        {{ $ndt->F }},
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
                    label: 'Acreditados',
                    backgroundColor: 'green',
                    data: [
                        @foreach ($okmun as $okmun)
                            {{ $okmun->T}},
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


@extends('adminlte::page')

@section('title', 'Resultados')

@section('content_header')



    <h1 style="text-align: center">Resultados</h1>
@stop

@section('content')

    <div class="row">
        <div class="col-sm-4 col-xs-12">
            <div class="text-center card card-success">
                <div class="card-header">
                    <h3 class="card-title">Rafaela Cortes - Preconteo</h3>
                    
                        <div class="card-tools">
                    </div>
                <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body " >
                    <div class="chart">
                        <div class="chartjs-size-monitor">
                            <h4>Total votos: <span id="totalvotos"></span></h4>


                           
                        </div>
                    </div>

                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                   
                    <h6><span id="mesas_escrutadas"></span>% de mesas Informadas </h6> 


                </div>
                <!-- /.card-footer -->
            </div>
        </div>
        <div class="col-sm-8 col-xs-12">
            <div class="text-center card card-info">
                <div class="card-header">
                <h3 class="card-title" >Total Votos por Candidato</h3>
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
                            <canvas id="resultados" height="150" aria-label="" role="img"></canvas>
                        </div>
                    </div>

                </div>
                <!-- /.card-body -->
                
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
                        <span class="info-box-number" id="promedio_votos"> </span>
                    </div>
                </div>        
        </div>        
        <div class="col-sm-6 col-xs-12">
            <div class="info-box ">
                <span class="info-box-icon bg-info bg-success"><i class="far fa-flag"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Mesas con Reclamacion</span>
                    <span class="info-box-number" id="mesas_reclamacion">  </span>
                </div>
            </div>       
        </div>
        
    </div>
    <div class="row">
        <div class="col-sm-12 col-xs-12">
            <div class="text-center card card-info">
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
                            <canvas id="zonas" width="400" height="150" aria-label="" role="img"></canvas>
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
                            <canvas id="municipios" width="400" height="150" aria-label="" role="img"></canvas>
                        </div>
                    </div>

                </div>
                <!-- /.card-body -->
                
                <!-- /.card-footer -->
            </div>
        </div>
    </div>

     {{-- <h2 style="text-align: center">Resultados de Escrutinio</h2>
    <div class="row">
        <div class="col-sm-4 col-xs-12">
            <div class="text-center card card-success">
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
            <div class="text-center card card-info">
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

    </div> --}}



@stop

@section('css')

@endsection

@section('js')
    <script> console.log('de tu mano señor!'); </script>
    <script>
        

        const ctx9 = document.getElementById('resultados').getContext('2d');
        const resultados = new Chart(ctx9, {
            type: 'bar',
            scales: {

                x: {
                    stacked: true,

                },

                },
            data: {
                labels: [
                   
                ],
                    datasets: [{
                    label: 'votos',
                    backgroundColor: 'purple',
                    data: [
                     

                    ]
                }]
            },
            options: {
                scales: {

                }
            }
        });

        const ctx3 = document.getElementById('zonas').getContext('2d');
        const zonas = new Chart(ctx3, {
            type: 'bar',
            scales: {

                x: {
                    stacked: true,

                },

                },
            data: {
                labels: [
                   
                ],
                    datasets: [{
                    label: 'Acreditados',
                    backgroundColor: 'green',
                    data: [
                     

                    ]
                }]
            },
            options: {
                scales: {

                }
            }
        });

       

        const ctx4 = document.getElementById('municipios').getContext('2d');
        
        const municipios = new Chart(ctx4, {
            type: 'bar',

            scales: {


                x: {
                    stacked: true,

                },

                },
            data: {
                labels: [
                   
                ],
                    datasets: [{
                    label: 'Votos',
                    backgroundColor: 'green',
                    data: [

                        
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

<script>
    function actualizarGraficos() {
        $.ajax({
            url: "{{ route('getResultados') }}",
            method: 'GET',
            dataType: 'json',
            success: function(newData) {
                console.log('ok');
            
                var labels = [];
                var tData = [];
                

                var labelmun = [];
                var tDatamun = [];
                var fDatamun = [];

                var labelres = [];
                var tDatares = [];


                const candidatos = Object.keys(newData.candidatos[0]);
                const votos = Object.values(newData.candidatos[0]).map(Number);


                // Iterar sobre el nuevo JSON y extraer los datos
                newData.dt.forEach(function(item) {
                    labels.push(item.codzon);
                    tData.push(item.T);
                   
                });
                newData.labelmun.forEach(function(item) {
                        labelmun.push(item.municipio);
                        tDatamun.push(item.T);
                       
                    });
                
               

                // Actualizar los datos en la instancia de la gráfica
                zonas.data.labels = labels;
                zonas.data.datasets[0].data = tData;                
                zonas.update();

                municipios.data.labels = labelmun;
                municipios.data.datasets[0].data = tDatamun;
                municipios.update();

                resultados.data.labels = candidatos;
                resultados.data.datasets[0].data = votos;
                resultados.update();

               

               var mesas_escrutadas = 0;
                if (newData.tmi_1 != 0) {
                    mesas_escrutadas = ((newData.tmi / newData.tm) * 100) ;
                    mesas_escrutadas = Math.round(mesas_escrutadas * 100) / 100; // Redondear a 2 decimales
                }
                $('#mesas_escrutadas').text(mesas_escrutadas);

                var promedio_votos = 0;
                if (newData.tmi != 0) {
                    promedio_votos = ((newData.tv1 / newData.tmi)) ;
                    promedio_votos = Math.round(promedio_votos * 100) / 100; // Redondear a 2 decimales
                }
                $('#promedio_votos').text(promedio_votos);
                                    
                var mesas_reclamacion = 0;
                if (newData.recl != 0) {
                    mesas_reclamacion = ((newData.recl)) ;
                   
                }
                $('#mesas_reclamacion').text(mesas_reclamacion);

                $('#totalvotos').text(newData.tv1);
            }
           
                });
                    
    }
    
    // Llama a la función de actualización cada cierto intervalo de tiempo
    setInterval(actualizarGraficos, 3000); // Actualiza cada 5 segundos, ajusta según tus necesidades
</script>
@stop


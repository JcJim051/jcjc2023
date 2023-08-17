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
                            <h4>Principales : <span id="principalesv"></span></h4>
                               
                        </div>
                    </div>

                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <h4>Remanentes: <span id="remanentesv"></span></h4>


                </div>
                <!-- /.card-footer -->
            </div>
        </div>
        <div class="col-sm-6 col-xs-12">
            <div class="text-center card card-info">
                <div class="card-header">
                    <h3 class="card-title">Total Testigos en mesa (municipios)  </h3>
                    
                        <div class="card-tools">
                    </div>
                <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body " >
                    <div class="chart">
                        <div class="chartjs-size-monitor">
                            <h4>Principales : <span id="principalesm"></span></h4>
                               
                        </div>
                    </div>

                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <h4>Remanentes: <span id="remanentesm"></span></h4>


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
                            <canvas id="municipios" width="400" height="150" aria-label="" role="img"></canvas>
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

        

        const ctx1 = document.getElementById('zonas').getContext('2d');
        const zonas = new Chart(ctx1, {
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
                    label: 'En mesa',
                    backgroundColor: 'green',
                    data: [
                        

                    ]
                }, {
                    label: 'Sin Testigo',
                    backgroundColor: 'red',
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
                label: [
                    
                ],
                    datasets: [{
                    label: 'Acreditados',
                    backgroundColor: 'green',
                    data: [
                       

                    ]
                }, {
                    label: 'Pendientes',
                    backgroundColor: 'red',
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
                url: "{{ route('getAsistencia') }}",
                method: 'GET',
                dataType: 'json',
                success: function(newData) {
                    console.log('ok');
                
                    var labels = [];
                    var tData = [];
                    var fData = [];
    
                    var labelmun = [];
                    var tDatamun = [];
                    var fDatamun = [];
    
                    // Iterar sobre el nuevo JSON y extraer los datos
                    newData.dt.forEach(function(item) {
                        labels.push(item.codzon);
                        tData.push(item.T);
                        fData.push(item.F);
                    });
                    newData.lablemun.forEach(function(item) {
                        labelmun.push(item.municipio);
                        tDatamun.push(item.T);
                        fDatamun.push(item.F);
                    });
                   
    
                    // Actualizar los datos en la instancia de la gráfica
                    zonas.data.labels = labels;
                    zonas.data.datasets[0].data = tData;
                    zonas.data.datasets[1].data = fData;
                    zonas.update();
    
                    municipios.data.labels = labelmun;
                    municipios.data.datasets[0].data = tDatamun;
                    municipios.data.datasets[1].data = fDatamun;
                    municipios.update();
    
                    
                    
                   
    
                    $('#principalesv').text(newData.ttpv);
                    $('#remanentesv').text(newData.trpv);
                    $('#principalesm').text(newData.ttpm);
                    $('#remanentesm').text(newData.trpm);
                    
    
                    
                }
               
                    });
                        
        }
        
        // Llama a la función de actualización cada cierto intervalo de tiempo
        setInterval(actualizarGraficos, 3000); // Actualiza cada 5 segundos, ajusta según tus necesidades
    </script>
@stop


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
                        <span  class="info-box-number"><span id="primer"></span></span>
                    </div>
                </div>        
        </div>        
        
        <div class="col-sm-4 col-xs-12">
            <div class="info-box ">
                <span class="info-box-icon bg-info bg-success"><i class="far fa-flag"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Promedio votantes por mesa 11 am</span>
                    <span id="segundo" class="info-box-number">  </span>
                </div>
            </div>        
        </div>
        <div class="col-sm-4 col-xs-12">
            <div class="info-box ">
                <span class="info-box-icon bg-info bg-success"><i class="far fa-flag"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Promedio votantes por mesa 2 pm</span>
                    <span class="info-box-number" id="tercero">  </span>
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
                                <canvas id="zonas" width="400" height="130" aria-label="" role="img"></canvas>
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
                                <canvas id="municipios" width="400" height="150" aria-label="" role="img"></canvas>
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
                    label: '9 am',
                    backgroundColor: 'green',
                    data: [
                       
                        

                    ]
                     }, {
                    label: '11 am',
                    backgroundColor: 'orange',
                    data: [

                        
                    ]},
                    {
                    label: '2pm',
                    backgroundColor: 'brown',
                    data: [

                       
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
                    backgroundColor: 'turquoise',
                    data: [

                      
                    ]
                    }, {
                    label: '11 am',
                    backgroundColor: 'purple',
                    data: [

                       
                    ]},
                    {
                    label: '2pm',
                    backgroundColor: 'tan',
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

<script>
    function actualizarGraficos() {
        $.ajax({
            url: "{{ route('getAfluencia') }}",
            method: 'GET',
            dataType: 'json',
            success: function(newData) {
                console.log('ok');
            
                var labels = [];
                var tData = [];
                var fData = [];
                var wData = [];

                var labelmun = [];
                var tDatamun = [];
                var fDatamun = [];
                var wDatamun = [];

                // Iterar sobre el nuevo JSON y extraer los datos
                newData.dt.forEach(function(item) {
                    labels.push(item.codzon);
                    tData.push(item.T);
                    fData.push(item.F);
                    wData.push(item.W);
                });
                newData.labelmun.forEach(function(item) {
                        labelmun.push(item.municipio);
                        tDatamun.push(item.T);
                        fDatamun.push(item.F);
                        wDatamun.push(item.W);

                    });
               
               

                // Actualizar los datos en la instancia de la gráfica
                zonas.data.labels = labels;
                zonas.data.datasets[0].data = tData;
                zonas.data.datasets[1].data = fData;
                zonas.data.datasets[2].data = wData;
                zonas.update();

                municipios.data.labels = labelmun;
                municipios.data.datasets[0].data = tDatamun;
                municipios.data.datasets[1].data = fDatamun;
                municipios.data.datasets[2].data = wDatamun;
                municipios.update();
               
               
                var primer = 0;
                if (newData.tmi_1 != 0) {
                    primer = (newData.tv1 / newData.tmi_1) ;
                    primer = Math.round(primer * 100) / 100; // Redondear a 2 decimales
                }
                $('#primer').text(primer);

                var segundo = 0;
                if (newData.tmi_2 != 0) {
                    segundo = (newData.tv2 / newData.tmi_2) ;
                    segundo = Math.round(segundo * 100) / 100; // Redondear a 2 decimales
                }
                $('#segundo').text(segundo);

                var tercero = 0;
                if (newData.tmi_3 != 0) {
                    tercero = (newData.tv3 / newData.tmi_3) ;
                    tercero = Math.round(tercero * 100) / 100; // Redondear a 2 decimales
                }
                $('#tercero').text(tercero);


               

             
                

                
            }
           
                });
                    
    }
    
        $(document).ready(function() {
            // Llama a la función de actualización una vez al cargar la página
            actualizarGraficos();

            // Llama a la función de actualización cada 5 minutos
            setInterval(actualizarGraficos, 300000);
        });   
    </script>

@stop


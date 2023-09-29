@extends('adminlte::page')

@section('title', 'Resultados')

@section('content_header')



    <h1 style="text-align: center">Control de asistencia</h1>
@stop

@section('content')
<div class="card">
    <div class="row">
        <div class="col-sm-4 col-xs-12">
            <div class="row">
                <div class="info-box">
                    <span class="info-box-icon bg-success"><i class="far fa-smile"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-number">{{$ttpv}} Testigos en mesa</span>
                        <span class="info-box-number">{{$trpv}} Remanentes en el puesto</span>
                        <div class="progress">
                            <div class="progress-bar bg-success" style="width: {{ round(($ttpv/$ttv)*100,1)}}%"></div>
                        </div>
                        <span class="progress-description">{{ round(($ttpv/$ttv)*100,1)}}%</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="info-box">
                    <span class="info-box-icon bg-danger"><i class="far fa-sad-tear"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text"></span>
                        <span class="info-box-number">{{$ttv-$ttpv}} Testigos ausentes</span>
                        <div class="progress">
                            <div class="progress-bar bg-danger" style="width: {{100 - round(($ttpv/$ttv)*100,1)}}%"></div>
                        </div>
                        <span class="progress-description">{{100 - round(($ttpv/$ttv)*100,1)}}%</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-8 col-xs-12">
            <div class="text-center card card-success">
                <div class="card-header">
                    <h3 class="card-title">Testigos Presentes por zona en villavicencio</h3>
                    <div class="card-tools">
                        <!-- Buttons, labels, and many other things can be placed here! -->
                        <!-- Here is a label for example -->
                    </div>
                </div>
                <div class="card-body">
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
        <div class="col-sm-4 col-xs-12">
            <div class="row">
                <div class="info-box">
                    <span class="info-box-icon bg-success"><i class="far fa-smile"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-number">{{$ttpm}} Testigos en mesa</span>
                        <span class="info-box-number">{{$trpm}} Remanentes en el puesto</span>
                        <div class="progress">
                            <div class="progress-bar bg-success" style= "width:  @if ($ttm == 0) 0% @else  {{ round(($ttpm/$ttm)*100,1)}}% @endif "></div>
                        </div>
                        @if ($ttm == 0) 0% @else  <span class="progress-description"> {{ round(($ttpm/$ttm)*100,1)}}%</span>@endif 
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="info-box">
                    <span class="info-box-icon bg-danger"><i class="far fa-sad-tear"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text"></span>
                        <span class="info-box-number">{{$ttm-$ttpm}} Testigos ausentes</span>
                        <div class="progress">
                            <div class="progress-bar bg-danger" style="width: @if ($ttm == 0) 0% @else  {{ 100 - round(($ttpm/$ttm)*100,1)}}% @endif  "></div>
                        </div>
                        @if ($ttm == 0) 0% @else  <span class="progress-description"> {{ 100 - round(($ttpm/$ttm)*100,1)}}%</span>@endif
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-8 col-xs-12">
            <div class="text-center card card-info">
                <div class="card-header">
                    <h3 class="card-title">Testigos presentes por municipios</h3>
                    <div class="card-tools">
                        <!-- Buttons, labels, and many other things can be placed here! -->
                        <!-- Here is a label for example -->
                    </div>
                </div>
                <div class="card-body">
                    <div class="chart">
                        <div class="chartjs-size-monitor">
                            <canvas id="municipios" width="400" height="150" aria-label="" role="img"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            @if (Auth::user()->role == 1 or Auth::user()->role == 4)
                <div class="container">
                    <table id="puesto" class="table display nowrap table-bordered long-text" style="width:100%; font-size: 13px;">
                        <thead class="text-white" style="background-color: hsl(220, 87%, 54%)">
                            <tr>
                                <th>Municipio</th>
                                <th>Puesto</th>
                                <th>Mesas</th>
                                <th>Testigo ok</th>
                                <th>% testigo ok</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($asistenciam as $asistenciam)
                                <tr>
                                    <td>{{$asistenciam->municipio}}</td>
                                    <td>{{$asistenciam->puesto}}</td>
                                    <td>{{$asistenciam->total_testigo}}</td>
                                    <td>{{$asistenciam->testigo_ok}}</td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-striped bg-success"
                                                role="progressbar"
                                                style="width: @if($asistenciam->total_testigo == 0)0%@else{{($asistenciam->testigo_ok/$asistenciam->total_testigo)*100}}%@endif"
                                                aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                                @if($asistenciam->total_testigo == 0)0%@else{{round(($asistenciam->testigo_ok/$asistenciam->total_testigo)*100,1)}}%@endif
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
            @endif
        </div>
    </div>
   
</div>



@stop

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/searchpanes/2.2.0/css/searchPanes.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/select/1.7.0/css/select.dataTables.min.css">


@endsection

@section('js')
<script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>
<script> console.log('de tu mano señor!'); </script>

<script src="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/searchpanes/2.2.0/js/dataTables.searchPanes.min.js"></script>
<script src="https://cdn.datatables.net/select/1.7.0/js/dataTables.select.min.js"></script>

   
<script src="https://cdn.datatables.net/buttons/2.3.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.print.min.js"></script>
    <script>
 $(document).ready(function () {
        $('#puesto').DataTable({
 
        
              
             searchPanes: {
                 layout: 'columns-8',
                 initCollapsed: true
             },
             "pageLength": 25,
             //"responsive": true,
             
             "columnDefs": [
                 {searchPanes: {show: false}},
                 
                //  { target: 0, visible: false},
             
 
             ],
             "dom":'Pfrtip' ,
             "scrollX": true,
             "buttons": [
                 {
                 "extend": 'excelHtml5',
                 "title": 'Alertas_preconteo_xls'
                  },
                  
             ],
             "language": { // Traducción al español
              "searchPanes": {
                 "title": {
                     _: 'Filtros Aplicados - %d',
                     0: 'Sin filtros',
                     1: 'Un Filtro Aplicado'
                         }
                         // Agrega más traducciones aquí según tus necesidades
                  }
             },
             
 
             }
             );
         });
 
        

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
                    label: 'En mesa',
                    backgroundColor: 'green',
                    data: [
                       

                    ]
                }, {
                    label: 'Sin testigo',
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
        
        $(document).ready(function() {
            // Llama a la función de actualización una vez al cargar la página
            actualizarGraficos();

            // Llama a la función de actualización cada 5 minutos
            setInterval(actualizarGraficos, 300000);
        });
    </script>
@stop


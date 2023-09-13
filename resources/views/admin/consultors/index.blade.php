@extends('adminlte::page')

@section('title', 'Indicadores')

@section('content_header')



    <h1 style="text-align: center">Métricas</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-sm-4 col-xs-12">
            <div class="info-box bg-gradient-warning">
                <div class="info-box-content">

                    <span class="info-box-text">Colegios en Departamento</span>
                    <span class="info-box-number">{{$puestosd}}</span>
                                           
                </div>
                   
    
            </div>
        </div>
        <div class="col-sm-4 col-xs-12">
            <div class="info-box bg-gradient-warning">
                <div class="info-box-content">

                    <span class="info-box-text">Colegios en Villacicencio</span>
                    <span class="info-box-number">{{$puestosv}}</span>
                                           
                </div>
                   
    
            </div>
        </div>
        <div class="col-sm-4 col-xs-12">
            <div class="info-box bg-gradient-warning">
                <div class="info-box-content">

                    <span class="info-box-text">Colegios en Municipios</span>
                    <span class="info-box-number">{{$puestosm}}</span>
                                           
                </div>
                   
    
            </div>
        </div>
       
    </div>
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
                    <span id="avancedepartamental"></span>         
                   
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
                   <span id="avancevillao"></span>
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
                    <span id="avancemunicipal"></span>
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
   
    @if (Auth::user()->role == 1 or Auth::user()->role == 4 )
        <div class="card">
            <div class="text-center card-header">
                <h5>Avance por puesto</h5>
            </div>
            <div class="card-body">
                <table id="example" class="table display nowrap table-bordered long-text" style="width:100%; font-size: 10px;" width ="100%">
                    <thead class="text-white" style="background-color: hsl(209, 36%, 54%)">
                            <tr>
                            <th>Codpuesto</th>
                            <th>Municipio</th>                    
                            <th>Puesto</th>
                            <th>Mesas</th>
                            <th>mesa ok</th>
                            <th>% mesa ok</th>
                            <th>Remanentes</th>
                            <th>Rem ok</th>
                            <th>% rem ok</th>
                        </tr>
                    </thead>

                
                    <tbody>
                        @foreach ($mesasok as $mesasok)
                        <tr>
                            <td>{{$mesasok->codcor}}</td>                          
                            <td>{{$mesasok->municipio}}</td>    
                            <td>{{$mesasok->puesto}}</td> 
                            <td>{{$mesasok->mesas}}</td> 
                            <td>{{$mesasok->mesas_ok}}</td>  
                            <td> <div class="progress">
                                    <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: @if($mesasok->mesas == 0)0%@else{{($mesasok->mesas_ok/$mesasok->mesas)*100}}%@endif" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">@if($mesasok->mesas == 0)0%@else{{($mesasok->mesas_ok/$mesasok->mesas)*100}}%@endif%</div>
                                </div>
                            </td>   
                            <td>{{$mesasok->rem}}</td>   
                            <td>{{$mesasok->rem_ok}}</td>   
                            <td> <div class="progress">
                                    <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: @if($mesasok->rem == 0)0%@else{{($mesasok->rem_ok/$mesasok->rem)*100}}%@endif" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">@if($mesasok->rem == 0)0%@else{{($mesasok->rem_ok/$mesasok->rem)*100}}%@endif</div>
                                </div>
                            </td>   
                        </tr>
                        @endforeach


                    </tbody>
                
                </table>
            </div>
            
        </div>
    @else
        
    @endif
    

    {{-- <div class="row">
        <div class="col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-info"><i class="far fa-bookmark"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text" ><h5>Villavicencio</h5></span>
                  <span class="info-box-text" >Validación Ani y contacto</span>
                  <span class="info-box-number"> {{$okaniv}} </span>
                  <div class="progress">
                    <div class="progress-bar bg-info" style="width: {{($okaniv/($okaniv+$nookaniv))}}% "></div>
                  </div>
                  <span class="progress-description">
                    <p>{{  round(($okaniv/($okaniv+$nookaniv)),2)}}% Avance total</p>
                  </span>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-info"><i class="far fa-bookmark"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text" ><h5>Municipios</h5></span>
                  <span class="info-box-text" >Validación Ani y contacto</span>
                  <span class="info-box-number"> {{$okanim}} </span>
                  <div class="progress">
                    <div class="progress-bar bg-info" style="width: {{($okanim/($okanim+$nookanim))}}% "></div>
                  </div>
                  <span class="progress-description">
                    <p>{{  round(($okanim/($okanim+$nookanim)),2)}}% Avance total</p>
                  </span>
                </div>
            </div>
        </div>
    </div> --}}

    <div class="row">
        <div  class="col-sm-12 col-xs-12 ">
            <div class="card card-success">
                <div class="card-header">
                <h3   class="card-title">Avance villavicencio por zonas</h3>
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
                            <canvas id="municipios" width="400" height="150" aria-label="" role="img"></canvas>
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
        $('#example').DataTable({
 
        
              
             searchPanes: {
                 layout: 'columns-4',
                 initCollapsed: true
             },
             "pageLength": 25,
             //"responsive": true,
             
             "columnDefs": [
                 {searchPanes: {show: false}},
                 
                //  { target: 0, visible: false},
             
 
             ],
             "dom":'frtip' ,
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
                }, {
                    label: 'Pendientes',
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
            Chart.defaults.font.size = 11;
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
            const ctx = document.getElementById('goodCanvas1').getContext('2d');
            const goodCanvas1 = new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: ['Pendientes', 'Acreditados'],
                    datasets: [{
                        label: '# of Votes',
                        data: [],
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
            const goodCanvas2 = new Chart(ctxa, {
                type: 'doughnut',
                data: {
                    labels: ['Pendientes', 'Acreditados'],
                    datasets: [{
                        label: '# de testigos',
                        data: [],
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
            const vill = new Chart(ctx2, {
                type: 'doughnut',
                data: {
                    labels: ['Pendientes', 'Acreditados'],
                    datasets: [{
                        label: '# of Votes',
                        data: [],
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

    
        </script>
        <script>
        function actualizarGraficos() {
            $.ajax({
                url: "{{ route('getData') }}",
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
                    newData.dat.forEach(function(item) {
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

                    goodCanvas1.data.datasets[0].data = [newData.nookd, newData.okd];
                    goodCanvas1.update();
                    goodCanvas2.data.datasets[0].data = [newData.nookv, newData.okv];
                    goodCanvas2.update();
                    vill.data.datasets[0].data = [newData.nookm, newData.okm];
                    vill.update();
                    
                

                    var departamental = 0;
                    if (newData.okd + newData.nookd != 0) {
                        departamental = (newData.okd / (newData.okd + newData.nookd)) * 100;
                        departamental = Math.round(departamental * 100) / 100; // Redondear a 2 decimales
                    }
                    $('#avancedepartamental').text(departamental);

                    var municipal = 0;
                    if (newData.okd + newData.nookd != 0) {
                        municipal = (newData.okm / (newData.okm + newData.nookm)) * 100;
                        municipal = Math.round(municipal * 100) / 100; // Redondear a 2 decimales
                    }
                    $('#avancemunicipal').text(municipal);

                    var villao = 0;
                    if (newData.okd + newData.nookd != 0) {
                        villao = (newData.okv / (newData.okv + newData.nookv)) * 100;
                        villao = Math.round(villao * 100) / 100; // Redondear a 2 decimales
                    }
                    $('#avancevillao').text(villao);
                

                    
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

   


@endsection

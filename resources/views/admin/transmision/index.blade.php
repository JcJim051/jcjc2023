@extends('adminlte::page')

@section('title', 'Resultados')

@section('content_header')



    <h1 style="text-align: center">Avance de transmision</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-sm-4 col-xs-12">
            <div class="row">
                <div class="info-box ">
                    <span class="info-box-icon bg-warning bg-success"><i class="far fa-flag"></i></span>
                    <div class="info-box-content">
                        
                        <span class="info-box-number" id="promedio_votos"> {{round ($tmi/$tm *100,1)}} % de mesas informadas</span>
                    </div>
                </div>
            </div>
            <div class="row">
                
                    <div class="info-box ">
                        <span class="info-box-icon bg-warning bg-success"><i class="far fa-flag"></i></span>
                        <div class="info-box-content">
                           
                            <span class="info-box-number" id="mesas_reclamacion"> Mesas con Reclamacion {{$recl}} </span>
                        </div>
                    </div>       
                
            </div>
            <div class="row">
                
                <div class="info-box ">
                    <span class="info-box-icon bg-warning bg-success"><i class="far fa-flag"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Reclamacion con foto: {{$trf}}</span>
                        <span class="info-box-number" id="mesas_reclamacion"> {{ round($trf/$recl *100,1) }}% </span>
                    </div>
                </div>       
            
        </div>
        

        </div>        
        <div class="col-sm-8 col-xs-12">
            <div class="text-center card card-outline card-warning">
                <div class="card-header">
                    <h3 class="card-title" >Municipios Zonificados</h3>
                </div>
                 
                <div class="card-body">        
                    @if (Auth::user()->role == 1 or Auth::user()->role == 4 )
                    
                            <table id="pareto" class="table display nowrap table-bordered long-text" style="width:100%; font-size: 13px;" width ="100%">
                                <thead class="text-white" style="background-color: hsl(220, 87%, 54%)">
                                        <tr>
                                    
                                        <th>Municipio</th>                    
                                        <th>Mesas</th>
                                        <th>Datos ok</th>
                                        <th>% mesa ok</th>
                                        <th>Fotos ok</th>
                                        <th>% Fotos ok</th>
        
                                        
                                    </tr>
                                </thead>
            
                            
                                <tbody>
                                    @foreach ($avance_pareto as $avance_pareto)
                                    <tr>
                                        <td>{{$avance_pareto->municipio}}</td>                          
                                        <td>{{$avance_pareto->total_mesas}}</td>                          
                                        <td>{{$avance_pareto->mesas_ok}}</td>
                                        <td> 
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: @if($avance_pareto->total_mesas == 0)0%@else{{($avance_pareto->mesas_ok/$avance_pareto->total_mesas)*100}}%@endif" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">@if($avance_pareto->total_mesas == 0)0%@else{{round(($avance_pareto->mesas_ok/$avance_pareto->total_mesas)*100,1)}}%@endif</div>
                                            </div>
                                        </td>  
                                        <td>{{$avance_pareto->fotos_ok}}</td> 
                                        <td> 
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: @if($avance_pareto->total_mesas == 0)0%@else{{($avance_pareto->fotos_ok/$avance_pareto->total_mesas)*100}}%@endif" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">@if($avance_pareto->total_mesas == 0)0%@else{{round(($avance_pareto->fotos_ok/$avance_pareto->total_mesas)*100,1)}}%@endif</div>
                                            </div>
                                        </td>                           
                                    
                                    </tr>
                                    @endforeach
            
            
                                </tbody>
                            
                            </table>
                    
                    @else
                        
                    @endif
                </div>    
        
            </div>
        </div>
        
    </div>

   

    <div class="row">
        <div class="col-sm-6 col-xs-12">
           
        </div>
        
    </div>


    
    <div class="row">
        <div class="col-sm-6 col-xs-12">
            <div class="text-center card card-outline card-warning">
                <div class="card-header">
                    <h3 class="card-title" >Municipios</h3>
                </div>
                @if (Auth::user()->role == 1 or Auth::user()->role == 4 )
                
                <div class="card-body">
                    <table id="example" class="table display nowrap table-bordered long-text" style="width:100%; font-size: 10px;" width ="100%">
                        <thead class="text-white" style="background-color: hsl(220, 87%, 54%)">
                                <tr>
                            
                                <th>Municipio</th>                    
                                <th>Mesas</th>
                                <th>Datos ok</th>
                                <th>% mesa ok</th>
                                <th>Fotos ok</th>
                                <th>% Fotos ok</th>

                                
                            </tr>
                        </thead>
    
                    
                        <tbody>
                            @foreach ($avance_mun as $avance_mun)
                            <tr>
                                <td>{{$avance_mun->municipio}}</td>                          
                                <td>{{$avance_mun->total_mesas}}</td>                          
                                <td>{{$avance_mun->mesas_ok}}</td>
                                <td> 
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: @if($avance_mun->total_mesas == 0)0%@else{{($avance_mun->mesas_ok/$avance_mun->total_mesas)*100}}%@endif" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">@if($avance_mun->total_mesas == 0)0%@else{{round(($avance_mun->mesas_ok/$avance_mun->total_mesas)*100,1)}}%@endif</div>
                                    </div>
                                </td>  
                                <td>{{$avance_mun->fotos_ok}}</td> 
                                <td> 
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: @if($avance_mun->total_mesas == 0)0%@else{{($avance_mun->fotos_ok/$avance_mun->total_mesas)*100}}%@endif" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">@if($avance_mun->total_mesas == 0)0%@else{{round(($avance_mun->fotos_ok/$avance_mun->total_mesas)*100,1)}}%@endif</div>
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
        <div class="col-sm-6 col-xs-12">
            <div class="text-center card card-outline card-warning">
                <div class="card-header">
                    <h3 class="card-title" >Zonas Villavicencio</h3>
                </div>
                @if (Auth::user()->role == 1 or Auth::user()->role == 4 )
               
                    <div class="card-body">
                        <table id="example1" class="table display nowrap table-bordered long-text" style="width:100%; font-size: 10px;" width ="100%">
                            <thead class="text-white" style="background-color: hsl(220, 87%, 54%)">
                                    <tr>
                                
                                    <th>Zona</th>                    
                                    <th>Mesas</th>
                                    <th>Datos ok</th>
                                    <th>% mesa ok</th>
                                    <th>Fotos ok</th>
                                    <th>% Fotos ok</th>

                                    
                                </tr>
                            </thead>
        
                        
                            <tbody>
                                @foreach ($avance_zonas as $avance_zonas)
                                <tr>
                                    <td>Zona {{$avance_zonas->codescru}}</td>                          
                                    <td>{{$avance_zonas->total_mesas}}</td>                          
                                    <td>{{$avance_zonas->mesas_ok}}</td>
                                    <td> 
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: @if($avance_zonas->total_mesas == 0)0%@else{{($avance_zonas->mesas_ok/$avance_zonas->total_mesas)*100}}%@endif" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">@if($avance_zonas->total_mesas == 0)0%@else{{round(($avance_zonas->mesas_ok/$avance_zonas->total_mesas)*100,1)}}%@endif</div>
                                        </div>
                                    </td>  
                                    <td>{{$avance_zonas->fotos_ok}}</td> 
                                    <td> 
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: @if($avance_zonas->total_mesas == 0)0%@else{{($avance_zonas->fotos_ok/$avance_zonas->total_mesas)*100}}%@endif" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">@if($avance_zonas->total_mesas == 0)0%@else{{round(($avance_zonas->fotos_ok/$avance_zonas->total_mesas)*100,1)}}%@endif</div>
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
        $('#example1').DataTable({
 
        
              
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

         $(document).ready(function () {
        $('#pareto').DataTable({
 
        
              
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
             "dom":'rt' ,
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
 

       
    </script>

{{-- <script>
    function actualizarGraficos() {
        $.ajax({
            url: "{{ route('getTransmision') }}",
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
        $(document).ready(function() {
            // Llama a la función de actualización una vez al cargar la página
            actualizarGraficos();

            // Llama a la función de actualización cada 5 minutos
            setInterval(actualizarGraficos, 300000);
        });    

</script> --}}
@stop


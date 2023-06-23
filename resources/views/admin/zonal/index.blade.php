@extends('adminlte::page')

@section('title', 'Reportar')

@section('content_header')
    <h1 style="text-align: center">Alertas de valanceo Pre-Conteo</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{(session('info'))}}</strong>
        </div>
    @endif
   
    <div class="row">
        <div class="col-sm-6 col-xs-12">
            <div class="text-center card card-success">
                <div class="card-header">
                    <h3 class="card-title">Promedio de votos por mesa</h3>
                    
                        <div class="card-tools">
                    </div>
                <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body " >
                    <div class="chart">
                        <div class="chartjs-size-monitor">
                            <span class="info-box-number"> @if ($tmi == 0)
                                Sin reporte
                            @else
                            
                                {{round($tv1/$tmi)}} votos por mesa
                            
                            @endif </span>

                        </div>
                    </div>

                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  
                        {{-- 0% de mesas Informadas
                   --}}


                </div>
                <!-- /.card-footer -->
            </div>
        </div> 
        <div class="col-sm-6 col-xs-12">
            <div class="text-center card card-success">
                <div class="card-header">
                    <h3 class="card-title">Desviación estandar</h3>
                    
                        <div class="card-tools">
                    </div>
                <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body " >
                    <div class="chart">
                        <div class="chartjs-size-monitor">

                            <span class="info-box-number"> @if ($desviacion_estandar == 0)
                                Sin reporte
                            @else
                            
                                {{round($desviacion_estandar, 3)}}
                            
                            @endif </span>

                        
                           
                        </div>
                    </div>

                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  
                        {{-- 0% de mesas Informadas
                   --}}


                </div>
                <!-- /.card-footer -->
            </div>
        </div> 
    </div>
   
    <div class="card">
        <div class="card-body">
            <table id="example" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th> id </th>
                        <th> municipio </th>
                        <th> puesto </th>
                        <th> mesa </th>
                        <th> Preconteo </th>
                        <th> E11 - Total </th>
                        {{-- <th> distancia a la media </th> --}}
                        {{-- <th> gob1 </th>
                        <th> gob2 </th>
                        <th> gob3 </th>
                        <th> gob4 </th>
                        <th> gob5 </th>
                        <th> gob6 </th>
                        <th> gob7 </th>
                        <th> nulos </th>
                        <th> En blanco </th>
                        <th> no marcados </th> --}}
                        <th> Banlance </th>
                        
                    </tr>
                </thead>

                <tbody>
                    @foreach ($zonal as $zonal)
                    <tr>
                        <td> {{ $zonal->id }}</td>
                        <td> {{ $zonal->municipio }}</td>
                        <td> {{ $zonal->puesto }}</td>
                        <td> {{ $zonal->mesa }}</td>
                        <td> {{ $zonal->gob1 }}</td>
                        <td>@if ($zonal->censodemesa - $zonal->votosenurna == 0 )
                            <div class="btn btn-success">0</div>
                        @else
                        @if ($zonal->censodemesa - $zonal->votosenurna < 0 )
                        <div class="btn btn-danger">{{ $zonal->censodemesa - $zonal->votosenurna }}</div>
                    @else
                        <a class="btn btn-warning btn-smclass=">{{ $zonal->censodemesa - $zonal->votosenurna }}</div>
                    @endif 
                        @endif  
                            
                            
                            </td>
                        {{-- <td> {{ ($zonal->gob1 - ($tv1/$tmi)) }}</td> --}}
                        {{-- 
                        <td> {{ $zonal->gob2 }}</td>
                        <td> {{ $zonal->gob3 }}</td>
                        <td> {{ $zonal->gob4 }}</td>
                        <td> {{ $zonal->gob5 }}</td>
                        <td> {{ $zonal->gob6 }}</td>
                        <td> {{ $zonal->gob7 }}</td>
                        <td> {{ $zonal->nulos }}</td>
                        <td> {{ $zonal->enblaco }}</td>
                        <td> {{ $zonal->nomarcados }}</td> --}}
                        <td> @if ($zonal->gob1+$zonal->gob2+$zonal->gob3+$zonal->gob4+$zonal->gob5+$zonal->gob6+$zonal->gob7+$zonal->nulos+$zonal->enblanco+$zonal->nomarcados == $zonal->votosenurna )
                            <div class="btn btn-success">Balanceada</div>
                        @else
                            <a href="{{route("admin.zonal.edit", $zonal)}}" class="btn btn-danger btn-smclass=">Desbalanceada</div>
                        @endif 
                            
                            </td>
                        
                    </tr>
                    @endforeach

                </tbody>


            </table>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.dataTables.min.css">
@endsection



@section('js')
    <script> console.log('de tu mano señor!'); </script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.print.min.js"></script>
    <script>$(document).ready(function () {
       $('#example').DataTable({
            "pageLength": 25,
            "columnDefs": [

            

            ],
            "dom": 'Bfrtip',
            "buttons": [
                {
                "extend": 'excelHtml5',
                "title": 'testigos_acreditados_xls'
                 },
                 {
                "extend": 'pdfHtml5',
                "title": 'testigos_acreditados_pdf',
                "download": 'open'
                 }
            ]

            }
            );
        })
    </SCript>
@endsection







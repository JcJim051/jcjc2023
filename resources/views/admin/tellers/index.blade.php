@extends('adminlte::page')

@section('title', 'Reportar')

@section('content_header')
    <h1 style="text-align: center">Reportes E14</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{(session('info'))}}</strong>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <table id="example" class="display responsive nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Municipio</th>
                        <th>Puesto</th>
                        <th>Mesa</th>
                        <th>Rafaela Cortes</th>
                        {{-- <th>Felipe</th> --}}
                        <th>Comisión</th>
                        <th>Codpuesto</th>
                        <th>Reporte</th>
                        @if (Auth::user()->role == 4)

                        @else
                        <th></th>
                        <th></th>
                        
                        @endif
                    </tr>
                </thead>

                <tbody>
                    @foreach ($sellers as $seller)
                    <tr>
                        <td>{{ $seller->id }}</td>
                        <td>{{ $seller->municipio }}</td>

                        @if ($seller->gob1 <> null)
                        <td style="color: rgb(0, 169, 14)" >{{$seller->puesto}}</td>
                        @else
                            <td style="color: red" >{{$seller->puesto}}</td>

                        @endif


                            @if ($seller->gob1 <> null)
                                <td style="color: rgb(0, 169, 14)" >{{$seller->mesa}}</td>
                            @else
                                <td style="color: red" >{{$seller->mesa}}</td>

                            @endif
                        {{--  <td>{{$seller->cedula}}</td>  --}}
                        <td>{{$seller->gob1}}</td>
                        <td>{{$seller->codescru}}</td>
                        <th>{{$seller->codmun}}{{$seller->codzon}}{{$seller->codpuesto}}</th>
                        <td style="font-size: 20px ; text-align:center">
                                @if($seller->gob1 <> null)
                                    <i style="color: rgb(22, 161, 22)" class="fas fa-bullhorn"><P hidden>Reportado</P></i>
                                @else
                                    <i style="color: rgb(235, 62, 10) " class="fas fa-ban"><P hidden>Sin reporte</P></i>
                                @endif

                        </td>
                        @if (Auth::user()->role == 4)

                        @else
                        <td> <a href="{{route("admin.tellers.edit", $seller)}}" class="btn btn-primary btn-sm">Reportar</a></td>
                        <td> <a href="{{route("admin.tellers.show", $seller)}}" class="btn btn-primary btn-sm">Enviar E14</a></td>
                        
                        @endif




                    </tr>
                    @endforeach

                </tbody>

               
            </table>
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
    <script> console.log('de tu mano señor!'); </script>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
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
                layout: 'columns-6',
                initCollapsed: true
            },
            "pageLength": 25,
            "responsive": true,
            "columnDefs": [
                
                {searchPanes: {show: false},targets: [4]},
                
                { responsivePriority: 10002, targets: 0 },
                { responsivePriority: 2, targets: 2 },
                { responsivePriority: 1, targets: 3 },
                { target: 5, visible: false},
                { target: 6, visible: false},
            

            ],
            "dom":'BPrtip' ,
            
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
    
    
       
    </SCript>
@endsection







@section('plugins.Datatables', true)
@extends('adminlte::page')

@section('title', 'Acreditar')

@section('content_header')
    {{--  <a href="{{route('admin.superusers.create')}}" class="float-right btn btn-secondary btn-sm">Agregar vendedor</a>  --}}
    <h1 style="text-align:center">Acreditacion de testigos electorales.</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{(session('info'))}}</strong>
        </div>
    @endif
    

    <div class="card">
        <div class="card-body">
            <table id="example" class="table display nowrap table-bordered long-text" style="width:100%; font-size: 10px;" width ="100%">
                <thead class="text-white" style="background-color: hsl(209, 36%, 54%)">
                <tr>
                    <th>#</th>
                    <th>Codpuesto</th>
                    @if (Auth::user()->role == 3)
                        
                    @else
                        <th>Municipio</th>
                    @endif
                    <th>clase</th>
                    
                    <th>Puesto</th>
                    <th>Mesa</th>
                    <th>Nombre</th>
                
                    
                    <th>Status</th>
                    <th></th>

                    </tr>
                </thead>

                <tbody>
                    @foreach ($sellers as $seller)
                    <tr>
                        
                        <td>{{ $seller->id }}</td>
                            @if ($seller->status <> 0)
                                <td style="color: rgb(0, 169, 14)" >{{$seller->coddep}}{{$seller->codmun}}{{$seller->codzon}}{{$seller->codpuesto}}</td>
                            @else
                                <td style="color: red" >{{$seller->coddep}}{{$seller->codmun}}{{$seller->codzon}}{{$seller->codpuesto}}</td>
                            @endif
                        
                            @if (Auth::user()->role == 3)
                            
                            @else
                                @if ($seller->status <> 0)
                                    <td style="color: rgb(0, 169, 14)" >{{ $seller->municipio }}</td>
                                @else
                                    <td style="color: red" >{{ $seller->municipio }}</td>
                                @endif                    
                            @endif
                        
                            @if ($seller->codzon == 99)
                                @if ($seller->status <> 0)
                                    <td style="color: rgb(0, 169, 14)" >Rural</td>
                                @else
                                    <td style="color: red" >Rural</td>
                                @endif                         
                            @else
                                @if ($seller->status <> 0)
                                    <td style="color: rgb(0, 169, 14)" >Urbano</td>
                                @else
                                    <td style="color: red" >Urbano</td>
                                @endif     
                            @endif
                        
                    
                            @if ($seller->status <> 0)
                                <td style="color: rgb(0, 169, 14)" >{{$seller->puesto}}</td>
                            @else
                                <td style="color: red" >{{$seller->puesto}}</td>
                            @endif


                            @if ($seller->status <> 0)
                            <td style="color: rgb(0, 169, 14)" >{{$seller->mesa}}</td>
                            @else
                                <td style="color: red" >{{$seller->mesa}}</td>
                            @endif
                        {{--  <td>{{$seller->cedula}}</td>  --}}
                            @if ($seller->status <> 0)
                                <td style="color: rgb(0, 169, 14)" >{{$seller->nombre}}</td>
                            @else
                                <td style="color: red" >{{$seller->nombre}}</td>
                            @endif    
                            
                        
                    
                        <td style="font-size: 20px ; text-align:center">
                            @if($seller->status == 1)
                                <i style="color: rgb(22, 161, 22)" class="fas fa-vote-yea"><p hidden>listo</p></i>
                            @else
                                <i style="color: rgb(235, 62, 10) " class="fas fa-window-close"><p hidden>Pendiente</p></i>
                            @endif

                        </td>
                        @if ($seller->statusani == 1)
                            <td><a href="#" class="btn btn-secondary btn-sm">Validado</a></td>
                        @else
                            @if (Auth::user()->role == 4)
                                <td> <a href="{{route("admin.superusers.edit", $seller)}}" class="btn btn-primary btn-sm">Ver</a></td>
                            @else
                                <td> <a href="{{route("admin.superusers.edit", $seller)}}" class="btn btn-primary btn-sm">Acreditar</a></td>
                            @endif
                            
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
                layout: 'columns-8',
                initCollapsed: true
            },
            "pageLength": 25,
            
            "columnDefs": [
                {searchPanes: {show: true},targets: []},
                { target: 0, visible: false},
              

            ],
           
            "dom":'Prtip' ,
            
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
                 },
               
            },
            

            }
            );
        });






  
</script>
@endsection







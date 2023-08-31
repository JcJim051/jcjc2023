@extends('adminlte::page')

@section('title', 'Reportar')

@section('content_header')
    <h4 style="text-align: center">Reporte de E14</h4>
    <style>
        .long-text {
            white-space: nowrap;
        }
    </style>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{(session('info'))}}</strong>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <table id="example" class="table display n+owrap table-bordered" style="width:100%; font-size: 13px;">
                <thead class="text-white" style="background-color: hsl(209, 21%, 40%)">
                    <tr>
                        <th>id</th>
                        <th>Municipio</th>
                        <th>Puesto</th>
                        <th>Mesa</th>
                        <th>Datos</th>
                        {{-- <th>Can2</th>
                        <th>Can3</th>
                        <th>Can4</th>
                        <th>Can5</th>
                        <th>Can6</th>
                        <th>Can7</th>
                        <th>Can8</th>
                        <th>Can9</th>
                        <th>Can10</th>
                        <th>Can11</th> --}}
                        {{-- <th>Felipe</th> --}}
                        
                        <th>Foto1</th><th>Foto2</th>
                        {{-- <th>Foto2</th> --}}
                        <th>Recl</th>

                        @if (Auth::user()->role == 4)

                        @else
                        <th></th>
                        <th></th>
                        
                        
                        @endif
                    </tr>
                </thead>

                <tbody class="long-text" >
                    @foreach ($sellers as $seller)
                    <tr>
                        <td>{{$seller->id}}</td>
                        @if ($seller->reclamacion == 1) 
                            @if ($seller->gob1 <> null && $seller->e14 <> null  && $seller->fotorec)
                            
                            <td style="color: rgb(0, 169, 14)" >{{$seller->municipio}}</td>
                            @else
                                <td style="color: red" >{{$seller->municipio}}</td>
                            @endif                            
                        @else
                            @if ($seller->gob1 <> null && $seller->e14 <> null)
                            
                            <td style="color: rgb(0, 169, 14)" >{{$seller->municipio}}</td>
                            @else
                                <td style="color: red" >{{$seller->municipio}}</td>
                            @endif
                        @endif


                        @if ($seller->reclamacion == 1) 
                            @if ($seller->gob1 <> null && $seller->e14 <> null  && $seller->fotorec)
                            
                            <td style="color: rgb(0, 169, 14)" >{{$seller->puesto}}</td>
                            @else
                                <td style="color: red" >{{$seller->puesto}}</td>
                            @endif                            
                        @else
                            @if ($seller->gob1 <> null && $seller->e14 <> null)
                            
                            <td style="color: rgb(0, 169, 14)" >{{$seller->puesto}}</td>
                            @else
                                <td style="color: red" >{{$seller->puesto}}</td>
                            @endif
                        @endif
                        

                        @if ($seller->reclamacion == 1) 
                            @if ($seller->gob1 <> null && $seller->e14 <> null  && $seller->fotorec)
                            
                            <td style="color: rgb(0, 169, 14)" >{{$seller->mesa}}</td>
                            @else
                                <td style="color: red" >{{$seller->mesa}}</td>
                            @endif                            
                        @else
                            @if ($seller->gob1 <> null && $seller->e14 <> null)
                            
                            <td style="color: rgb(0, 169, 14)" >{{$seller->mesa}}</td>
                            @else
                                <td style="color: red" >{{$seller->mesa}}</td>
                            @endif
                        @endif

                        <td>
                            @if ($seller->gob1 <> null) 
                                <span style="color: green"><i class="fas fa-check-circle"></i> si</i></span>                    
                            @else
                                <span style="color: red"><i class="fas fa-times-circle"></i> no</span>
                            @endif
                        </td>
                        
                                             
                        <td style="font-size: 10px ; text-align:center">
                            @if($seller->e14 <> null)
                                <i style="color: rgb(22, 161, 22)" class="fas fa-bullhorn"><P hidden>Foto</P></i>
                            @else
                                <i style="color: rgb(235, 62, 10)" class="fas fa-ban"><P hidden>Sin Foto</P></i>
                            @endif
                        </td>
                        <td style="font-size: 10px ; text-align:center">
                            @if($seller->e14_2 <> null)
                                <i style="color: rgb(22, 161, 22)" class="fas fa-bullhorn"><P hidden>Foto</P></i>
                            @else
                                <i style="color: rgb(235, 62, 10)" class="fas fa-ban"><P hidden>Sin Foto</P></i>
                            @endif
                        </td>
                        <td style="font-size: 10px ; text-align:center">
                            @if($seller->fotorec <> null)
                                <i style="color: rgb(22, 161, 22)" class="fas fa-bullhorn"><P hidden>Foto</P></i>
                            @else
                                <i style="color: rgb(235, 62, 10)" class="fas fa-ban"><P hidden>Sin Foto</P></i>
                            @endif
                        </td>
                        @if (Auth::user()->role == 4)

                        @else
                        <td> <a href="{{route("admin.tellers.edit", $seller)}}" class="btn btn-primary btn-sm" style="font-size: 11px;">Reportar</a></td>
                        <td> <a href="{{route("admin.tellers.show", $seller)}}" class="btn btn-primary btn-sm long-text" style="font-size: 11px;">Fotos</a></td>
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
           
          
            "pageLength": 25,
            
           
            "columnDefs": [
                     
                { target: 0, visible: false},        
            ],
            "dom":'frtip' ,
            scrollX: true,
            // scrollY: "55vh",
            scrollCollapse: true,
            responsive: true,
            "buttons": [
                {
                "extend": 'excelHtml5',
                "title": 'Alertas_preconteo_xls'
                 },
                 
            ],
            "language": { // Traducción al español
            //
            },
            

            }
            );
        });
    
    
       
    </script>
@endsection







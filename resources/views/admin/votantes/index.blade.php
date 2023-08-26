@extends('adminlte::page')

@section('title', 'Reportar')

@section('content_header')
    <h1 style="text-align: center">Reportes afluencia</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-warning">
            <strong>{{(session('info'))}}</strong>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <table id="example" class="table display nowrap table-bordered long-text" style="width:100%; font-size: 13px;">
                <thead class="text-white" style="background-color: hsl(209, 36%, 54%)">
                    <tr>
                        
                        <th>Municipio</th>
                        <th>Puesto</th>
                        <th>Mesa</th>
                        <th>9 am</th>
                        <th>11 am</th>
                        <th>2 pm</th>
                        <th>Comisión</th>
                        <th>Codpuesto</th>
                        <th>Reporte</th>
                        @if (Auth::user()->role == 4)
                        @else
                        <th></th>
                        @endif
                    </tr>
                </thead>

                <tbody>
                    @foreach ($sellers as $seller)
                    <tr>
                        @if ($seller->reporte_1 <> null && $seller->reporte_2 <> null && $seller->reporte_3 <> null) 
                            <td style="color: rgb(0, 169, 14)" >{{ $seller->municipio }}</td>
                        @else
                            <td style="color: red" >{{ $seller->municipio }}</td>
                        @endif
                        
                        @if ($seller->reporte_1 <> null && $seller->reporte_2 <> null && $seller->reporte_3 <> null) 
                        <td style="color: rgb(0, 169, 14)" >{{ $seller->puesto }}</td>
                        @else
                            <td style="color: red" >{{ $seller->puesto }}</td>
                        @endif
                        @if ($seller->reporte_1 <> null && $seller->reporte_2 <> null && $seller->reporte_3 <> null) 
                            <td style="color: rgb(0, 169, 14)" >{{ $seller->mesa }}</td>
                        @else
                            <td style="color: red" >{{ $seller->mesa }}</td>
                        @endif
                      
                           
                        {{--  <td>{{$seller->cedula}}</td>  --}}
                        @if ($seller->reporte_1 <> null)
                            <td style="color: rgb(22, 161, 22)">{{$seller->reporte_1}}</td>      
                        @else
                            <td style="color: rgb(235, 62, 10) ">{{$seller->reporte_1}}</td>   
                        @endif
                        @if ($seller->reporte_2 <> null)
                            <td style="color: rgb(22, 161, 22)">{{$seller->reporte_2}}</td>      
                        @else
                            <td style="color: rgb(235, 62, 10) ">{{$seller->reporte_2}}</td>   
                        @endif
                        @if ($seller->reporte_3 <> null)
                            <td style="color: rgb(22, 161, 22)">{{$seller->reporte_3}}</td>      
                        @else
                            <td style="color: rgb(235, 62, 10) ">{{$seller->reporte_3}}</td>   
                        @endif
                        <td>{{$seller->codescru}}</td>
                        <th>{{$seller->codmun}}{{$seller->codzon}}{{$seller->codpuesto}}</th>
                        <td style="font-size: 20px ; text-align:center">
                                @if($seller->reporte_1 <> null && $seller->reporte_2 <> null && $seller->reporte_3 <> null)
                                    <i style="color: rgb(22, 161, 22)" class="fas fa-bullhorn"><P hidden>Reportado</P></i>
                                @else
                                    <i style="color: rgb(235, 62, 10) "class="fas fa-ban"><P hidden>Sin reporte</P></i>
                                @endif

                        </td>
                        @if (Auth::user()->role == 4)

                        @else
                        <td> <a href="{{route("admin.votantes.edit", $seller)}}" class="btn btn-success btn-sm">Reportar</a></td>
                        @endif




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

            { responsivePriority: 10002, targets: 0 },
            { responsivePriority: 2, targets: 2 },
            { responsivePriority: 1, targets: 3 },
            { target: 6, visible: false},
            { target: 7 , visible: false},

            ],
            "dom": 'Bfrtip',
            "responsive": true,
            "buttons": [
                // {
                // "extend": 'excelHtml5',
                // "title": 'testigos_acreditados_xls'
                //  },
                //  {
                // "extend": 'pdfHtml5',
                // "title": 'testigos_acreditados_pdf',
                // "download": 'open'
                //  }
            ]

            }
            );
        })
    </script>
@endsection







@section('plugins.Datatables', true)
@extends('adminlte::page')

@section('title', 'Acreditar')

@section('content_header')
    {{--  <a href="{{route('admin.validacion.create')}}" class="float-right btn btn-secondary btn-sm">Agregar vendedor</a>  --}}
    <h1 style="text-align:center">Testigos para Validación Ani</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{(session('info'))}}</strong>
        </div>
    @endif

    <div class="card">
    <div class="card-body">
        <table  id="example" class="display responsive nowrap" style="width:99%">
            <thead style="tab-size: 10px">
                <tr>
                    <th>#</th>
                    <th>Municipio</th>
                    <th>Puesto</th>
                    <th>Mesa</th>
                    <th>Nombre</th>
                    
                    <th>Comisión</th>
                    <th>Codpuesto</th>
                    <th>observacion</th>
                    <th>status</th>
                    <th></th>
    
                </tr>
            </thead>
    
            <tbody>
                @foreach ($sellers as $seller)
                <tr>
                    <td>{{ $seller->id }}</td>
                    {{-- <td hidden>{{ $seller->cedula }}</td>
                    <td hidden>{{ $seller->email }}</td> --}}
                    <td>{{ $seller->municipio }}</td>
                    @if ($seller->statusani <> 0 or $seller->statusani == null) 
                            <td style="color: rgb(0, 169, 14)" >{{$seller->puesto}}</td>
                        @else
                            <td style="color: red" >{{$seller->puesto}}</td>
                        @endif
    
    
                        @if ($seller->statusani <> 0 or $seller->statusani == null) 
                        <td style="color: rgb(0, 169, 14)" >{{$seller->mesa}}</td>
                        @else
                            <td style="color: red" >{{$seller->mesa}}</td>
                        @endif
                    {{--  <td>{{$seller->cedula}}</td>  --}}
                    <td>{{$seller->nombre}}</td>
                    
                    <th>{{$seller->codescru}}</th>
                    <th>{{$seller->codmun}}{{$seller->codzon}}{{$seller->codpuesto}}</th>
                    <td>{{$seller->observacion}}</td>
                    <td style="font-size: 20px ; text-align:center">
                        @if($seller->statusani == 1)
                            <i style="color: rgb(22, 161, 22)" class="fas fa-vote-yea"><p hidden>listo</p></i>
                        @else
                            <i style="color: rgb(235, 62, 10) " class="fas fa-window-close"><p hidden>Pendiente</p></i>
                        @endif
    
                    </td>
                    @if ($seller->statusani == 1)
                        <td> <a href="{{route("admin.ani.edit", $seller)}}" class="btn btn-secondary btn-sm">Validado</a></td>
                    @else
                        <td> <a href="{{route("admin.ani.edit", $seller)}}" class="btn btn-primary btn-sm">validar</a></td>
                    @endif

                   

    
    
                </tr>
                @endforeach
    
            </tbody>
            <tfoot>
                <tr>
                    <th>#</th>
                    <th>Municipio</th>
                    <th>Puesto</th>
                    <th>Mesa</th>
                    <th>Nombre</th>
                    <th>Comisión</th>
                    <th>Codpuesto</th>
                    <th>observacion</th>
                    <th>status</th>
                    <th></th>
    
                </tr>
            </tfoot>
        </table>

    {{-- <table  id="example" class="display responsive nowrap" style="width:98%">
        <thead style="tab-size: 10px">
            <tr>
                <th>#</th>
               

            </tr>
        </thead>

        <tbody>
            @foreach ($sellers as $seller)
            <tr>
              
                


            </tr>
            @endforeach

        </tbody>
       
    </table> --}}



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
             { responsivePriority: 3, targets: 8 },
             { responsivePriority: 2, targets: 2 },
             { responsivePriority: 1, targets: 3 },
             { target: 0, visible: false},
             { target: 5, visible: false},
             { target: 6, visible: false},

             ],
             "dom": 'Bfrtip',
             "buttons": [
                //  {
                //  "extend": 'excelHtml5',
                //  "title": 'testigos_acreditados_xls'
                //   },
                //   {
                //  "extend": 'pdfHtml5',
                //  "title": 'testigos_acreditados_pdf',
                //  "download": 'open'
                //   }
             ]

             }
             );
         })
     </script>
@endsection







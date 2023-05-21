@extends('adminlte::page')

@section('title', 'Consultar E14')

@section('content_header')
    <h1 style="text-align: center">Puestos de votación</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{(session('info'))}}</strong>
        </div>
    @endif

<div class="card">
        <div class="card-body">
            <table  id="example" class="display responsive nowrap" style="width:95%" >
                    <thead >
                        <tr>
                            <th>Código del puesto</th>
                            <th>Nombre</th>
                            <th>Dirección</th>
                            <th>Mesas</th>
                            <th>comuna</th>


                            
                        </tr>
                    </thead>

                    <tbody >
                        @foreach ($verpuestos as $verpuesto)
                        <tr>
                            <td>{{ $verpuesto->codpuesto }}</td>
                            <td>{{ $verpuesto->nombre }}</td>
                            <td>{{ $verpuesto->direccion }}</td>
                            <td>{{ $verpuesto->mesas }}</td>
                            <td>{{ $verpuesto->comuna }}</td>
                        </tr>
                        @endforeach

                    </tbody>
                    
                </table>
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

             { responsivePriority: 4, targets: 4 },
             { responsivePriority: 3, targets: 3 },
             { responsivePriority: 2, targets: 2 },
             { responsivePriority: 1, targets: 1 },
             

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











@section('plugins.Datatables', true)
@extends('adminlte::page')

@section('title', 'Acreditar')

@section('content_header')
    {{--  <a href="{{route('admin.superusers.create')}}" class="btn btn-secondary btn-sm float-right">Agregar vendedor</a>  --}}
    <h1 style="text-align:center">Lista de puestos de votacion a nivel Departamental</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{(session('info'))}}</strong>
        </div>
    @endif

    <div class="card">
    <div class="card-body">
    <table  id="example" class="display responsive nowrap">
        <thead >
            <tr >
                <th>Codigo del puesto</th>
                <th>Nombre</th>
                <th>Direccion</th>
                <th># de Mesas</th>
                <th>Comuna</th>
                

            </tr>
        </thead>

        <tbody >
            @foreach ($verpuestos as $verpuestos)
            <tr>
                <td>{{ $verpuestos->codpuesto }}</td>
                <td>{{ $verpuestos->nombre }}</td>
                <td>{{ $verpuestos->direccion }}</td>
                <td>{{ $verpuestos->mesas }}</td>
                <td>{{ $verpuestos->comuna }}</td>

            </tr>
            @endforeach

        </tbody>
        
    </table>



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







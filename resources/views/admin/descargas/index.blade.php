@extends('adminlte::page')

@section('title', 'Reportar')

@section('content_header')
    <h1 style="text-align: center">Descargar bas de datos para acreditacion</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{(session('info'))}}</strong>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <table id="example" class="display responsive nowrap" style="width:98%">
                <thead>
                    <tr>
                        <th> coddep </th>
                        <th> codmun </th>
                        <th>codzon </th>
                        <th>codpuesto </th>
                        <th> departamento </th>
                        <th> municipio </th>
                        <th> puesto </th>
                        <th> mesa </th>
                        <th> codpar </th>
                        <th> cedula </th>
                        <th> nombre </th>
                        <th> email </th>
                        <th> telefono </th>
                        <th> codescru </th>
                        <th> codcor </th>
                        <th> status </th>
                        <th> pdf </th>
                        <th> gob1 </th>
                        <th> gob2 </th>
                        <th> gob3 </th>
                        <th> asa1 </th>
                        <th> asa2 </th>
                        <th> asa3 </th>
                        <th> alc1 </th>
                        <th> alc2 </th>
                        <th> alc3 </th>
                        <th> recuperados </th>
                        <th> e14 </th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($sellers as $seller)
                    <tr>
                        <td> {{ $seller->coddep }}</td>
                        <td> {{ $seller->codmun }}</td>
                        <td> {{ $seller->codzon }}</td>
                        <td> {{ $seller->codpuesto }}</td>
                        <td> {{ $seller->departamento }}</td>
                        <td> {{ $seller->municipio }}</td>
                        <td> {{ $seller->puesto }}</td>
                        <td> {{ $seller->mesa }}</td>
                        <td> {{ $seller->codpar }}</td>
                        <td> {{ $seller->cedula }}</td>
                        <td> {{ $seller->nombre }}</td>
                        <td> {{ $seller->email }}</td>
                        <td> {{ $seller->telefono }}</td>
                        <td> {{ $seller->codescru }}</td>
                        <td> {{ $seller->codcor }}</td>
                        <td> {{ $seller->status }}</td>
                        <td> {{ $seller->pdf }}</td>
                        <td> {{ $seller->gob1 }}</td>
                        <td> {{ $seller->gob2 }}</td>
                        <td> {{ $seller->gob3 }}</td>
                        <td> {{ $seller->asa1 }}</td>
                        <td> {{ $seller->asa2 }}</td>
                        <td> {{ $seller->asa3 }}</td>
                        <td> {{ $seller->alc1 }}</td>
                        <td> {{ $seller->alc2 }}</td>
                        <td> {{ $seller->alc3 }}</td>
                        <td> {{ $seller->recuperados }}</td>
                        <td> {{ $seller->e14 }}</td>
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
            { target: 5, visible: false},
            { target: 6, visible: false},

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







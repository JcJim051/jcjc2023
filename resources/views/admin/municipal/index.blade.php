@extends('adminlte::page')

@section('title', 'Reportar')

@section('content_header')
    <h1 style="text-align: center">Alertas Escrutinio Municipal</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{(session('info'))}}</strong>
        </div>
    @endif
   
      
    <div class="card">
        <div class="card-body">
            <table id="example" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th> id </th>
                        <th>municipio</th>
                        <th>puesto</th>
                        <th>mesa</th>
                        <th>Preconteo</th>
                        <th>Zonal</th> 
                        <th>Municipal</th> 

                        <th> E11 - Total </th>
                        <th> Banlance </th>
                        
                    </tr>
                </thead>

                <tbody>
                    @foreach ($data as $data)
                    <tr>
                        
                        <td>{{ $data->id }}</td>
                        <td>{{ $data->municipio }}</td>
                        <td>{{ $data->puesto }}</td>
                        <td>{{ $data->mesa }}</td>
                        <td>{{ $data->gob1 }}</td>
                            @if ( $data->votos->gob1_zonal == $data->gob1)
                                <td>{{ $data->votos->gob1_municipal }}</td>   
                            @else
                                <td style="color:red">{{ $data->votos->gob1_municipal }}</td>
                            @endif

                            @if ( $data->votos->gob1_zonal == $data->gob1)
                                <td>{{ $data->votos->gob1_municipal }}</td>   
                            @else
                                <td style="color:red">{{ $data->votos->gob1_municipal }}</td>
                            @endif
                            
                        
                        <td>
                            @if ($data->votos->censodemesa_municipal - $data->votos->votosenurna_municipal == 0 )
                                        <div class="btn btn-success">0</div>
                                @else
                                    @if ($data->votos->censodemesa_municipal - $data->votos->votosenurna_municipal < 0 )
                                    <div class="btn btn-danger">{{ $data->votos->censodemesa_municipal - $data->votos->votosenurna_municipal}}</div>
                                    @else
                                        <a class="btn btn-warning btn-smclass=">{{ $data->votos->censodemesa_municipal - $data->votos->votosenurna_municipal }}</div>
                                    @endif 
                                @endif  
                            
                        </td>
                        <td> @if ($data->votos->gob1_municipal+$data->votos->gob2_municipal+$data->votos->gob3_municipal+$data->votos->gob4_municipal+$data->votos->gob5_municipal+$data->votos->gob6_municipal+$data->votos->gob7_municipal+$data->votos->nulos_municipal+$data->votos->enblanco_municipal+$data->votos->nomarcados_municipal == $data->votos->votosenurna_municipal )
                            <div class="btn btn-success">Balanceada</div>
                            @else
                                <a href="#"  class="btn btn-danger btn-smclass=">Desbalanceada</div>
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







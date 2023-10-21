@extends('adminlte::page')

@section('title', 'Reportar')

@section('content_header')
    <h1 style="text-align: center">Alertas Escrutinio zonal</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{(session('info'))}}</strong>
        </div>
    @endif
   
     
    <div class="card">
        <div class="card-body">
            <table id="example" class="table display long-text" style="width:100%; font-size: 11px;" width ="100%">
                <thead class="text-white" style="background-color: hsl(209, 36%, 54%)">
                    <tr class="text-center">
                        <th>id</th>
                        <th>Municipio</th>
                        <th>Puesto</th>
                        <th>Mesa</th>
                        <th>Preconteo</th>
                        <th>Zonal</th>                        
                        <th>E11 - Total</th>
                        <th>Nivelacion</th>
                        
                    </tr>
                </thead>

                <tbody>
                    @foreach ($data as $data)
                    <tr >
                        
                        <td>{{ $data->id }}</td>
                        <td>{{ $data->municipio }}</td>
                        <td>{{ $data->puesto }}</td>
                        <td>{{ $data->mesa }}</td>
                        <td>{{ $data->gob1 }}</td>
                            @if ( $data->votos->gob1_zonal == $data->gob1)
                                <td>{{ $data->votos->gob1_zonal }}</td>   
                            @else
                                <td style="color:red">{{ $data->votos->gob1_zonal }}</td>
                            @endif
                            
                        
                        <td class="text-center">
                            @if ($data->votos->censodemesa_zonal - $data->votos->votosenurna_zonal == 0 )
                                        <div class="text-center btn btn-success btn-sm">0</div>
                                @else
                                    @if ($data->votos->censodemesa_zonal - $data->votos->votosenurna_zonal < 0 )
                                    <div class="btn btn-danger">{{ $data->votos->censodemesa_zonal - $data->votos->votosenurna_zonal}}</div>
                                    @else
                                        <a class="btn btn-warning btn-smclass=">{{ $data->votos->censodemesa_zonal - $data->votos->votosenurna_zonal }}</div>
                                    @endif 
                                @endif  
                            
                        </td>
                        <td class="text-center"> @if ($data->votos->gob1_zonal+$data->votos->gob2_zonal+$data->votos->gob3_zonal+$data->votos->gob4_zonal+$data->votos->gob5_zonal+$data->votos->gob6_zonal+$data->votos->gob7_zonal+$data->votos->nulos_zonal+$data->votos->enblanco_zonal+$data->votos->nomarcados_zonal == $data->votos->votosenurna_zonal )
                            <div class="btn btn-success btn-sm">ok</div>
                            @else
                                <a href="#"  class="btn btn-danger btn-sm">Desbalanceada</div>
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
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/searchpanes/2.2.0/css/searchPanes.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/select/1.7.0/css/select.dataTables.min.css">


@endsection



@section('js')
    <script> console.log('de tu mano señor!'); </script>
    
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
            "responsive": true,
            
            "columnDefs": [
                {searchPanes: {show: false},targets: []},
                
                { target: 0, visible: false},
            

            ],
            "dom":'BPrtip' ,
            "scrollX": true,
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

            $('.dtsp-pane').on('click', 'a', function (e) {
                e.preventDefault(); // Prevenir la acción predeterminada (navegar a la página vinculada)
            });
            // Captura el evento de cambio en los paneles de búsqueda
            table.on('stateChange', function () {
            // Obtiene el estado actual de los paneles de búsqueda
            var state = table.state.save();

            // Almacena el estado en las cookies o el almacenamiento local
            localStorage.setItem('searchPaneState', JSON.stringify(state));
             });
              // Restaura el estado de los paneles de búsqueda al cargar la página
            var savedState = localStorage.getItem('searchPaneState');
            if (savedState) {
                table.state.clear();
                table.state.load(JSON.parse(savedState));
                table.draw();
            }



            

        });

       
   
        // Escuchar el clic en el enlace y mostrar el teléfono en el modal
        $(document).ready(function () {
            $('.open-modal').click(function () {
                var telefono = $(this).data('telefono');
                $('#telefonoText').text(telefono);
                $('#telefonoModal').modal('show');
            });
       
        });

    </script>
    
@endsection







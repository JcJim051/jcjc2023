@extends('adminlte::page')

@section('title', 'Reportar')

@section('content_header')
    <h4 style="text-align: center">Alertas en Pre-Conteo</h4>
    <style>
       /* Oculta el texto por defecto */


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
   
  
    
    <div id="searchpanes_container"></div>
  
   </div>
    <div class="card">
        
        <div class="card-body">
            <div class="mb-3 d-flex justify-content-end">
                <a href="{{ route('admin.users.create') }}" class="mr-2 btn btn-success">
                    <i class="fas fa-user-plus"></i> Crear Usuario
                </a>
                <a href="{{ route('admin.users.import.form') }}" class="btn btn-primary">
                    <i class="fas fa-file-upload"></i> Carga Masiva
                </a>
            </div>
            <table id="example" class="table display nowrap table-bordered long-text" style="width:100%; font-size: 11px;" width ="100%">
                <thead class="text-white" style="background-color: hsl(209, 36%, 54%)">
                    <tr>
                        <th>id</th>                        
                        <th>Nombre</th>
                        <th>Telefono wp</th>
                        <th>Coreo</th>
                        <th>Rol</th>
                        <th>Codigo Zona</i></th>
                        <th>Codigo Puesto</th>
                        <th>Municipio</th>
                        <th>Departamento</th>
                        <th style="background-color: hsl(25, 41%, 55%)">Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->id}}</td>
                        <td>{{$user->email}}</td>
                        <td>
                            @switch($user->role)
                                @case(1) Administrador @break
                                @case(2) Escrutador @break
                                @case(3) Coordinador @break
                                @case(4) Consulta @break
                                @case(5) Validador ANI @break
                                @case(6) Analista @break
                                @case(7) PMU @break
                                @default Desconocido
                            @endswitch
                        </td>
                        <td>{{$user->codzon}}</td>
                        <td>{{$user->codpuesto}}</td>
                        <td>{{$user->mun}}</td>
                        <td>{{$user->id}}</td>
                        <td>
                            <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-sm btn-warning">Editar</a>
                            
                            <form action="{{ route('admin.users.destroy', $user) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>    
                    @endforeach
                </tbody>


            </table>
        </div>
    </div>

    {{-- Modal  --}}
    <div class="modal fade" id="telefonoModal" tabindex="-1" role="dialog" aria-labelledby="telefonoModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="telefonoModalLabel">Teléfono</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p id="telefonoText"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
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
                layout: 'columns-7',
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







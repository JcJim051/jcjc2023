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
            <table id="example" class="table display nowrap table-bordered long-text" style="width:100%; font-size: 11px;" width ="100%">
                <thead class="text-white" style="background-color: hsl(209, 36%, 54%)">
                    <tr>
                        <th>id</th>                        
                        <th>municipio</th>
                        <th>Codigo</th>
                        <th>puesto</th>
                        <th>mesa</th>
                        <th>Datos</i></th>
                        <th>Foto1</th>
                        <th>Fotos2</th>
                        <th>reclam</th>
                        <th style="background-color: hsl(25, 41%, 55%)">Balance</th>
                        <th style="background-color: hsl(25, 41%, 55%)">Reconteo</th>
                        <th style="background-color: hsl(25, 41%, 55%)">E11-Total</th>
                        <th style="background-color: hsl(25, 41%, 55%)">Reclam</th>
                        <th style="background-color: hsl(25, 41%, 55%)">%Nulos</th>
                       


                        
                        
                    </tr>
                </thead>

                <tbody>
                    @foreach ($pmu as $pmu)
                    <tr>
                        <td> {{ $pmu->id }}</td>
                        
                        <td style="font-size: 10px"> {{ $pmu->municipio }}</td>
                        <td>{{$pmu->codcor}}</td> 
                        <td> {{$pmu->puesto}}<a  style="color: green"href="#" class="open-modal" data-telefono="{{$pmu->telefono}}"> <i class="fas fa-phone-square"></i></a> </td>
                        <td> {{ $pmu->mesa }}</td>
                        <td> 
                            @if ($pmu->gob1 !== null)
                                <span style="color: green"><i class="fas fa-check-circle"></i> si</span>
                            @else
                                <a target="_blank" href="{{route("admin.tellers.edit", $pmu)}}" style="font-size: 10px"><span style="color: red"><i class="fas fa-times-circle"></i> no</span>
                            @endif
                        </td>
                        <td>
                            @if ($pmu->e14 <> null )
                                <a  target="_blank" rel="noopener noreferrer" href="{{ asset('/storage/' . $pmu->e14) }}"><span style="color: green"><i class="fas fa-check-circle"></i> si</i></span></a> - <a href="{{route("admin.tellers.edit1", $pmu)}}" style="font-size: 10px"><span style="color: red"><i class="fas fa-camera"></i></span></a>
                            @else
                                <a href="{{route("admin.tellers.edit1", $pmu)}}" style="font-size: 10px"><span style="color: red"><i class="fas fa-times-circle"></i>no</span></a>
                            @endif
                        </td> 
                        <td>
                            @if ($pmu->e14_2 <> null)
                                <a  target="_blank" rel="noopener noreferrer" href="{{ asset('/storage/' . $pmu->e14_2) }}"><span style="color: green"><i class="fas fa-check-circle"></i> si</i></span></a> - <a href="{{route("admin.tellers.edit2", $pmu)}}" style="font-size: 10px"><span style="color: red"><i class="fas fa-camera"></i></span></a>
                            @else
                                <a href="{{route("admin.tellers.edit2", $pmu)}}" style="font-size: 10px"><span style="color: red"><i class="fas fa-times-circle"></i>no</span></a>
                            @endif
                        </td> 
                        <td>
                            @if ($pmu->reclamacion == 1)
                                @if ($pmu->fotorec == null )
                                <a href="{{route("admin.tellers.edit3", $pmu)}}" style="font-size: 10px"><span style="color: red"><i class="fas fa-times-circle"></i>no</span></a>

                                @else
                                    <a  target="_blank" rel="noopener noreferrer" href="{{ asset('/storage/' . $pmu->fotorec) }}"><span style="color: green"><i class="fas fa-check-circle"></i> si</i></span></a> - <a href="{{route("admin.tellers.edit3", $pmu)}}" style="font-size: 10px"><span style="color: red"><i class="fas fa-camera"></i></span></a>
                                @endif
                            @else
                                No Rec
                            @endif
                        </td>
                        
                        
                        <td> 
                            @if ($pmu->votosenurna == null)
                                NR
                            @else
                                @if ($pmu->gob1+$pmu->gob2+$pmu->gob3+$pmu->gob4+$pmu->gob5+$pmu->gob6+$pmu->gob7+$pmu->gob8+$pmu->gob9+$pmu->gob10+$pmu->gob11+$pmu->nulos+$pmu->enblanco+$pmu->nomarcados == ($pmu->votosenurna - $pmu->votosincinerados))
                                <a href="{{ route("admin.pmu.edit", $pmu) }}" class="green-link">
                                    <span style="color: green; font-size: 13px"><i class="fas fa-balance-scale"></i> ok</span>
                                </a>
                                
                                @else
                                <a href="{{ route("admin.pmu.edit", $pmu) }}" class="green-link">
                                    <span style="color: red; font-size: 13px"><i class="fas fa-balance-scale-left"></i> nook</span>
                                </a>
                        @endif   
                            @endif     
                        </td>
                        <td style="font-size: 10px ; text-align:center"> 
                            @if ($pmu->status_reconteo == null)
                               NR   
                            @else
                                @if ($pmu->status_reconteo == 0)
                                    <a href="{{route("admin.pmu.edit", $pmu)}}" class="btn btn-success btn-sm" style="font-size: 10px">No</a>
                                @else
                                    <a href="{{route("admin.pmu.edit", $pmu)}}" class="btn btn-danger btn-sm" style="font-size: 10px">Si</a>
                                @endif    
                            @endif    
                        </td>


                        <td style="font-size: 10px ; text-align:center"> 
                            @if ($pmu->votosenurna == null)
                                NR
                            @else
                            @if ($pmu->censodemesa - $pmu->votosenurna == 0 )
                            <a href="{{route("admin.pmu.edit", $pmu)}}" class="btn btn-success btn-sm" style="font-size: 10px">0</a>
                            @else
                                @if ($pmu->censodemesa - $pmu->votosenurna < 0 )
                                <a href="{{route("admin.pmu.edit", $pmu)}}" class="btn btn-danger btn-sm " style="font-size: 10px">{{ $pmu->censodemesa - $pmu->votosenurna }}</a>
                                @else
                                    <a href="{{route("admin.pmu.edit", $pmu)}}" class="btn btn-warning btn-sm" style="font-size: 10px">{{ $pmu->censodemesa - $pmu->votosenurna }}</a>
                                @endif 
                            @endif  
                            @endif
                        </td>
                        <td style="font-size: 10px ; text-align:center"> 
                            @if ($pmu->reclamacion == null)
                               NR   
                            @else
                                @if ($pmu->reclamacion == 0)
                                <a href="{{route("admin.pmu.edit", $pmu)}}" class="btn btn-success btn-sm" style="font-size: 10px">No</a>
                                @else
                                    <a href="{{route("admin.pmu.edit", $pmu)}}" class="btn btn-danger btn-sm" style="font-size: 10px">Si</a>
                                @endif    
                            @endif    
                        </td>
                        <td style="font-size: 10px ; text-align:center"> 
                            @if (($pmu->votosenurna) == 0)
                                NR
                            @else
                            @if (($pmu->nulos/$pmu->votosenurna) > 0.2)
                                <a  href="{{route("admin.pmu.edit", $pmu)}}" class="btn btn-danger btn-sm"  style="font-size: 10px">{{ round(($pmu->nulos/$pmu->votosenurna)*100, 0)}}%</a>
                                @else
                                <a  href="{{route("admin.pmu.edit", $pmu)}}" class="btn btn-success btn-sm"  style="font-size: 10px">Ok</a>
                                @endif
                            @endif
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







@section('plugins.Datatables', true)
@extends('adminlte::page')

@section('title', 'Acreditar')

@section('content_header')
    <h1 style="text-align:center">Validacion de testigos electorales</h1>
@stop

@section('content')

@if (session('info'))
    <div class="alert alert-success">
        <strong>{{ session('info') }}</strong>
    </div>
@endif

<div class="card">
    <div class="card-body">

        <table id="example"
               class="table display nowrap table-bordered"
               style="width:100%; font-size:10px">

            <thead class="text-white" style="background-color:hsl(209, 36%, 54%)">
                <tr>
                    <th>#</th>
                    <th>Municipio</th>
                    <th>Puesto</th>
                    <th>Mesa</th>
                    <th>Candidato</th>
                    <th>Nombre</th>
                    <th>Comisión</th>
                    <th>Observación</th>
                    <th>Status</th>
                    <th>Acción</th>
                </tr>
            </thead>

            <tbody>
            @foreach ($sellers as $seller)
                <tr>
                    <td>{{ $seller->id }}</td>

                    <td>{{ $seller->municipio }}</td>

                    <td style="color: {{ $seller->statusani != 0 && $seller->statusani != null ? 'rgb(0,169,14)' : 'red' }}">
                        {{ $seller->puesto }}
                    </td>

                    <td style="color: {{ $seller->statusani != 0 && $seller->statusani != null ? 'rgb(0,169,14)' : 'red' }}">
                        {{ $seller->mesa }}
                    </td>

                    <td>{{ $seller->candidato }}</td>
                    <td>{{ $seller->nombre }}</td>
                    <td>{{ $seller->codescru }}</td>
                    <td>{{ $seller->observacion }}</td>

                    <td style="font-size:18px; text-align:center">
                        @if($seller->statusani == 1)
                            <i class="fas fa-vote-yea text-success">.</i>
                        @else
                            <i class="fas fa-window-close text-danger"></i>
                        @endif
                    </td>

                    <td>
                        <a href="{{ route('admin.ani.edit', $seller) }}"
                           class="btn btn-{{ $seller->statusani == 1 ? 'secondary' : 'primary' }} btn-sm">
                            {{ $seller->statusani == 1 ? 'Validado' : 'Validar' }}
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>

        </table>

    </div>
</div>

@stop

{{-- ===================== CSS ===================== --}}
@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/searchpanes/2.2.0/css/searchPanes.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.2/css/buttons.dataTables.min.css">
@endsection

{{-- ===================== JS ===================== --}}
@section('js')
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>

<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>

<script src="https://cdn.datatables.net/buttons/2.3.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/searchpanes/2.2.0/js/dataTables.searchPanes.min.js"></script>
<script src="https://cdn.datatables.net/select/1.7.0/js/dataTables.select.min.js"></script>

<script>
$(document).ready(function () {

    let config = {
        pageLength: 25,
        responsive: true,
        columnDefs: [
            { targets: 0, visible: false },

            // Columnas con SearchPanes
            { searchPanes: { show: true }, targets: [1,2,3,4,6,8] }
        ],
        searchPanes: {
            initCollapsed: true
        },
        language: {
            search: "Buscar:",
            searchPanes: {
                title: {
                    _: 'Filtros aplicados (%d)',
                    0: 'Sin filtros',
                    1: '1 filtro aplicado'
                }
            }
        }
    };

    @if(Auth::user()->role == 1)
        // SUPERUSER → SearchPanes
        config.dom = 'Plfrtip';
    @else
        // Usuarios normales
        config.dom = 'frtip';
    @endif

    $('#example').DataTable(config);
});
</script>
@endsection

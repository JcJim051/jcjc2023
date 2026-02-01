@extends('adminlte::page')

@section('title', 'Reportar')

@section('content_header')
    <h4 style="text-align: center">Alertas en Pre-Conteo</h4>
    <style>
        .long-text {
            white-space: nowrap;
        }
    </style>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif

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

            <table id="example" class="table display nowrap table-bordered long-text" style="width:100%; font-size: 11px;">
                <thead class="text-white" style="background-color: hsl(209, 36%, 54%)">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Rol</th>
                        <th>Código Zona</th>
                        <th>Código Puesto</th>
                        <th>Municipio</th>
                      
                        <th style="background-color: hsl(25, 41%, 55%)">Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                       
                        <td>{{ $user->email }}</td>
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
                        <td>{{ $user->codzon }}</td>
                        <td>{{ $user->codpuesto }}</td>
                        <td>{{ $user->mun }}</td>
                       
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
@stop

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.dataTables.min.css">
@endsection

@section('js')
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>

    <script src="https://cdn.datatables.net/buttons/2.3.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.print.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#example').DataTable({
                pageLength: 25,
                responsive: true,
                scrollX: true,
                dom: 'Bfrtip', // Buscador normal
                buttons: [
                    {
                        extend: 'excelHtml5',
                        title: 'Alertas_preconteo_xls'
                    }
                ],
                columnDefs: [
                   
                ],
                language: {
                    search: "Buscar:",
                    lengthMenu: "Mostrar _MENU_ registros",
                    info: "Mostrando _START_ a _END_ de _TOTAL_ registros",
                    paginate: {
                        previous: "Anterior",
                        next: "Siguiente"
                    }
                }
            });
        });
    </script>
@endsection

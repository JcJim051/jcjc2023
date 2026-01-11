@extends('adminlte::page')

@section('title', 'Roles')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <h1>Listado de Roles</h1>
        <a href="{{ route('admin.roles.create') }}" class="btn btn-primary">Crear Rol</a>
    </div>
@endsection

@section('content')
    @if (session('info'))
        <div class="mt-2 alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif

    <div class="mt-3 card">
        <div class="card-body">
            <table id="rolesTable" class="table display nowrap table-bordered" style="width:100%; font-size: 11px;">
                <thead class="text-white" style="background-color: hsl(209, 36%, 54%)">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th style="background-color: hsl(25, 41%, 55%)">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $role)
                        <tr>
                            <td>{{ $role->id }}</td>
                            <td>{{ $role->name }}</td>
                            <td>
                                <a href="{{ route('admin.roles.edit', $role) }}" class="btn btn-sm btn-warning">Editar</a>
                                
                                <form action="{{ route('admin.roles.destroy', $role) }}" method="POST" style="display:inline-block;">
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
@endsection

@section('js')
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#rolesTable').DataTable({
                "pageLength": 10,
                "responsive": true,
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json"
                }
            });
        });
    </script>
@endsection

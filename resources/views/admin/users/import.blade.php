@extends('adminlte::page')


@section('title', 'Importar Usuarios')

@section('content')

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif
<div class="container mt-4">
    <h3>Importar Usuarios desde CSV</h3>
    <a href="{{ route('admin.users.import.template') }}" class="mb-3 btn btn-info">
        <i class="fas fa-download"></i> Descargar plantilla CSV
    </a>
    @if(session('info'))
        <div class="alert alert-success">{{ session('info') }}</div>
    @endif

    <form action="{{ route('admin.users.import') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="csv">Archivo CSV</label>
            <input type="file" name="csv" id="csv" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Importar</button>
    </form>
    
</div>
@endsection

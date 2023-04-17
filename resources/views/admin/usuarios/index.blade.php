@extends('adminlte::page')

@section('title', 'Reportar')

@section('content_header')
    <h1 style="text-align: center">Crear Usuarios de forma masiva</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{(session('info'))}}</strong>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            @csrf
            <form action="{{ route('admin.usuarios.store') }}" method="POST" enctype="multipart/form-data">
               <div class="row">
                    <label for="">Seleccione archivo</label>
                    <input type="file" name="documento">
               </div>
                <div class="row">
                    <br>
                    <button type="submit" class="btn btn-primary">importarr</button>
                </div>
            </form>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.dataTables.min.css">
@endsection











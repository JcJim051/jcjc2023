@extends('adminlte::page')

@section('title', 'Coordinador')

@section('content_header')
    <h1>Coordinador</h1>
@stop


@section('content')
    @if (session('info'))
        <div class="alert alert-danger">
            <strong>{{(session('info'))}}</strong>
        </div>
    @endif

    <div class="card">
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Cedula</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Telefono</th>
                    <th colspan="2"></th>
                </tr>
            </thead>

            <tbody>
                @foreach ($sellers as $seller)
                    <tr>
                        <td>{{$seller->id}}</td>
                        <td>{{$seller->cedula}}</td>
                        <td>{{$seller->nombre}}</td>
                        <td>{{$seller->email}}</td>
                        <td>{{$seller->telefono}}</td>
                        <td width="10px">
                            {{-- @can('admin.superusers.edit') --}}
                                <a href="{{route("admin.coordinators.edit", $seller)}}" class="btn btn-primary btn-sm">Editar</a>
                            {{-- @endcan --}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    </div>
@stop
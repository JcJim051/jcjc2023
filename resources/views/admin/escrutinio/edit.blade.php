@extends('adminlte::page')

@section('title', 'Admin')

@section('content_header')
    <h4> REPORTE DE VOTOS RECUPERADOS <br> {{ $escrutinio->puesto}} MESA {{ $escrutinio->mesa}}</h4>
@stop

@section('content')

@if (session('info'))
        <div class="alert alert-success">
            <strong>{{(session('info'))}}</strong>
        </div>
@endif

<div class="card">
    <div class="card-body">
        {!! Form::model($escrutinio, ['route' => ['admin.escrutinio.update',$escrutinio], 'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}

        {!! Form::hidden('coddep', null) !!}
        {!! Form::hidden('codmun', null) !!}
        {!! Form::hidden('codzon', null) !!}
        {!! Form::hidden('codpuesto', null) !!}
        {!! Form::hidden('departamento', null) !!}
        {!! Form::hidden('municipio', null) !!}
        {!! Form::hidden('puesto', null) !!}
        {!! Form::hidden('mesa', null) !!}
        {!! Form::hidden('codpar', null) !!}
        {!! Form::hidden("email", null) !!}
        {!! Form::hidden("telefono", null) !!}
        {!! Form::hidden("nombre", null) !!}



        <div class="form-group">
            {!! Form::label("recuperados", "Felipe Carreño") !!}
            {!! Form::text("recuperados", null, ["class" => "form-control disabled", 'placeholder' => 'Votos Recuperados']) !!}

            @error('recuperados')
                <span class="text-danger">{{$message}}</span>
            @enderror

        </div>








            {!! Form::hidden('codescru', null) !!}
            {!! Form::hidden('codcor', null) !!}
            {!! Form::hidden('status', null) !!}

            {!! Form::submit('Reportar resultados', ['class' => 'btn btn-primary']) !!}

        {!! Form::close() !!}
    </div>
</div>
@stop

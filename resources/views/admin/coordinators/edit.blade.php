@extends('adminlte::page')

@section('title', 'Admin')

@section('content_header')
    <h1>Editar vendedor</h1>
@stop

@section('content')

@if (session('info'))
        <div class="alert alert-success">
            <strong>{{(session('info'))}}</strong>
        </div>
@endif

<div class="card">
    <div class="card-body">
        {!! Form::model($coordinator, ['route' => ['admin.coordinators.update',$coordinator], 'method' => 'PUT']) !!}

        {!! Form::hidden('coddep', null) !!}
        {!! Form::hidden('codmun', null) !!}
        {!! Form::hidden('codzon', null) !!}
        {!! Form::hidden('codpuesto', null) !!}
        {!! Form::hidden('departamento', null) !!}
        {!! Form::hidden('municipio', null) !!}
        {!! Form::hidden('puesto', null) !!}
        {!! Form::hidden('mesa', null) !!}
        {!! Form::hidden('codpar', null) !!}


        <div class="form-group"> {{-- A continuacion se usa laravel collective para crar el formulario --}}
            {!! Form::label("nombre", "Nombre") !!}
            {!! Form::text("nombre", null, ["class" => "form-control", 'placeholder' => 'Ingrese su nombre']) !!}

            @error('nombre')
                <span class="text-danger">{{$message}}</span>
            @enderror

        </div>

        {{-- Aca se crea el campo para el Slug y se conecta luego con el plugin JQuery y se pone en modo solo lectura --}}
        {{-- <div class="form-group">
            {!! Form::label("slug", "Slug") !!}
            {!! Form::text("slug", null, ["class" => "form-control disabled", 'placeholder' => 'Slug de nombre', 'readonly']) !!}

            @error('slug')
                <span class="text-danger">{{$message}}</span>
            @enderror

        </div> --}}

            <div class="form-group">
                {!! Form::label("cedula", "Cedula") !!}
                {!! Form::text("cedula", null, ["class" => "form-control disabled", 'placeholder' => 'Ingrese su cedula']) !!}

                @error('cedula')
                    <span class="text-danger">{{$message}}</span>
                @enderror

            </div>

            <div class="form-group">
                {!! Form::label("email", "Email") !!}
                {!! Form::text("email", null, ["class" => "form-control disabled", 'placeholder' => 'Ingrese su email']) !!}

                @error('email')
                    <span class="text-danger">{{$message}}</span>
                @enderror

            </div>

            <div class="form-group">
                {!! Form::label("telefono", "Telefono") !!}
                {!! Form::text("telefono", null, ["class" => "form-control disabled", 'placeholder' => 'Ingrese su telefono']) !!}

                @error('telefono')
                    <span class="text-danger">{{$message}}</span>
                @enderror

            </div>



            {!! Form::hidden('codescru', null) !!}
            {!! Form::hidden('codcor', null) !!}
            {!! Form::hidden('status', null) !!}

            {!! Form::submit('Editar vendedor', ['class' => 'btn btn-primary']) !!}

        {!! Form::close() !!}
    </div>
</div>
@stop

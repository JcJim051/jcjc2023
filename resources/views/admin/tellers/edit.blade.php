@extends('adminlte::page')

@section('title', 'Admin')

@section('content_header')
    <h4> REPORTE DE VOTOS <br> {{ $teller->puesto}} MESA {{ $teller->mesa}}</h4>
@stop

@section('content')

@if (session('info'))
        <div class="alert alert-success">
            <strong>{{(session('info'))}}</strong>
        </div>
@endif

<div class="card">
    <div class="card-body">
        {!! Form::model($teller, ['route' => ['admin.tellers.update',$teller], 'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}

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

        {{-- Aca se crea el campo para el Slug y se conecta luego con el plugin JQuery y se pone en modo solo lectura --}}
        {{-- <div class="form-group">
            {!! Form::label("slug", "Slug") !!}
            {!! Form::text("slug", null, ["class" => "form-control disabled", 'placeholder' => 'Slug de nombre', 'readonly']) !!}

            @error('slug')
                <span class="text-danger">{{$message}}</span>
            @enderror

        </div> --}}

        <div class="row">
            <div class="col-sm-4 col-xs-12">
                <div class="form-group">
                    {!! Form::label("gob1", "Felipe Carreño") !!}
                    {!! Form::text("gob1", null, ["class" => "form-control disabled", 'placeholder' => 'Votos por Felipe Carreño']) !!}

                    @error('gob1')
                        <span class="text-danger">{{$message}}</span>
                    @enderror

                </div>
            </div>
            <div class="col-sm-4 col-xs-12 ">
                <div class="form-group">
                    {!! Form::label("gob2", "Candidato  2") !!}
                    {!! Form::text("gob2", null, ["class" => "form-control disabled", 'placeholder' => 'Votos por candidato 2']) !!}

                    @error('gob2')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>
            <div class="col-sm-4 col-xs-12">
                <div class="form-group">
                    {!! Form::label("gob3", "Candidato  3") !!}
                    {!! Form::text("gob3", null, ["class" => "form-control disabled", 'placeholder' => 'Votos por candidato 3']) !!}

                    @error('gob3')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-sm-3 col-xs-12">
               
                    {!! Form::label("reclamacion", "Reclaciones en esta mesa") !!}
                    {!! Form::select("reclamacion",[ 0 => 'No', 1 => 'Si!' ], null, ["class" => "form-control disabled"]) !!}

                    @error('Estado')
                        <span class="text-danger">{{$message}}</span>
                    @enderror

                    <br>
            </div>
            <div class="col-sm-9 col-xs-12">
                <div class="form-floating">
                    <label for="floatingTextarea">Comentarios</label>
                    <textarea class="form-control" placeholder="Describe la reclamacion" id="floatingTextarea" name="observacion"> {{$teller->observacion}}</textarea>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6 col-x-12">

                    {!! Form::label("e14", "Cargar E14") !!} <br>
                    {!! Form::file("e14", null, ["class" => "form-control disabled"]) !!} <br>

                    @error('e14')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
            </div>
            <div class="col-sm-6 col-xs-12">
                <br>
                @if ($teller->e14 == null)

                @else
                <div class="row">
                    <div>
                        <a  target="_blank" rel="noopener noreferrer" href="{{ url('/storage/' . $teller->e14) }}">Ver E14 cargado</a>
                    </div>
                </div>

                @endif
                <br>
            </div>

        </div>









        {!! Form::hidden('codescru', null) !!}
        {!! Form::hidden('codcor', null) !!}
        {!! Form::hidden('status', null) !!}
        <br>
        {!! Form::submit('Reportar resultados', ['class' => 'btn btn-primary']) !!}
        {!! Form::close() !!}
    </div>
</div>
@stop

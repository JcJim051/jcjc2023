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

        
        <div class="card card-outline card-warning">
            <div class="card-header">
                <h5>Datos de la mesa</h5>
            </div>    
            <div class="card-body">
                
                <div class="row">
                    <div class="col-sm-3 col-xs-12">
                        <div class="form-group">
                            {!! Form::label("censodemesa", "Votantes en E11") !!}
                            {!! Form::text("censodemesa", null, ["class" => "form-control disabled  ", 'placeholder' => 'Cuantos ciudadanos pueden votar en esta mesa?']) !!}

                            @error('censodemesa')
                                <span class="text-danger">{{$message}}</span>
                            @enderror

                        </div>
                    </div>
                    <div class="col-sm-3 col-xs-2 ">
                        <div class="form-group">
                            {!! Form::label("votosenurna", "Votos en la Urna") !!}
                            {!! Form::text("votosenurna", null, ["class" => "form-control disabled", 'placeholder' => 'Cuantos votos en la hay en la urna?']) !!}

                            @error('votosenurna')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-3 col-xs-12">
                        <div class="form-group">
                            {!! Form::label("votosincinerados", "Votos Incinerados en preconteo") !!}
                            {!! Form::text("votosincinerados", null, ["class" => "form-control disabled", 'placeholder' => 'Total de Votos incinerados en el preconteo']) !!}

                            @error('votosincinerados')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-3 col-xs-12">
                        <div class="form-group">
                            {!! Form::label("status_reconteo", "¿Reconteo en mesa?") !!}
                            {!! Form::select("status_reconteo",[ 0 => 'No', 1 => 'Sí' ], null, ["class" => "form-control disabled"]) !!}
                            @error('status_reconteo')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>

                </div>
            </div>    
        </div>
        <div class="card card-outline card-success">
            <div class="card-header">
                <h5>Candidatos</h5>
            </div>   
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-2 col-xs-12">
                        <div class="form-group">
                            {!! Form::label("gob1", "Felipe Carreño") !!}
                            {!! Form::text("gob1", null, ["class" => "form-control disabled", 'placeholder' => 'Votos por Felipe Carreño']) !!}

                            @error('gob1')
                                <span class="text-danger">{{$message}}</span>
                            @enderror

                        </div>
                    </div>
                    <div class="col-sm-2 col-xs-12 ">
                        <div class="form-group">
                            {!! Form::label("gob2", "Candidato  2") !!}
                            {!! Form::text("gob2", null, ["class" => "form-control disabled", 'placeholder' => 'Votos por candidato 2']) !!}

                            @error('gob2')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-2 col-xs-12">
                        <div class="form-group">
                            {!! Form::label("gob3", "Candidato  3") !!}
                            {!! Form::text("gob3", null, ["class" => "form-control disabled", 'placeholder' => 'Votos por candidato 3']) !!}

                            @error('gob3')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-2 col-xs-12">
                        <div class="form-group">
                            {!! Form::label("gob4", "Candidato  4") !!}
                            {!! Form::text("gob4", null, ["class" => "form-control disabled", 'placeholder' => 'Votos por candidato 4']) !!}

                            @error('gob4')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-2 col-xs-12">
                        <div class="form-group">
                            {!! Form::label("gob5", "Candidato  5") !!}
                            {!! Form::text("gob5", null, ["class" => "form-control disabled", 'placeholder' => 'Votos por candidato 5']) !!}

                            @error('gob5')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-2 col-xs-12">
                        <div class="form-group">
                            {!! Form::label("gob6", "Candidato  6") !!}
                            {!! Form::text("gob6", null, ["class" => "form-control disabled", 'placeholder' => 'Votos por candidato 6']) !!}

                            @error('gob6')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                </div>
           
       
                <div class="row">
                    <div class="col-sm-2 col-xs-12">
                        <div class="form-group">
                            {!! Form::label("gob7", "candidato 7") !!}
                            {!! Form::text("gob7", null, ["class" => "form-control disabled", 'placeholder' => 'Votos por candicato 7']) !!}

                            @error('gob7')
                                <span class="text-danger">{{$message}}</span>
                            @enderror

                        </div>
                    </div>
                    <div class="col-sm-2 col-xs-12 ">
                        <div class="form-group">
                            {!! Form::label("nulos", "Votos Nulos") !!}
                            {!! Form::text("nulos", null, ["class" => "form-control disabled", 'placeholder' => 'Votos Nulos']) !!}

                            @error('nulos')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-2 col-xs-12">
                        <div class="form-group">
                            {!! Form::label("nomarcados", "Votos No marcados") !!}
                            {!! Form::text("nomarcados", null, ["class" => "form-control disabled", 'placeholder' => 'Votos no marcados']) !!}

                            @error('nomarcados')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-2 col-xs-12">
                        <div class="form-group">
                            {!! Form::label("enblanco", "Total Votos en blanco") !!}
                            {!! Form::text("enblanco", null, ["class" => "form-control disabled", 'placeholder' => 'Votos en blanco']) !!}

                            @error('enblanco')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-2 col-xs-12">
                        
                    </div>
                    <div class="col-sm-2 col-xs-12">
                    
                    </div>

                </div>
            </div>
        </div> 
        <div class="card card-outline card-primary">
                <div class="card-header">
                    <h5>Cargar Foto E14</h5>
                </div>    
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6 col-x-12">
                                {!! Form::label("e14", "Cargar E14") !!} <br>
                                {!! Form::file("e14", null, ["class" => "form-control disabled"]) !!} <br>

                                @error('e14')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                        </div>
                        <div class="col-sm-6 col-xs-12">
                            @if ($teller->e14 == null)

                            @else
                            <div class="row">
                                <div class="col-sm-6 col-x-12">
                                    <a  target="_blank" rel="noopener noreferrer" href="{{ asset('/storage/' . $teller->e14) }}">Ver E14 cargado</a>
                                </div>
                            </div>

                            @endif
                            
                        </div>
                    </div>
                </div>           
        </div>  
        
            
        <div class="card card-outline card-danger">
            <div class="card-header">
                <h5>Reclamaciones</h5>
            </div>    
            <div class="card-body">                
                <div class="row">
                    <div class="col-sm-3 col-xs-12">                    
                            {!! Form::label("reclamacion", "Reclamaciones en mesa") !!}
                            {!! Form::select("reclamacion",[ 0 => 'No', 1 => 'Sí' ], null, ["class" => "form-control disabled"]) !!}

                            @error('Estado')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                            <br>
                    </div>
                    <div class="col-sm-9 col-xs-12">
                        <div class="form-floating">
                            <label for="floatingTextarea">Comentarios</label>
                            <textarea class="form-control" placeholder="Describa la reclamación" id="floatingTextarea" name="observacion"> {{$teller->observacion}}</textarea>
                        </div>
                    </div>
                    
                </div>
                <div class="row">
                    <div class="col-sm-6 col-x-12">

                        {!! Form::label("fotorec", "Cargar Foto de reclamación") !!} <br>
                        {!! Form::file("fotorec", null, ["class" => "form-control disabled"]) !!} <br>

                        @error('fotorec')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-sm-6 col-xs-12">
                        <br>
                        @if ($teller->fotorec == null)
        
                        @else
                        <div class="row">
                            <div class="col-sm-6 col-xs-12">
                                <a  target="_blank" rel="noopener noreferrer" href="{{ asset('/storage/' . $teller->fotorec) }}">Ver reclamacion cargada</a>
                            </div>
                        </div>
        
                        @endif
                        <br>
                    </div>
                </div>
            </div>
        </div>




        <input type="text" value="{{Auth::user()->name}}" id="modificadopor" name="modificadopor" hidden />
        
                
       
        {!! Form::hidden('codescru', null) !!}
        {!! Form::hidden('codcor', null) !!}
        {!! Form::hidden('status', null) !!}
        <br>
        {!! Form::submit('Reportar resultados', ['class' => 'btn btn-primary']) !!}
        {!! Form::close() !!}
    </div>
</div>
@stop

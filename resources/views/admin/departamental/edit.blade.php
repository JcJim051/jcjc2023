@extends('adminlte::page')

@section('title', 'Admin')

@section('content_header')
    <h4>VOTOS REPORTADOS EN PRECONTEO EN EL PUESTO {{ $zonal->puesto}} MESA {{ $zonal->mesa}}</h4>
@stop

@section('content')

@if (session('info'))
        <div class="alert alert-success">
            <strong>{{(session('info'))}}</strong>
        </div>
@endif

<div class="card">
    <div class="card-body">
        {!! Form::model($zonal, ['route' => ['admin.zonalr.update',$zonal], 'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}

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

        
        <div class="card card-warning">
            <div class="card-header">
                <h5>Datos de la mesa</h5>
            </div>    
            <div class="card-body">
                
                <div class="row">
                    <div class="col-sm-4 col-xs-12">
                        <div class="form-group">
                            {!! Form::label("censodemesa", "Votantes en E11") !!}
                            {!! Form::text("censodemesa", null, ["class" => "form-control disabled", 'placeholder' => 'Cuantos ciudadanos pueden votar en esta mesa?','readonly' => 'readonly']) !!}

                            @error('censodemesa')
                                <span class="text-danger">{{$message}}</span>
                            @enderror

                        </div>
                    </div>
                    <div class="col-sm-4 col-xs-12 ">
                        <div class="form-group">
                            {!! Form::label("votosenurna", "Votos en la Urna") !!}
                            {!! Form::text("votosenurna", null, ["class" => "form-control disabled", 'placeholder' => 'Cuantos votos en la hay en la urna?', 'readonly' => 'readonly']) !!}

                            @error('votosenurna')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-4 col-xs-12">
                        <div class="form-group">
                            {!! Form::label("votosincinerados", "Votos Incinerados en zonal") !!}
                            {!! Form::text("votosincinerados", null, ["class" => "form-control disabled", 'placeholder' => 'Total de Votos incinerados en el zonal' ,'readonly' => 'readonly']) !!}

                            @error('votosincinerados')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>

                </div>
            </div>    
        </div>
        <div class="card card-success">
            <div class="card-header">
                <h5>Candidatos</h5>
            </div>   
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-2 col-xs-12">
                        <div class="form-group">
                            {!! Form::label("gob1", "Felipe Carreño") !!}
                            {!! Form::text("gob1", null, ["class" => "form-control disabled", 'placeholder' => 'Votos por Felipe Carreño', 'readonly' => 'readonly']) !!}

                            @error('gob1')
                                <span class="text-danger">{{$message}}</span>
                            @enderror

                        </div>
                    </div>
                    <div class="col-sm-2 col-xs-12 ">
                        <div class="form-group">
                            {!! Form::label("gob2", "Candidato  2") !!}
                            {!! Form::text("gob2", null, ["class" => "form-control disabled", 'placeholder' => 'Votos por candidato 2', 'readonly' => 'readonly']) !!}

                            @error('gob2')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-2 col-xs-12">
                        <div class="form-group">
                            {!! Form::label("gob3", "Candidato  3") !!}
                            {!! Form::text("gob3", null, ["class" => "form-control disabled", 'placeholder' => 'Votos por candidato 3','readonly' => 'readonly']) !!}

                            @error('gob3')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-2 col-xs-12">
                        <div class="form-group">
                            {!! Form::label("gob4", "Candidato  4") !!}
                            {!! Form::text("gob4", null, ["class" => "form-control disabled", 'placeholder' => 'Votos por candidato 4','readonly' => 'readonly']) !!}

                            @error('gob4')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-2 col-xs-12">
                        <div class="form-group">
                            {!! Form::label("gob5", "Candidato  5") !!}
                            {!! Form::text("gob5", null, ["class" => "form-control disabled", 'placeholder' => 'Votos por candidato 5','readonly' => 'readonly']) !!}

                            @error('gob5')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-2 col-xs-12">
                        <div class="form-group">
                            {!! Form::label("gob6", "Candidato  6") !!}
                            {!! Form::text("gob6", null, ["class" => "form-control disabled", 'placeholder' => 'Votos por candidato 6' ,'readonly' => 'readonly']) !!}

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
                            {!! Form::text("gob7", null, ["class" => "form-control disabled", 'placeholder' => 'Votos por candicato 7','readonly' => 'readonly']) !!}

                            @error('gob7')
                                <span class="text-danger">{{$message}}</span>
                            @enderror

                        </div>
                    </div>
                    <div class="col-sm-2 col-xs-12 ">
                        <div class="form-group">
                            {!! Form::label("nulos", "Votos Nulos") !!}
                            {!! Form::text("nulos", null, ["class" => "form-control disabled", 'placeholder' => 'Votos Nulos','readonly' => 'readonly']) !!}

                            @error('nulos')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-2 col-xs-12">
                        <div class="form-group">
                            {!! Form::label("nomarcados", "Votos No marcados") !!}
                            {!! Form::text("nomarcados", null, ["class" => "form-control disabled", 'placeholder' => 'Votos no marcados', 'readonly' => 'readonly']) !!}

                            @error('nomarcados')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-2 col-xs-12">
                        <div class="form-group">
                            {!! Form::label("enblanco", "Total Votos en blanco") !!}
                            {!! Form::text("enblanco", null, ["class" => "form-control disabled", 'placeholder' => 'Votos en blanco', 'readonly' => 'readonly']) !!}

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
        <div class="card card-primary">
                <div class="card-header">
                    <h5>Cargar Foto E14</h5>
                </div>    
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6 col-xs-12">
                            @if ($zonal->e14 == null)
                            <p>No Cargado!</p>
                            @else
                            <div class="row">
                                <div class="col-sm-6 col-x-12">
                                    <a  target="_blank" rel="noopener noreferrer" href="{{ asset('/storage/' . $zonal->e14) }}">Ver E14 cargado</a>
                                </div>
                            </div>

                            @endif
                            
                        </div>
                    </div>
                </div>           
        </div>  
        
            
        <div class="card card-danger">
            <div class="card-header">
                <h5>Reclamaciones</h5>
            </div>    
            <div class="card-body">                
                <div class="row">
                    <div class="col-sm-6 col-xs-12">
                        <br>
                        @if ($zonal->fotorec == null)
                        <p>Sin reclamacion</p>
                        @else
                        <div class="row">
                            <div class="col-sm-6 col-xs-12">
                                <a  target="_blank" rel="noopener noreferrer" href="{{ asset('/storage/' . $zonal->fotorec) }}">Ver reclamacion cargada</a>
                            </div>
                        </div>
        
                        @endif
                         
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

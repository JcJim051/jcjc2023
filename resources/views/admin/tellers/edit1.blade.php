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

       
       <div class="row">
            <div class="col-12">
                {!! Form::label("e14", "Cargar E14") !!} <br>
                {!! Form::file("e14", null, ["class" => "form-control disabled"]) !!} <br>

                          
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
            @if ($teller->reclamacion == 1)
                <div class="col-12">
                    {!! Form::label("fotorec", "Cargar Foto de reclamación") !!} <br>
                            {!! Form::file("fotorec", null, ["class" => "form-control disabled"]) !!} <br>

                        
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
            @else
                
            @endif
            

       </div>
      
       
                            
                         
                           

                          
                           
                          
                            

                          
                          
                   
                           





        <input type="text" value="{{Auth::user()->name}}" id="modificadopor" name="modificadopor" hidden />
        
                
       
        {!! Form::hidden('codescru', null) !!}
        {!! Form::hidden('codcor', null) !!}
        {!! Form::hidden('status', null) !!}
       <br>
        {!! Form::submit('Enviar Fotos', ['class' => 'btn btn-primary']) !!}
        {!! Form::close() !!}
    </div>
</div>
@stop

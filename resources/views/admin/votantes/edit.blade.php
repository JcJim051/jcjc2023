@extends('adminlte::page')

@section('title', 'Admin')

@section('content_header')
    <h4> REPORTE DE VOTOS <br> {{ $votante->puesto}} MESA {{ $votante->mesa}}</h4>
@stop

@section('content')

@if (session('info'))
        <div class="alert alert-success">
            <strong>{{(session('info'))}}</strong>
        </div>
@endif

<div class="card">
    <div class="card-body">
        {!! Form::model($votante, ['route' => ['admin.votantes.update',$votante], 'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}
       
        
        <div class="card card-outline card-success">
            <div class="card-header">
                <h5>Datos de la mesa</h5>
            </div>    
            <div class="card-body">
                
                <div class="row">
                    <div class="col-sm-4 col-xs-12">
                        <div class="form-group">
                            {!! Form::label("reporte_1", "# de votante hasta las  9 am") !!}
                            {!! Form::text("reporte_1", null, ["class" => "form-control disabled  ", 'placeholder' => 'Cuantos ciudadanos han votado en esta mesa?']) !!}

                            @error('reporte_1')
                                <span class="text-danger">{{$message}}</span>
                            @enderror

                        </div>
                    </div>
                    <div class="col-sm-4 col-xs-2 ">
                        <div class="form-group">
                            {!! Form::label("reporte_2", "# de votante hasta las  11 am") !!}
                            {!! Form::text("reporte_2", null, ["class" => "form-control disabled  ", 'placeholder' => 'Cuantos ciudadanos han votado en esta mesa?']) !!}

                            @error('votosenurna')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-4 col-xs-12">
                        <div class="form-group">
                            {!! Form::label("reporte_3", "# de votante hasta las  2 pm") !!}
                            {!! Form::text("reporte_3", null, ["class" => "form-control disabled  ", 'placeholder' => 'Cuantos ciudadanos han votado en esta mesa?']) !!}

                            @error('votosincinerados')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    

                </div>
            </div>    
        </div>
       
        




        <input type="text" value="{{Auth::user()->name}}" id="modificadopor" name="modificadopor" hidden />
        
        {!! Form::submit('Reportar Afluencia', ['class' => 'btn btn-success']) !!}
        {!! Form::close() !!}
    </div>
</div>
@stop

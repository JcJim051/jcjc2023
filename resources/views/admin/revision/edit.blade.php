@extends('adminlte::page')

@section('title', 'Admin')

@section('content_header')

    <h1> Confirmar Cambios E24 - {{ $superuser[0]->puesto}} MESA {{ $superuser[0]->mesa}}</h1>


@stop

@section('content')

@if (session('info'))
        <div class="alert alert-success">
            <strong>{{(session('info'))}}</strong>
        </div>
@endif

<div class="card ">
    <div class="card-body">
        {!! Form::model($superuser[0], ['route' => ['admin.revision.update',$ani], 'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}
        <div class="card card-outline card-warning">
            <div class="card-body">
            
                <div class="row">
                    <div class="col-sm-4 col-xs-12">
                        <div class="form-group"> {{-- A continuacion se usa laravel collective para crar el formulario --}}
                            {!! Form::label("gob1", "Votos en E14") !!} <br>
                            <input type="text" class="form-control" readonly="readonly" value="{{$superuser[0]->gob1}}">
                
                            @error('gob1')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                
                        </div>
                    </div>
                    <div class="col-sm-4 col-xs-12">
                        <div class="form-group"> {{-- A continuacion se usa laravel collective para crar el formulario --}}
                            {!! Form::label("recuperados", "Recuperados") !!}
                            {!! Form::text("recuperados", null, ["class" => "form-control", 'placeholder' => 'numero de votos recuperados']) !!}
                
                            @error('recuperados')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                
                        </div>
                    </div>
                    
                
                    <div class="col-sm-3 col-xs-12 ">
                            <div class="form-group">
                            {!! Form::label("statusrec", "Validacion Realizada") !!}
                            {!! Form::select("statusrec",[ 0 => 'Pendiente', 1 => 'Listo' ], null, ["class" => "form-control disabled"]) !!}
    
                            @error('statusrec')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
    
                        </div>
                    </div>
                </div>
            </div>
        </div>

        
            

        {!! Form::hidden('coddep', null) !!}
        {!! Form::hidden('codmun', null) !!}
        {!! Form::hidden('codzon', null) !!}
        {!! Form::hidden('codpuesto', null) !!}
        {!! Form::hidden('departamento', null) !!}
        {!! Form::hidden('municipio', null) !!}
        {!! Form::hidden('puesto', null) !!}
        {!! Form::hidden('mesa', null) !!}
        {!! Form::hidden('codpar', null) !!}
        {!! Form::hidden('status', null) !!}



       

      


       
     
              




            
        <br>
        {!! Form::submit('Guardar revision', ['class' => 'btn btn-info']) !!}
                





        {!! Form::close() !!}
    </div>
</div>
@stop
@section('js')
    <script> console.log('de tu mano señor!'); </script>
    <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });
    </SCript>
@endsection








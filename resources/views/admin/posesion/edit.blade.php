@extends('adminlte::page')

@section('title', 'Admin')

@section('content_header')

    <h1> ASISTENCIA DE TESTIGO - {{ $superuser[0]->puesto}} MESA {{ $superuser[0]->mesa}}</h1>


@stop

@section('content')

@if (session('info'))
        <div class="alert alert-success">
            <strong>{{(session('info'))}}</strong>
        </div>
@endif

<div class="card ">
    <div class="card-body">
        {!! Form::model($superuser[0], ['route' => ['admin.superusers.update',$ani], 'method' => 'PUT']) !!}
        <div class="card card-outline card-warning">
            <div class="card-body">
            
                <div class="row">
                    <div class="col-8">
                        <label for=""> Nombre del testigo acreditado.</label><br>
                        @if ($superuser[0]->nombre == null)
                            Sin testigo acreditado para esta mesa
                        @else
                            {{$superuser[0]->nombre}}                        
                        @endif
                       
                    </div>
                
                    <div class="col-4">
                            <div class="form-group">
                            {!! Form::label("statusasistencia", "¿El testigo esta en la mesa?") !!}
                            {!! Form::select("statusasistencia",[ 0 => 'NO', 1 => 'SI' ], null, ["class" => "form-control disabled"]) !!}
    
                            @error('Estado')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
    
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card card-outline card-danger">
            <div class="card-body">
            
                <div class="row">
                    <div class="col-8">
                        <label for=""> ¿Se acredito un remanente en esta mesa?</label><br>
                       
                       
                    </div>
                
                    <div class="col-4">
                            <div class="form-group">
                            {!! Form::label("remenmesa", "¿Remanente?") !!}
                            {!! Form::select("remenmesa",[ 0 => 'NO', 1 => 'SI' ], null, ["class" => "form-control disabled"]) !!}
    
                            @error('Estado')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
    
                        </div>
                    </div>
                </div>
            </div>
        </div>

        
            

     
                    <br>
                    {!! Form::submit('Reportar Asistencia', ['class' => 'btn btn-info']) !!}
                





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








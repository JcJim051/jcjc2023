@extends('adminlte::page')

@section('title', 'Admin')

@section('content_header')

    <h1> Validacion Ani - {{ $superuser[0]->puesto}} MESA {{ $superuser[0]->mesa}}</h1>

    <style>
          #pdf-viewer {
            width: 100%;
            height: 505px;
        }
    </style>
@stop

@section('content')

@if (session('info'))
        <div class="alert alert-success">
            <strong>{{(session('info'))}}</strong>
        </div>
@endif

        <div class="container" style="">
            <div class="card card-outline card-warning">
                <div class="card-body">
                    {!! Form::model($superuser[0], ['route' => ['admin.superusers.update',$ani], 'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}                   
                    <div class="form-group">
                        <div class="row">
                            <div class="col-4">
                                {!! Form::label("statusani", "Proceso de Validacion") !!}
                                
                            </div>
                            <div class="col-6">
                                
                                {!! Form::text("observacion", null, ["class" => "form-control", 'placeholder' => 'observacion corta']) !!}
            
        
                            </div>
                            <div class="col-2">
                                {!! Form::select("statusani",[ 0 => 'Pendiente', 1 => 'Listo' ], null, ["class" => "form-control disabled"]) !!}
        
                            </div>
                        </div>
                    
    
                    @error('Estado')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
    
                            
                    </div>
                </div>
            </div>
            
            <div class="row">
                
                <div class="col-6">
                    <div class="card ">
                        <div class="card-body">
                           
                           
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
            
            
            
                                <div class="row" >
                                    <div class="col-9">
                                        <label for=""> Puesto de votacion </label><br>
                                        <select class="form-control js-example-basic-single" name="dondevota" style="width: 80%;">
                                        
                                        <option value="{{$superuser[0]->dondevota}}">{{$superuser[0]->puestos->nombre}}</option>
                                        
                                            
                                        
                                        @foreach ($puestos as $puesto)
                                            <option value="{{$puesto->codpuesto}}"> {{$puesto->nombre}}</option>
                                        @endforeach
                                        
                                        
                                    </select>
                                    </div>
                                
            
                                
            
            
                                </div>
            
            
                                
                                        <br>
                                        {!! Form::submit('Guardar Validacion', ['class' => 'btn btn-info']) !!}
                                    
            
            
            
            
            
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div id="pdf-viewer">
                        <iframe src="{{ asset('/storage/' . $superuser[0]->pdf) }}" width="100%" height="100%" frameborder="0"></iframe>
                    </div>
                </div>
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








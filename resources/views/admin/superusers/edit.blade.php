@extends('adminlte::page')

@section('title', 'Admin')

@section('content_header')

    <h1> {{ $superuser->puesto}} MESA {{ $superuser->mesa}}</h1>


@stop

@section('content')

@if (session('info'))
        <div class="alert alert-success">
            <strong>{{(session('info'))}}</strong>
        </div>
@endif
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="card">
    <div class="card-body">
        {!! Form::model($superuser, ['route' => ['admin.superusers.update',$superuser], 'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}
        @csrf
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
            {!! Form::text("nombre", null, ["class" => "form-control", 'placeholder' => 'Ingrese su nombre','required' => 'required']) !!}

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
                {!! Form::label("cedula", "Cédula") !!}
                {!! Form::text("cedula", null, ["class" => "form-control disabled", 'placeholder' => 'Ingrese su cédula', 'required' => 'required' ]) !!}

                @error('cedula')
                    <span class="text-danger">{{$message}}</span>
                @enderror

            </div>

            <div class="form-group">
                {!! Form::label("email", "Email") !!}
                {!! Form::text("email", null, ["class" => "form-control disabled", 'placeholder' => 'Ingrese su email','required' => 'required']) !!}

                @error('email')
                    <span class="text-danger">{{$message}}</span>
                @enderror

            </div>
            
            <div class="card card-outline card-warning">
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-sm-6 ">
                            {!! Form::label("telefono", "Telefono") !!}
                            {!! Form::text("telefono", null, ["class" => "form-control disabled", 'placeholder' => 'Ingrese su telefono', 'required' => 'required']) !!}
            
                            @error('telefono')
                                <span class="text-danger">{{$message}}</span>
                            @enderror    
                        </div>
                        <div class="col-sm-5 col-xs-12">
                            <label for=""> Puesto de votación </label><br>
                            <select class="js-example-basic-single form-control" name="dondevota" style="width: 100%;" required>
                            
                            <option value="{{$superuser->dondevota}}">{{$superuser->puestos->nombre}}</option>
                            
                                
                            
                            @foreach ($puestos as $puesto)
                                <option value="{{$puesto->codpuesto}}"> {{$puesto->nombre}}</option>
                            @endforeach
                            
                            
                            </select>
                        </div>
                        {{-- <div class="form-group col-sm-6">
                            {!! Form::label("banco", "Banco") !!}
                            {!! Form::select("banco",[ null => 'Seleccione un banco','Otro' => 'Otro', 'Nequi' => 'Nequi', 'Daviplata' => 'Daviplata',  'Ahorro_a_la_mano' => 'Ahorro a la mano' ], null, ["class" => "form-control disabled", 'required' => 'required' ]) !!}
            
                            @error('telefono')
                                <span class="text-danger">{{$message}}</span>
                            @enderror    
                        </div> --}}
                    </div>
        
                </div>
            </div>
            


            <div class="row">
               
                <div class="col-sm-5 col-xs-12">

                        {!! Form::label("pdf", "Pdf Cédula (max 2 mb)") !!} <br>
                        {!! Form::file("pdf", null, ["class" => "form-control disabled", 'required' => 'required',  'accept' => '.pdf' ]) !!}

                        @error('pdf')
                            <span class="text-danger">El Archivo supero el peso, favor Comprimalo</span>
                        @enderror
                </div>

                <div class="col-sm-2 col-xs-12">
                    <label for="">Documento cargado</label>
                    <br>
                    @if ($superuser->pdf == null)
                        Sin cargar
                    @else
                        <a target="_blank" rel="noopener noreferrer" href="{{ $pdfUrl }}">Ver adjunto</a>
                    @endif
                </div>
                


            </div>

            




            <input type="text" value="{{Auth::user()->name}}" id="modificadopor" name="modificadopor" hidden />




            @can('no-editar')
                <div class="form-group">
                    {!! Form::label("status", "Estado") !!}
                    {!! Form::select("status",[ 0 => 'Pendiente', 1 => 'Listo' ], null, ["class" => "form-control disabled"]) !!}

                    @error('Estado')
                        <span class="text-danger">{{$message}}</span>
                    @enderror

                </div>
                {!! Form::submit('Acreditar Testigo', ['class' => 'btn btn-info']) !!}
            @endcan





        {!! Form::close() !!}
    </div>
</div>
@stop
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

@endsection
@section('js')
    <script> console.log('de tu mano señor!'); </script>
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    
    <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });
    </script>

    <script>
        document.getElementById('pdfInput').addEventListener('change', function () {
            const file = this.files[0];
            const maxSize = 2 * 1024 * 1024; // 2 MB
        
            if (!file) return;
        
            // Validar tipo
            if (file.type !== 'application/pdf') {
                alert('El archivo debe estar en formato PDF.');
                this.value = '';
                return;
            }
        
            // Validar tamaño
            if (file.size > maxSize) {
                alert('El archivo no puede pesar más de 2 MB.');
                this.value = '';
                return;
            }
        });
    </script>
    
    
@endsection








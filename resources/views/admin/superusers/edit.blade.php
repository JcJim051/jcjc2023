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

<div class="card">
    <div class="card-body">
        {!! Form::model($superuser, ['route' => ['admin.superusers.update',$superuser], 'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}

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
                        <div class="form-group col-sm-6">
                            {!! Form::label("banco", "Banco") !!}
                            {!! Form::select("banco",[ null => 'Seleccione un banco','Nequi' => 'Nequi', 'Daviplata' => 'Daviplata',  'Ahorro_a_la_mano' => 'Ahorro a la mano' ], null, ["class" => "form-control disabled", 'required' => 'required' ]) !!}
            
                            @error('telefono')
                                <span class="text-danger">{{$message}}</span>
                            @enderror    
                        </div>
                    </div>
        
                </div>
            </div>
            


            <div class="row">
                <div class="col-sm-5 col-xs-12">
                    <label for=""> Puesto de votación </label><br>
                    <select class="js-example-basic-single form-select" name="dondevota" style="width: 95%;" required>
                    
                    <option value="{{$superuser->dondevota}}">{{$superuser->puestos->nombre}}</option>
                    
                        
                    
                    @foreach ($puestos as $puesto)
                        <option value="{{$puesto->codpuesto}}"> {{$puesto->nombre}}</option>
                    @endforeach
                    
                    
                </select>
                </div>
                <div class="col-sm-5 col-xs-12">

                        {!! Form::label("pdf", "Pdf Cédula") !!} <br>
                        {!! Form::file("pdf", null, ["class" => "form-control disabled", 'required' => 'required' ]) !!}

                        @error('pdf')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                </div>

                <div class="col-sm-2 col-xs-12">

                    <label for="">Documento cargado</label>
                    <br>
                    @if ($superuser->pdf == null)
                        Sin cargar
                    @else
                    <a  target="_blank" rel="noopener noreferrer" href="{{ asset('/storage/' . $superuser->pdf) }}">Ver adjunto</a>
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
@section('js')
    <script> console.log('de tu mano señor!'); </script>
    <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });
    </SCript>
@endsection








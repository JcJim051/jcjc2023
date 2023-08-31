@extends('adminlte::page')

@section('title', 'Admin')

@section('content_header')
       <h4> REPORTE DE FOTOS  <span style="color:rgb(50, 135, 205)">{{ $teller->puesto}} MESA {{ $teller->mesa}}</span> </h4>
       <!-- Agrega este script en la sección <head> de tu página -->
       

@stop

@section('content')

@if (session('info'))
        <div class="alert alert-success">
            <strong>{{(session('info'))}}</strong>
        </div>
@endif

<div class="card">
    <div class="card-body">
        {!! Form::model($teller, ['route' => ['fotos',$teller], 'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}

        {!! Form::hidden('id', null) !!}
       
       
       <div class="row">
            {{-- <div class="col-12">
                {!! Form::label("e14", "Cargar E14") !!} <br>
                {!! Form::file("e14", null, ["class" => "form-control disabled", 'data-teller' => $teller->id]) !!}<br>
              
                          
                   
                              
            </div> --}}

            <div class="col-12">
                <div class="row">
                    <div class="col-12">
                        {!! Form::open(['route' => 'fotos', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                            {!! Form::label("e14", "Cargar E14 hoja 1") !!} <br>
                            {!! Form::file("e14", ["class" => "fole-control disabled", 'data-teller' => $teller->id, 'id' => 'e14Input', 'onchange' => 'handleImageUpload("e14Input", "e14Preview", "e14Resized")']) !!}<br>
                            <img hidden id="e14Preview" src="" alt="E14 Preview" style="max-width: 300px; max-height: 300px;"><br>
                            {!! Form::hidden("e14_resized", "", ['id' => 'e14Resized']) !!} <!-- Campo oculto para la imagen redimensionada -->
                       
                    </div> 
                    <div class="col-sm-6 col-xs-12">
                        @if ($teller->e14 == null)

                        @else
                        <div class="row">
                            <div class="col-sm-6 col-x-12">
                                <a  target="_blank" rel="noopener noreferrer" href="{{ asset('/storage/' . $teller->e14) }}">Ver E14 Hoja 1</a>
                            </div>
                        </div>

                        @endif
                        
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="row">
                    <div class="col-12">
                      
                            {!! Form::label("e14_2", "Cargar E14 hoja 2") !!} <br>
                            {!! Form::file("e14_2", ["class" => "fole-control disabled", 'data-teller' => $teller->id, 'id' => 'e14_2Input', 'onchange' => 'handleImageUpload("e14_2Input", "e14_2Preview", "e14_2Resized")']) !!}<br>
                            <img hidden id="e14_2Preview" src="" alt="e14_2 Preview" style="max-width: 300px; max-height: 300px;"><br>
                            {!! Form::hidden("e14_2_resized", "", ['id' => 'e14_2Resized']) !!} <!-- Campo oculto para la imagen redimensionada -->
                       
                    </div> 
                    <div class="col-sm-6 col-xs-12">
                        @if ($teller->e14_2 == null)

                        @else
                        <div class="row">
                            <div class="col-sm-6 col-x-12">
                                <a  target="_blank" rel="noopener noreferrer" href="{{ asset('/storage/' . $teller->e14_2) }}">Ver E14 hoja 2</a>
                            </div>
                        </div>

                        @endif
                        
                    </div>
                </div>
            </div>
            

            
            @if ($teller->reclamacion == 1)
                <div class="col-12">
                    

                            {!! Form::label("fotorec", "Cargar fotorec") !!} <br>
                            {!! Form::file("fotorec", ["class" => "file-control disabled", 'data-teller' => $teller->id, 'id' => 'fotorecInput', 'onchange' => 'handleImageUpload("fotorecInput", "fotorecPreview", "fotorecResized")']) !!}<br>
                            <img hidden id="fotorecPreview" src="" alt="fotorec Preview" style="max-width: 300px; max-height: 300px;">
                            {!! Form::hidden("fotorec_resized", "", ['id' => 'fotorecResized']) !!} <!-- Campo oculto para la imagen redimensionada -->
                            
                            
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
            {!! Form::submit('Enviar Fotos', ['class' => 'btn btn-primary']) !!} <!-- Botón de envío -->
            {!! Form::close() !!}

       </div>

      
        <input type="text" value="{{Auth::user()->name}}" id="modificadopor" name="modificadopor" hidden />
        
                
       
        {!! Form::hidden('codescru', null) !!}
        {!! Form::hidden('codcor', null) !!}
        {!! Form::hidden('status', null) !!}
       <br>
       
        {!! Form::close() !!}
    </div>
</div>
@stop


@section('js')
<script> console.log('de tu mano señor!'); </script>
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pica/5.0.0/pica.min.js"></script>
 
{{-- <script>
    function handleImageUpload() {
        const e14Input = document.getElementById('e14Input');
        const e14Preview = document.getElementById('e14Preview');
        const e14Resized = document.getElementById('e14Resized');
        const file = e14Input.files[0];
        

        if (file) {
            const reader = new FileReader();

            reader.onload = function (e) {
                const img = new Image();
                img.src = e.target.result;

                img.onload = function () {
                    const targetWidth = 800; // Adjust the desired width
                    const targetHeight = img.height * (targetWidth / img.width);

                    const canvas = document.createElement('canvas');
                    canvas.width = targetWidth;
                    canvas.height = targetHeight;

                    const ctx = canvas.getContext('2d');
                    ctx.drawImage(img, 0, 0, targetWidth, targetHeight);

                    pica().resize(canvas, e14Preview, {
                        quality: 0.7,
                    });

                    // Convert the resized image to data URL and set it to the hidden input field
                    canvas.toBlob(function (blob) {
                        const reader = new FileReader();
                        reader.onload = function () {
                            e14Resized.value = reader.result;
                        };
                        reader.readAsDataURL(blob);
                    });
                };
            };
          
            reader.readAsDataURL(file,);
        }
    }
</script> --}}
<script>
    function handleImageUpload(inputId, previewId, resizedId) {
        const input = document.getElementById(inputId);
        const preview = document.getElementById(previewId);
        const resized = document.getElementById(resizedId);
        const file = input.files[0];

        if (file) {
            const reader = new FileReader();

            reader.onload = function (e) {
                const img = new Image();
                img.src = e.target.result;

                img.onload = function () {
                    const targetWidth = 800; // Ajustar el ancho deseado
                    const targetHeight = img.height * (targetWidth / img.width);

                    const canvas = document.createElement('canvas');
                    canvas.width = targetWidth;
                    canvas.height = targetHeight;

                    const ctx = canvas.getContext('2d');
                    ctx.drawImage(img, 0, 0, targetWidth, targetHeight);

                    pica().resize(canvas, preview, {
                        quality: 0.7,
                    });

                    // Convertir la imagen redimensionada en una URL de datos y establecerla en el campo de entrada oculto
                    canvas.toBlob(function (blob) {
                        const reader = new FileReader();
                        reader.onload = function () {
                            resized.value = reader.result;
                        };
                        reader.readAsDataURL(blob);
                    });
                };
            };
          
            reader.readAsDataURL(file);
        }
    }
</script>



@endsection  


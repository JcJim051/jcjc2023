@extends('adminlte::page')

@section('title', 'Admin')

@section('content_header')
       <h4> REPORTE FOTO 2  <span style="color:rgb(50, 135, 205)">{{ $foto->puesto}} MESA {{ $foto->mesa}}</span> </h4>
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
       
       
       
       <div class="row">
           


            <div class="col-12">
                <div class="row">
                    <div class="col-12">
                        {!! Form::open(['route' => 'segundafoto', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                            {!! Form::label("e14_2", "Cargar E14 hoja 2") !!} <br>
                            {!! Form::file("e14_2", ["class" => "fole-control disabled", 'data-foto' => $foto->id, 'id' => 'e14_2Input', 'onchange' => 'handleImageUpload("e14_2Input", "e14_2Preview", "e14_2Resized")']) !!}<br>
                            <img hidden id="e14_2Preview" src="" alt="e14_2 Preview" style="max-width: 300px; max-height: 300px;"><br>
                            {!! Form::hidden("e14_2_resized", "", ['id' => 'e14_2Resized']) !!} <!-- Campo oculto para la imagen redimensionada -->
                       
                    </div> 
                    <div class="col-sm-6 col-xs-12">
                        
                        @if ($foto->e14_2 == null)

                        @else
                        <div class="row">
                            <div class="col-sm-6 col-x-12">
                                <a  style="font-size: 20px" target="_blank" rel="noopener noreferrer" href="{{ asset('/storage/' . $foto->e14_2) }}">Ver E14 hoja 2 Cargado</a>
                            </div>
                        </div>

                        @endif
                        <br>
                    </div>
                    
                </div>
            </div>
            

            
           
            <input hidden type="text" value="{{$foto->id}}" id="id" name="id">
            <input type="text" value="{{Auth::user()->name}}" id="modificadopor" name="modificadopor" hidden />
            @if ($foto->e14_2 == null)
                {!! Form::submit('Enviar Fotos', ['class' => 'btn btn-primary']) !!} <!-- Botón de envío -->
            @else
                {!! Form::submit('Siguiente', ['class' => 'btn btn-primary']) !!} <!-- Botón de envío -->
            @endif
            
            {!! Form::close() !!}

       </div>

      
        
        
                
       
        
    </div>
</div>
@stop


@section('js')
<script> console.log('de tu mano señor!'); </script>
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pica/5.0.0/pica.min.js"></script>
 

{{-- <script>
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
                    const targetWidth = 300; // Ajustar el ancho deseado
                    const targetHeight = img.height * (targetWidth / img.width);

                    const canvas = document.createElement('canvas');
                    canvas.width = targetWidth;
                    canvas.height = targetHeight;

                    const ctx = canvas.getContext('2d');
                    ctx.drawImage(img, 0, 0, targetWidth, targetHeight);

                    pica().resize(canvas, preview, {
                        quality: 0.3,
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
                    
                    // Dibuja la imagen en blanco y negro
                    ctx.drawImage(img, 0, 0, targetWidth, targetHeight);
                    const imageData = ctx.getImageData(0, 0, targetWidth, targetHeight);
                    const data = imageData.data;
                    for (let i = 0; i < data.length; i += 4) {
                        const grayscale = (data[i] + data[i + 1] + data[i + 2]) / 3;
                        data[i] = grayscale;
                        data[i + 1] = grayscale;
                        data[i + 2] = grayscale;
                    }
                    ctx.putImageData(imageData, 0, 0);

                    pica().resize(canvas, preview, {
                        quality: 0.5,
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


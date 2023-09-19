@extends('adminlte::page')

@section('title', 'Admin')

@section('content_header')
       <h4> REPORTE FOTO 3  <span style="color:rgb(50, 135, 205)">{{ $foto->puesto}} MESA {{ $foto->mesa}}</span> </h4>
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
                {!! Form::open(['route' => 'reclamacion', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                            {!! Form::label("fotorec", "Cargar foto de la reclamacion") !!} <br>
                            {!! Form::file("fotorec", ["class" => "file-control disabled", 'data-foto' => $foto->id, 'id' => 'fotorecInput', 'onchange' => 'handleImageUpload("fotorecInput", "fotorecPreview", "fotorecResized")']) !!}<br>
                            <img hidden id="fotorecPreview" src="" alt="fotorec Preview" style="max-width: 300px; max-height: 300px;">
                            {!! Form::hidden("fotorec_resized", "", ['id' => 'fotorecResized']) !!} <!-- Campo oculto para la imagen redimensionada -->
                            
                            
                            <div class="col-sm-6 col-xs-12">
                            <br>
                                @if ($foto->fotorec == null)
                
                                @else
                                <div class="row">
                                    <div class="col-sm-6 col-xs-12">
                                        <a  style="font-size: 20px" target="_blank" rel="noopener noreferrer" href="{{ asset('/storage/' . $foto->fotorec) }}">Ver reclamacion cargada</a>
                                    </div>
                                </div>
                
                                @endif
                            <br>
                        </div>
                       
                </div> 
           
                    <input hidden type="text" value="{{$foto->id}}" id="id" name="id">
                    <input type="text" value="{{Auth::user()->name}}" id="modificadopor" name="modificadopor" hidden />
                    @if ($foto->fotorec == null)
                        {!! Form::submit('Enviar Foto', ['class' => 'btn btn-primary']) !!} <!-- Botón de envío -->
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
</script>



@endsection  


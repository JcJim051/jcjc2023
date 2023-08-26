@section('plugins.Datatables', true)
@extends('adminlte::page')

@section('title', 'Acreditar')

@section('content_header')
    {{--  <a href="{{route('admin.validacion.create')}}" class="float-right btn btn-secondary btn-sm">Agregar vendedor</a>  --}}
    <h1 style="text-align:center">Carga de fotos con asignacion Automatica</h1>
@stop

@section('content') 
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{(session('info'))}}</strong>
        </div>
    @endif

    <div class="card">
        <div class="container-fluid">
            <div class="row">
              <div class=" col-12-xs col-6-sm">
                <div class="card" >
                  <div class="card-body">
                    <img id="imageOriginal" src="" alt="Subir Fotos E14" class="card-img-top">
                  </div>
                  <div class="card-footer text-muted">
                    <input type="file" id="imageInput" name="file" accept=".jpeg, .jpg" />
                  </div>
                </div>
              </div>
            </div>
           
  
            <div id="reader"></div>
          </div>
       
        </div>  
    </div>



@stop

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.dataTables.min.css">
@endsection



@section('js')
    <script> console.log('de tu mano señor!'); </script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.print.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
    integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
    integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
    crossorigin="anonymous"></script>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.0.2/dist/sweetalert2.all.min.js"></script>

  <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>

  <script type="text/javascript">
    document.body.classList.add("loading");
    var nombFile;
    var codQR;
    
    

    let imgElement = document.getElementById('imageOriginal');
    let inputElement = document.getElementById('imageInput');

    // Función para verificar si la cookie existe
    function isFileProcessed(fileName) {
      const cookieValue = getCookie(fileName);
      return cookieValue === 'true';
    }

    // Función para crear una cookie con una fecha de vencimiento
    function setCookie(name, value, days) {
      const expires = new Date();
      expires.setTime(expires.getTime() + days * 24 * 60 * 60 * 1000);
      document.cookie = `${name}=${value};expires=${expires.toUTCString()};path=/`;
    }

    // Función para leer una cookie
    function getCookie(name) {
      const cookieName = `${name}=`;
      const decodedCookie = decodeURIComponent(document.cookie);
      const cookieArray = decodedCookie.split(';');
      for (let i = 0; i < cookieArray.length; i++) {
        let cookie = cookieArray[i];
        while (cookie.charAt(0) === ' ') {
          cookie = cookie.substring(1);
        }
        if (cookie.indexOf(cookieName) === 0) {
          return cookie.substring(cookieName.length, cookie.length);
        }
      }
      return null;
    }

    // Función para obtener la imagen en base64 desde el elemento img
    function getBase64FromImgElement(imgElement) {
      let canvas = document.createElement("canvas");
      canvas.width = imgElement.width;
      canvas.height = imgElement.height;

      let ctx = canvas.getContext("2d");
      ctx.drawImage(imgElement, 0, 0, canvas.width, canvas.height);
      let calidad = 0.7;

      let myFoto = canvas.toDataURL("image/jpeg", calidad); // Puedes cambiar "image/jpeg" según el formato de imagen que desees.
      return myFoto.split('base64,')[1]
      
   
    }

    function deleteCookie(name) {
      document.cookie = `${name}=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;`;
    }

    
    inputElement.addEventListener('change', (e) => {
      imgElement.src = '';
      imgElement.src = URL.createObjectURL(e.target.files[0]);

      const image = document.getElementById("imageInput").files[0];
      nombFile = document.getElementById("imageInput").files[0].name;

      const file = event.target.files[0];
      if (file) {
        const fileName = file.name;

        if (isFileProcessed(fileName)) {
          document.getElementById('imageOriginal').src = '';
          document.getElementById('imageInput').value = '';

          alert('Este archivo ya ha sido procesado.');
          return
        } else {
          imgElement.src = URL.createObjectURL(e.target.files[0]);

          const image = document.getElementById("imageInput").files[0];
          nombFile = document.getElementById("imageInput").files[0].name;

          // Crear una instancia de Html5Qrcode
          var html5Qrcode = new Html5Qrcode("reader");

          // Leer el código QR del archivo
          html5Qrcode.scanFile(image, true)
        .then(function (result) {
        // Mostrar el resultado del escaneo
        console.log("El código QR dice: " + result);

        // Extraer los dígitos del 5 al 14 del código QR
        let idDigits = result.substring(4, 14);

         // Mostrar el resultado del escaneo
         console.log("El código de la mesa es: " + idDigits);
         
         const base64Image = getBase64FromImgElement(imgElement);

            // Preparar los datos a enviar en la solicitud fetch
            const requestData = {
                idDigits: idDigits,
                image: base64Image
            };

        // Realizar una petición al servidor para actualizar registros
        const actualizarRegistrosUrl = "{{ route('actualizarRegistros') }}";
        fetch(actualizarRegistrosUrl, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ idDigits: idDigits ,image: base64Image})
        })
        .then(response => response.json())
        .then(data => {
            console.log(data.message);
        })
        .catch(error => {
            console.error('Error al actualizar registros:', error);
        });

        // Limpiar el div reader
        html5Qrcode.clear();
    })
    .catch(function (error) {
        // Mostrar el error si ocurre
        alert("Ocurrió un error: " + error);
    });

          // Crear una cookie para indicar que el archivo se procesó
          setCookie(fileName, 'true', 30); // Establece la cookie por 30 días
          console.log('Archivo procesado y cookie creada.');
        }
      }
    }, false);

  </script>
    


   
@endsection







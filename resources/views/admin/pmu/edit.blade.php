@extends('adminlte::page')

@section('title', 'Admin')

@section('content_header')
    <style>
        .card-small {
        height: 99%;
        width: 100%;
        }
        .reporte{
            max-height: 100%; 
        }
        .e14 {
        max-width: 100%;
        overflow: hidden;
        }

        .e14 img {
        width: 100%;
        height: auto;
        }
       /* public/css/styles.css */
       .table {
        table-layout: fixed; /* Fijar el ancho de las celdas de la tabla */
        }
        .id-cell{
        width: 10%; /* Esto es equivalente al ancho de col-xs-3 */
        
         }
       .votos-cell {
        width: 23%; /* Esto es equivalente al ancho de col-xs-3 */
        block-size: 0%;
         }
        .table-container {
            width: 100%;
            border-collapse: collapse;
            border: 1px solid #ccc;
        }

        .table-container th, .table-container td {
            border: 1px solid #ccc;
            padding: 1px;
            text-align: center;
        }
        
        


       

       
    </style>
    <h4> REPORTE DE VOTOS {{ $pmu->puesto}} MESA {{ $pmu->mesa}}</h4>
@stop

@section('content')

@if (session('info'))
        <div class="alert alert-success">
            <strong>{{(session('info'))}}</strong>
        </div>
@endif

    
    <div class="row">
       
                <div class="col-12 col-sm-4 ">                
                        <div class="card card-small">
                            <div class="card-header ">
                                <div class="row">
                                    <span style="font-size: 24px">Datos transmitidos por el Delegado</span>  
                                </div>
                            </div>
                            <div class="card-body">
                                {!! Form::model($pmu, ['route' => ['admin.tellers.update',$pmu], 'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}
                                @csrf
                                
                                <table class="table">
        
                                    <tbody>
                                        
                                        <tr>
                                            <td colspan="3" class="text-center" style="padding: 1px">Votantes E11</td>
                                            <td style="padding: 1px"><input class="form-control" type="number" name="censodemesa"  value="{{$pmu->censodemesa}}" required> </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" class="text-center" style="padding: 1px">Votos en Urna</td>
                                          
                                            <td style="padding: 1px"><input class="form-control"type="number" name="votosenurna" value="{{$pmu->votosenurna}}" required> </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" class="text-center">Incinerados</td>
                                            
                                            <td style="padding: 1px"><input class="form-control"type="number" name="votosincinerados" value="{{$pmu->votosincinerados}}" required></td>
                                        </tr>
                                        
                                    </tbody>
                                   </table>
                        
                                <div class="table-container">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="id-cell">#</th>
                                                <th>Candidato</th>
                                                <th class="votos-cell">Votos</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><label for="gob4">01</label></td>
                                                <td><label type="text" name="gob4">Wilmar Barbosa</td>
                                                <td><input  class="form-control"type="text" name="gob4" value="{{$pmu->gob4}}"></td>
                                            </tr>
                                            <tr>
                                                <td><label for="gob7">02</label></td>
                                                <td><label type="text" name="gob7">Bairon Muñoz</td>
                                                <td><input  class="form-control"type="text" name="gob7" value="{{$pmu->gob7}}"></td>
                                            </tr>
                                            

                                            <tr>
                                                <td><label for="gob11">03</label></td>
                                                <td><label type="text" name="gob11">Jose L Silva</td>
                                                <td><input  class="form-control" type="text" name="gob11" value="{{$pmu->gob11}}"></td>
                                            </tr>
                                            <tr>
                                                <td><label for="gob6">04</label></td>
                                                <td><label type="text" name="gob6">Harold Barreto</td>
                                                <td><input  class="form-control"type="text" name="gob6" value="{{$pmu->gob6}}"></td>
                                            </tr>
                                            <tr>
                                                <td><label for="gob1">05</label></td>
                                                <td><label type="text" name="gob1">Rafaela Cortes</td>
                                                <td ><input  class="form-control" name="gob1" value="{{$pmu->gob1}}"></td>
                                            </tr>

                                            <tr>
                                                <td><label for="gob8">06</label></td>
                                                <td><label type="text" name="gob8">Antonio Amaya</td>
                                                <td><input  class="form-control"type="text" name="gob8" value="{{$pmu->gob8}}"></td>
                                            </tr>
                                            <tr>
                                                <td><label for="gob5">07</label></td>
                                                <td><label type="text" name="gob5">Edward Libreros</td>
                                                <td><input  class="form-control"type="text" name="gob5" value="{{$pmu->gob5}}"></td>
                                            </tr>
                                            <tr>
                                                <td><label for="gob9">08</label></td>
                                                <td><label type="text" name="gob9">Florentino Vasquez</td>
                                                <td><input  class="form-control"type="text" name="gob9" value="{{$pmu->gob9}}"></td>
                                            </tr>
                                        
                                            <tr>
                                                <td><label for="gob2">09</label></td>
                                                <td><label type="text" name="gob2">Marcela Amaya</td>
                                                <td><input  class="form-control"type="text" name="gob2" value="{{$pmu->gob2}}"></td>
                                            </tr>
                                            <tr>
                                                <td><label for="gob3">10</label></td>
                                                <td><label type="text" name="gob3">Dario Vasquez</td>
                                                <td><input  class="form-control"type="text" name="gob3" value="{{$pmu->gob3}}"></td>
                                            </tr>
                                            <tr>
                                                
                                                <td colspan="2">Votos en blanco</td>
                                                <td><input  class="form-control"type="text" name="enblanco" value="{{$pmu->enblanco}}"></td>
                                            </tr>
                                            <tr>
                                                
                                                <td colspan="2">Votos nulos</td>
                                                <td><input  class="form-control" type="text" name="nulos" value="{{$pmu->nulos}}"></td>
                                            </tr>
                                            <tr>
                                            
                                                <td colspan="2">Votos no marcados</td>
                                                <td><input  class="form-control"type="text" name="nomarcados" value="{{$pmu->nomarcados}}"></td>
                                            </tr>
                                        </tbody>
                                    </table>      
                                </div>   
                        
                                <div class="row">
                                    <div class="col-6">
                                        {!! Form::label("status_reconteo", "¿Reconteo en mesa?") !!}
                                        {!! Form::select("status_reconteo", ['' => 'Selecciona una opción', 0 => 'No', 1 => 'Sí'], null, ["class" => "form-control", "required" => "required"]) !!}
                                
                                    </div>
                                    <div class="col-6">
                                        {!! Form::label("reclamacion", "Reclamaciones mesa") !!}
                                        {!! Form::select("reclamacion", ['' => 'Selecciona una opción', 0 => 'No', 1 => 'Rafaela', 2 => 'Marcela',3 => 'Wilmar',4 => 'Harold',5 => 'Dario'], null, ["class" => "form-control", "required" => "required"]) !!}
                                    
                                    </div>
                                </div>
                        
                            
                            
                                                    
                                                
                                                
                        
                                                
                                                
                                                
                                                    
                        
                                                
                                                
                        
                        
                                <input type="text" value="{{Auth::user()->name}}" id="modificadopor_pmu" name="modificadopor_pmu" hidden />
                                
                                        
                            
                                {!! Form::hidden('codescru', null) !!}
                                {!! Form::hidden('codcor', null) !!}
                                {!! Form::hidden('status', null) !!}
                                <br>
                                {!! Form::submit('Reportar Cambios', ['class' => 'btn btn-primary']) !!}
    
                                {!! Form::close() !!}
                            </div>
                        </div>
                </div>
                <div class="col-12 col-sm-8 ">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            
                                <div class="card container-fluid">
                                    <div class="card-header">
                                        <div class="row">
                                            <span style="font-size: 24px">E14 Cara 1 testigo</span>    
                                            @if ($pmu->e14 == 0)
                                                
                                            @else
                                            <a target="_blank" rel="noopener noreferrer" href="{{ asset('/storage/' . $pmu->e14) }}">Ver</a>
                                            @endif
                                        
                                        </div>
                                    </div>
                                    <div class=" e14 card-body">
                                    
                                        @if ($pmu->e14 == 0)
                                        <p>Foto NO cargada, Pongase en contacto con el coordinador del puesto</p>
                                        @else
                                        <div id="image-container">
                                            <img id="image" src="{{ asset('/storage/' . $pmu->e14) }}"  alt="">                            

                                        </div>
                                        <div class="row">
                                            <div class="text-right col-6">
                                                <button class="btn btn-primary btn-sm" id="rotate-left"><i class="fas fa-undo-alt"></i></button>
                                            </div>
                                            <div class="col-6">
                                                <button class="text-right btn btn-primary btn-sm"  id="rotate-right"><i class="fas fa-redo-alt"></i></button>

                                            </div>
                                        </div>
                                        @endif
                                        
                                    </div>
                                </div>
                            
                        </div>
                        <div class="col-12 col-sm-6">
                            
                                <div class="card container-fluid">
                                    <div class="card-header">
                                        <div class="row">
                                            <span style="font-size: 24px">E14 Cara 2 testigo</span>    
                                            @if ($pmu->e14_2 == 0)
                                                
                                            @else
                                            <a target="_blank" rel="noopener noreferrer" href="{{ asset('/storage/' . $pmu->e14_2) }}">Ver</a>
                                            @endif
                                        
                                        </div>
                                    </div>
                                    <div class=" e14 card-body">
                                    
                                        @if ($pmu->e14_2 == 0)
                                        <p>Foto NO cargada, Pongase en contacto con el coordinador del puesto</p>
                                        @else
                                            <div id="image-container1">
                                                <img src="{{ asset('/storage/' . $pmu->e14_2) }}"  alt=""> 
                                            </div>
                                            <div class="row">
                                                <div class="text-right col-6">
                                                    <button class="btn btn-primary btn-sm" id="rotate-left1"><i class="fas fa-undo-alt"></i></button>
                                                </div>
                                                <div class="col-6">
                                                    <button class="text-right btn btn-primary btn-sm"  id="rotate-right1"><i class="fas fa-redo-alt"></i></button>
    
                                                </div>
                                            </div>
                                        @endif
                                        
                                    </div>
                                </div>
                            
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-">
                            <div class="row">
                                <div class="e14 card container-fluid">
                                    <div class="card-header">
                                        <div class="row">
                                            <span style="font-size: 24px">Reclamacíon</span>  
                                            @if ($pmu->fotorec == null)
                                                
                                            @else
                                            <a target="_blank" rel="noopener noreferrer" href="{{ asset('/storage/' . $pmu->fotorec ) }}">Ver</a>
                                            @endif
                                            
                                        </div>
                                    </div>
                                    <div class="card-body" >
                                    
                                        @if ($pmu->fotorec == null)
                                            <p>Mesa sin reclamación</p>
                                        @else
                                                <div id="image-container3">
                                                    <img src="{{ asset('/storage/' . $pmu->fotorec) }}"  alt="">
                                                </div>    
                                                <div class="row">
                                                <div class="text-right col-6">
                                                    <button class="btn btn-primary btn-sm" id="rotate-left3"><i class="fas fa-undo-alt"></i></button>
                                                </div>
                                                <div class="col-6">
                                                    <button class="text-right btn btn-primary btn-sm"  id="rotate-right3"><i class="fas fa-redo-alt"></i></button>
    
                                                </div>
                                            </div>
                                            @endif
                                    
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>   
    </div>           
            
    

    
   
   {{-- <div class="row">
        <div class="col-12">
            <div class="card">
                    <div class="card-header">
                        <h5>Nuevos Reportes</h5>  
                    </div>
                    <div class="card-body">
                        <div class="row">    
                            <div class="col-12 col-sm-6">
                                {!! Form::model($pmu, ['route' => ['admin.escrutinio.update',$pmu], 'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}
                                
                                        {!! Form::hidden('coddep', null) !!}
                                        {!! Form::hidden('codmun', null) !!}
                                        {!! Form::hidden('codzon', null) !!}
                                        {!! Form::hidden('codpuesto', null) !!}
                                        {!! Form::hidden('departamento', null) !!}
                                        {!! Form::hidden('municipio', null) !!}
                                        {!! Form::hidden('puesto', null) !!}
                                        {!! Form::hidden('mesa', null) !!}
                                        {!! Form::hidden('codpar', null) !!}
                                        {!! Form::hidden("email", null) !!}
                                        {!! Form::hidden("telefono", null) !!}
                                        {!! Form::hidden("nombre", null) !!}
                                
                                
                                
                                        <div class="form-group">
                                            {!! Form::label("recuperados", "Perdida o Ganancia de votos de Rafaela Cortes") !!}
                                            {!! Form::text("recuperados", null, ["class" => "form-control disabled", 'placeholder' => 'Si perdimos votos utilice el signo - ej. (-2)']) !!}
                                
                                            @error('recuperados')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                
                                        </div>
                                
                                
                                
                                
                                
                                
                                
                                
                                            {!! Form::hidden('codescru', null) !!}
                                            {!! Form::hidden('codcor', null) !!}
                                            {!! Form::hidden('status', null) !!}
                                
                                            {!! Form::submit('Reportar Cambios', ['class' => 'btn btn-primary']) !!}
                                
                                        {!! Form::close() !!}
                            </div>
                            <div class="col-12 col-sm-3">
                                <h5>¿Nueva Reclamacion?</h5> 
                                <select  class="form-control" name="" id="">
                                    <option  value="0">No</option>
                                    <option value="0">Si</option>

                                </select>

                            </div>
                            <div class="col-12 col-sm-3">
                                <h5> ¿Apelacion?  </h5> 
                                <select  class="form-control" name="" id="">
                                    <option  value="0">No</option>
                                    <option value="0">Si</option>

                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
   </div>
    --}}
    
   
   
   
   
   
    <div class="row">
        <div class="col-12 col-sm 6">
            <div class="info-box">
                <span class="info-box-icon bg-primary"><i class="far fa-user"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text"> Cordinador del puesto:</span>
                  <span class="info-box-number"> {{$cordinador[0]->cordinador}}</span>
                </div>
              </div>
        </div>
        <div class="col-12 col-sm 6">
            <div class="info-box">
                <span class="info-box-icon bg-primary"><i class="fa fa-phone" aria-hidden="true"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">   Telefono:</span>
                  <span class="info-box-number"> {{$cordinador[0]->telefono}}</span>
                </div>
              </div>
        </div>
       
      
    </div>

@stop
@section('css')
@stop
@section('js')

        <script>
            document.addEventListener("DOMContentLoaded", function () {
            var imageContainer = document.getElementById('image-container');
            var image = imageContainer.querySelector('img');
            var currentRotation = 0; // Ángulo de rotación actual en grados

            // Función para rotar la imagen
            function rotateImage(degrees) {
                currentRotation += degrees;
                image.style.transform = 'rotate(' + currentRotation + 'deg)';
            }

            // Rotar a la izquierda
            document.getElementById('rotate-left').addEventListener('click', function () {
                rotateImage(-90); // Puedes cambiar el valor del ángulo según necesites
            });

            // Rotar a la derecha
            document.getElementById('rotate-right').addEventListener('click', function () {
                rotateImage(90); // Puedes cambiar el valor del ángulo según necesites
            });
        });
        document.addEventListener("DOMContentLoaded", function () {
            var imageContainer = document.getElementById('image-container1');
            var image = imageContainer.querySelector('img');
            var currentRotation = 0; // Ángulo de rotación actual en grados

            // Función para rotar la imagen
            function rotateImage(degrees) {
                currentRotation += degrees;
                image.style.transform = 'rotate(' + currentRotation + 'deg)';
            }

            // Rotar a la izquierda
            document.getElementById('rotate-left1').addEventListener('click', function () {
                rotateImage(-90); // Puedes cambiar el valor del ángulo según necesites
            });

            // Rotar a la derecha
            document.getElementById('rotate-right1').addEventListener('click', function () {
                rotateImage(90); // Puedes cambiar el valor del ángulo según necesites
            });
        });
        document.addEventListener("DOMContentLoaded", function () {
            var imageContainer = document.getElementById('image-container3');
            var image = imageContainer.querySelector('img');
            var currentRotation = 0; // Ángulo de rotación actual en grados

            // Función para rotar la imagen
            function rotateImage(degrees) {
                currentRotation += degrees;
                image.style.transform = 'rotate(' + currentRotation + 'deg)';
            }

            // Rotar a la izquierda
            document.getElementById('rotate-left3').addEventListener('click', function () {
                rotateImage(-90); // Puedes cambiar el valor del ángulo según necesites
            });

            // Rotar a la derecha
            document.getElementById('rotate-right3').addEventListener('click', function () {
                rotateImage(90); // Puedes cambiar el valor del ángulo según necesites
            });
        });


        </script>
@stop
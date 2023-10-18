@extends('adminlte::page')

@section('title', 'Admin')

@section('content_header')
    <style>
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
    <h4> REPORTE DE VOTOS <br> {{ $teller->puesto}} MESA {{ $teller->mesa}}</h4>
@stop

@section('content')

@if (session('info'))
        <div class="alert alert-success">
            <strong>{{(session('info'))}}</strong>
        </div>
@endif

<div class="card">
    <div class="card-body">
        {!! Form::model($teller, ['route' => ['admin.tellers.update',$teller], 'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}
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
        {!! Form::hidden("email", null) !!}
        {!! Form::hidden("telefono", null) !!}
        {!! Form::hidden("nombre", null) !!}

       

       <table class="table">
        
        <tbody>
            
            <tr>
                <td colspan="3" class="text-center" style="padding: 1px">Votantes E11</td>
                <td style="padding: 1px"><input class="form-control" type="number" name="censodemesa"  value="{{$teller->censodemesa}}" required> </td>
            </tr>
            <tr>
                <td colspan="3" class="text-center" style="padding: 1px">Votos en Urna</td>
              
                <td style="padding: 1px"><input class="form-control"type="number" name="votosenurna" value="{{$teller->votosenurna}}" required> </td>
            </tr>
            <tr>
                <td colspan="3" class="text-center">Incinerados</td>
                
                <td style="padding: 1px"><input class="form-control"type="number" name="votosincinerados" value="{{$teller->votosincinerados}}" required></td>
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
                    <td><label type="text" name="gob4">Fabian Hernandez</td>
                    <td><input  class="form-control"type="text" name="gob4" value="{{$teller->gob4}}"></td>
                </tr>
                        
                <tr>
                    <td><label for="gob2">02</label></td>
                    <td><label type="text" name="gob2">Simon Sanbria</td>
                    <td><input  class="form-control"type="text" name="gob2" value="{{$teller->gob2}}"></td>
                </tr>
                <tr>
                    <td><label for="gob3">03</label></td>
                    <td><label type="text" name="gob3">Jhon Jairo Gutierrez</td>
                    <td><input  class="form-control"type="text" name="gob3" value="{{$teller->gob3}}"></td>
                </tr>
                <tr>
                    <td><label for="gob1">04</label></td>
                    <td><label type="text" name="gob1">Andres Castañeda</td>
                    <td ><input  class="form-control" name="gob1" value="{{$teller->gob1}}"></td>
                </tr>
          
                <tr>
                    
                    <td colspan="2">Votos en blanco</td>
                    <td><input  class="form-control"type="text" name="enblanco" value="{{$teller->enblanco}}"></td>
                </tr>
                <tr>
                    
                    <td colspan="2">Votos nulos</td>
                    <td><input  class="form-control" type="text" name="nulos" value="{{$teller->nulos}}"></td>
                </tr>
                <tr>
                
                    <td colspan="2">Votos no marcados</td>
                    <td><input  class="form-control"type="text" name="nomarcados" value="{{$teller->nomarcados}}"></td>
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
            {!! Form::select("reclamacion", ['' => 'Selecciona una opción', 0 => 'No', 1 => 'Si, Andres', 2 => 'Fabian',3 => 'Simon',4 => 'Jhon'], null, ["class" => "form-control", "required" => "required"]) !!}
        
        </div>
    </div>

      
       
                            
                         
                           

                          
                           
                          
                            

                          
                          


        <input type="text" value="{{Auth::user()->name}}" id="modificadopor" name="modificadopor" hidden />
        
                
       
        {!! Form::hidden('codescru', null) !!}
        {!! Form::hidden('codcor', null) !!}
        {!! Form::hidden('status', null) !!}
        <br>
        {!! Form::submit('Reportar resultados', ['class' => 'btn btn-primary']) !!}
        {!! Form::close() !!}
    </div>
</div>
@stop

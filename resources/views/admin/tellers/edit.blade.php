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
            padding: 8px;
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

        <div class="row">
            <div class="col-4">
                {!! Form::label("censodemesa", "Votantes E11") !!}
                {!! Form::number("censodemesa", null, ["class" => "form-control disabled  ", ]) !!}
              
            </div>     
            <div class="col-4">
                {!! Form::label("votosenurna", "Votos en Urna") !!}
                {!! Form::number("votosenurna", null, ["class" => "form-control ", ]) !!}
            </div>   
            <div class="col-4">
                {!! Form::label("votosincinerados", "Incinerados") !!}
                {!! Form::number("votosincinerados", null, ["class" => "form-control ",]) !!}
            </div>
        </div><br>

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
                        <td><label for="gob1">01</label></td>
                        <td><label type="text" name="gob1">Rafaela Cortes</td>
                        <td ><input class="form-control" type="number" name="gob1" value="{{$teller->gob1}}" required></td>
                    </tr>
                
                        <tr>
                            <td><label for="gob2">02</label></td>
                            <td><label type="text" name="gob2">Marcela Amaya</td>
                            <td><input class="form-control"type="number" name="gob2" value="{{$teller->gob2}}"required></td>
                        </tr>
                        <tr>
                            <td><label for="gob3">03</label></td>
                            <td><label type="text" name="gob3">Dario Vasquez</td>
                            <td><input class="form-control"type="number" name="gob3" value="{{$teller->gob3}}" required></td>
                        </tr>
                    
                        <tr>
                            <td><label for="gob4">04</label></td>
                            <td><label type="text" name="gob4">Wilmar Barbosa</td>
                            <td><input class="form-control"type="number" name="gob4" value="{{$teller->gob4}}" required></td>
                        </tr>
                    
                        <tr>
                            <td><label for="gob5">05</label></td>
                            <td><label type="text" name="gob5">Edward Libreros</td>
                            <td><input class="form-control"type="number" name="gob5" value="{{$teller->gob5}}" required></td>
                        </tr>
                    
                        <tr>
                            <td><label for="gob6">06</label></td>
                            <td><label type="text" name="gob6">Harold Barreto</td>
                            <td><input class="form-control"type="number" name="gob6" value="{{$teller->gob6}}" required></td>
                        </tr>
                    
                        <tr>
                            <td><label for="gob7">07</label></td>
                            <td><label type="text" name="gob7">Bairon Muñoz</td>
                            <td><input class="form-control"type="number" name="gob7" value="{{$teller->gob7}}" required></td>
                        </tr>
                        <tr>
                            <td><label for="gob8">08</label></td>
                            <td><label type="text" name="gob8">Antonio Amaya</td>
                            <td><input class="form-control"type="number" name="gob8" value="{{$teller->gob8}}" required></td>
                        </tr>
                        <tr>
                            <td><label for="gob9">09</label></td>
                            <td><label type="text" name="gob9">Florentino Vasquez</td>
                            <td><input class="form-control"type="number" name="gob9" value="{{$teller->gob9}}" required></td>
                        </tr>
                        <tr>
                            <td><label for="gob10">10</label></td>
                            <td><label type="text" name="gob10">Eudoro Alvarez</td>
                            <td><input class="form-control"type="number" name="gob10" value="{{$teller->gob10}}" required></td>
                        </tr>
                        <tr>
                            <td><label for="gob11">11</label></td>
                            <td><label type="text" name="gob11">Jose L Silva</td>
                            <td><input class="form-control" type="number" name="gob11" value="{{$teller->gob11}}" required></td>
                        </tr>
                       
                    

                    
                    
                    <tr>
                        
                        <td colspan="2">Votos en blanco</td>
                        <td><input class="form-control"type="number" name="enblanco"  value="{{$teller->enblanco}}" required> </td>
                    </tr>
                    <tr>
                        
                        <td colspan="2">Votos nulos</td>
                        <td><input class="form-control" type="number" name="nulos" value="{{$teller->nulos}}"required></td>
                    </tr>
                    <tr>
                       
                        <td colspan="2">Votos no marcados</td>
                        <td><input class="form-control"type="number" name="nomarcados" value="{{$teller->nomarcados}}"required></td>
                    </tr>
                </tbody>
            </table>      
        </div>   

        <div class="row">
            <div class="col-6">
                {!! Form::label("status_reconteo", "¿Reconteo mesa?") !!}
                {!! Form::select("status_reconteo", ['' => 'Selecciona una opción', 0 => 'No', 1 => 'Sí'], null, ["class" => "form-control", "required" => "required"]) !!}
        
            </div>
            <div class="col-6">
                {!! Form::label("reclamacion", "Reclamaciones mesa") !!}
                {!! Form::select("reclamacion", ['' => 'Selecciona una opción', 0 => 'No', 1 => 'Sí'], null, ["class" => "form-control", "required" => "required"]) !!}
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

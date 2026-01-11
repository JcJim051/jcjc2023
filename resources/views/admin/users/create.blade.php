@extends('adminlte::page')

@section('title', 'Crear Usuario')

@section('content')
<br>
<div class="mt-4 d-flex justify-content-center">
    <div class="card" style="width: 800px;">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Crear Usuario</h5>
            <div>
                <label for="status" class="mb-0 mr-2">Estado:</label>
                <select name="status" id="status" class="form-control form-control-sm d-inline-block" style="width: 120px;">
                    <option value="1" selected>Activo</option>
                    <option value="0">Bloqueado</option>
                </select>
            </div>
        </div>
        <form action="{{ route('admin.users.store') }}" method="POST">
            @csrf
            <div class="card-body">
                <div class="row">
                    {{-- Nombre --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Nombre</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                    </div>

                    {{-- Email --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                    </div>

                    {{-- Password --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Contraseña</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                    </div>

                    {{-- Rol --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Rol</label>
                            <select name="role" class="form-control" required>
                                @foreach($roles as $role)
                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    {{-- Municipio --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Municipio</label>
                            <select id="mun" name="mun" class="form-control select2" required>
                                <option value="">Seleccione...</option>
                                @foreach($municipios as $m)
                                    <option value="{{ $m->mun }}">{{ $m->mun }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    {{-- Puesto --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Puesto</label>
                            <select id="codpuesto" name="codpuesto" class="form-control select2" required>
                                <option value="">Seleccione un municipio primero...</option>
                            </select>
                        </div>
                    </div>

                    {{-- Codzon --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Codigo Zona (codzon)</label>
                            <input type="text" id="codzon" name="codzon" class="form-control" readonly>
                        </div>
                    </div>

                </div>
            </div>
            <div class="text-right card-footer">
                <button type="submit" class="btn btn-success">Crear</button>
                <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
</div>
@endsection

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script>
$(document).ready(function(){
    $('.select2').select2();

    $('#mun').on('change', function(){
        var mun = $(this).val();
        var $codpuesto = $('#codpuesto');

        $codpuesto.html('<option value="">Cargando...</option>');

        if(mun){
            $.get('/admin/puntos/' + mun)
                .done(function(data){
                    $codpuesto.empty().append('<option value="">Seleccione...</option>');
                    data.forEach(function(p){
                        $codpuesto.append('<option value="'+p.codpuesto+'">'+p.codpuesto+' - '+p.nombre+'</option>');
                    });
                })
                .fail(function(){
                    $codpuesto.empty().append('<option value="">Error al cargar puestos</option>');
                });
        } else {
            $codpuesto.empty().append('<option value="">Seleccione un municipio primero...</option>');
        }
    });
});
</script>
@endsection

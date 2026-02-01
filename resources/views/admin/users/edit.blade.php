@extends('adminlte::page')

@section('title', 'Editar Usuario')

@section('content')
<br>

@if ($errors->any())
    <div class="m-3 alert alert-danger">
        <strong>Ups, hay errores:</strong>
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="mt-4 d-flex justify-content-center">
    <div class="card" style="width: 800px;">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Editar Usuario</h5>
            <div>
                <label for="status" class="mb-0 mr-2">Estado:</label>
                <select name="status" form="formUser" class="form-control form-control-sm d-inline-block" style="width: 120px;">
                    <option value="1" {{ $user->status == 1 ? 'selected' : '' }}>Activo</option>
                    <option value="0" {{ $user->status == 0 ? 'selected' : '' }}>Bloqueado</option>
                </select>
            </div>
        </div>

        <form id="formUser" action="{{ route('admin.users.update', $user) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="card-body">
                <div class="row">

                    {{-- Nombre --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Nombre</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}" required>
                        </div>
                    </div>

                    {{-- Email --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>
                        </div>
                    </div>

                    {{-- Password --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Nueva Contraseña (opcional)</label>
                            <input type="password" name="password" class="form-control">
                        </div>
                    </div>

                    {{-- Rol --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Rol</label>
                            <select name="role" id="role" class="form-control" required>
                                @foreach($roles as $role)
                                    <option value="{{ $role->id }}"
                                        {{ $user->role == $role->id ? 'selected' : '' }}>
                                        {{ $role->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    {{-- Municipios --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Municipio(s)</label>
                            <select name="mun[]" id="mun" class="form-control select2" multiple>
                                @foreach($municipios as $m)
                                    <option value="{{ $m->codmun }}"
                                        {{ in_array($m->codmun, old('mun', $user->mun)) ? 'selected' : '' }}>
                                        {{ $m->codmun }} - {{ $m->municipio }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    {{-- Puestos --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Puesto(s)</label>
                            <select id="codpuesto" name="codpuesto[]" class="form-control select2" multiple></select>
                        </div>
                    </div>

                    {{-- Codzon --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Código Zona (codzon)</label>
                            <input type="text" id="codzon" name="codzon" class="form-control"
                                   value="{{ old('codzon', is_array($user->codzon) ? implode(',', $user->codzon) : $user->codzon) }}">
                        </div>
                    </div>

                </div>
            </div>

            <div class="text-right card-footer">
                <button type="submit" class="btn btn-primary">Actualizar</button>
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

    $('.select2').select2({
        placeholder: "Seleccione opciones",
        width: '100%'
    });

    function configurarCamposPorRol() {
        var rol = $('#role').val();

        if (rol == 1) { // ADMIN
            $('#mun').prop('disabled', false);
            $('#codpuesto').prop('disabled', true).val(null).trigger('change');
            $('#codzon').prop('readonly', false);
        } 
        else if (rol == 3) { // COORDINADOR
            $('#mun').prop('disabled', false);
            $('#codpuesto').prop('disabled', false);
        } 
        else {
            $('#mun').prop('disabled', false);
            $('#codpuesto').prop('disabled', true).val(null).trigger('change');
        }
    }

    configurarCamposPorRol();
    $('#role').on('change', configurarCamposPorRol);

    function cargarPuestos(municipiosSeleccionados, puestosSeleccionados = []) {
        var $codpuesto = $('#codpuesto');
        $codpuesto.empty();

        if (!municipiosSeleccionados || municipiosSeleccionados.length === 0) {
            $codpuesto.append('<option value="">Seleccione municipio(s) primero...</option>');
            return;
        }

        municipiosSeleccionados.forEach(function(mun){
            $.get('/admin/puntos/' + mun)
                .done(function(data){
                    data.forEach(function(p){
                        let selected = puestosSeleccionados.includes(p.codpuesto) ? 'selected' : '';
                        if ($codpuesto.find("option[value='"+p.codpuesto+"']").length === 0) {
                            $codpuesto.append('<option value="'+p.codpuesto+'" '+selected+'>'+p.codpuesto+' - '+p.nombre+'</option>');
                        }
                    });
                    $codpuesto.trigger('change');
                });
        });
    }

    // 🔥 Cargar puestos al entrar en modo edición
    let municipiosIniciales = @json(old('mun', $user->mun));
    let puestosIniciales = @json(old('codpuesto', $user->codpuesto));
    cargarPuestos(municipiosIniciales, puestosIniciales);

    $('#mun').on('change', function(){
        var rol = $('#role').val();
        if (rol != 3) return;
        cargarPuestos($(this).val());
    });

});
</script>
@endsection

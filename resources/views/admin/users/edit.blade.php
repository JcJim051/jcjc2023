@extends('adminlte::page')

@section('title', 'Editar Usuario')

@section('content')
<br>
<div class="mt-4 d-flex justify-content-center">
    <div class="card" style="width: 800px;">
        
        <form action="{{ route('admin.users.update', $user) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Editar Usuario: {{ $user->name }}</h5>

                <div>
                    <label class="mb-0 mr-2">Estado:</label>
                    <select name="status" class="form-control form-control-sm d-inline-block" style="width: 120px;">
                        <option value="1" {{ $user->status == 1 ? 'selected' : '' }}>Activo</option>
                        <option value="0" {{ $user->status == 0 ? 'selected' : '' }}>Bloqueado</option>
                    </select>
                </div>
            </div>

            <div class="card-body">
                <div class="row">

                    {{-- Nombre --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Nombre</label>
                            <input type="text" name="name" class="form-control"
                                value="{{ is_array(old('name', $user->name)) ? implode(',', old('name', $user->name)) : old('name', $user->name) }}"
                                required>
                        </div>
                    </div>
                    
                    {{-- Email --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control"
                                value="{{ is_array(old('email', $user->email)) ? implode(',', old('email', $user->email)) : old('email', $user->email) }}"
                                required>
                        </div>
                    </div>
                    
                    {{-- Password --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Contraseña (dejar en blanco para no cambiar)</label>
                            <input type="password" name="password" class="form-control">
                        </div>
                    </div>
                    
                    {{-- Rol --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Rol</label>
                            <select name="role" id="role" class="form-control" required>
                                @foreach($roles as $role)
                                    <option value="{{ $role->id }}" {{ old('role', $user->role) == $role->id ? 'selected' : '' }}>
                                        {{ $role->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    
                    {{-- Codigo Zona --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Codigo Zona (codzon)</label>
                            <input type="text" name="codzon" class="form-control"
                                value="{{ is_array(old('codzon', $user->codzon)) ? implode(',', old('codzon', $user->codzon)) : old('codzon', $user->codzon) }}">
                        </div>
                    </div>

                    {{-- MUNICIPIOS MULTIPLES --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Municipio(s)</label>
                            @php $munSeleccionados = old('mun', $user->mun ?? []); @endphp
                            <select name="mun[]" id="mun" class="form-control select2" multiple>
                                @foreach($municipios as $m)
                                    <option value="{{ $m->mun }}" {{ in_array($m->mun, $munSeleccionados) ? 'selected' : '' }}>
                                        {{ $m->mun }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    {{-- PUESTOS MULTIPLES --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Puesto(s)</label>
                            @php $puestosSeleccionados = old('codpuesto', $user->codpuesto ?? []); @endphp
                            <select name="codpuesto[]" id="codpuesto" class="form-control select2" multiple>
                                @foreach($puestos as $p)
                                    <option value="{{ $p->codpuesto }}" {{ in_array($p->codpuesto, $puestosSeleccionados) ? 'selected' : '' }}>
                                        {{ $p->codpuesto }} - {{ $p->nombre }}
                                    </option>
                                @endforeach
                            </select>
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
$(document).ready(function() {
    $('.select2').select2({
        placeholder: "Seleccione opciones",
        width: '100%'
    });
});
</script>
@endsection

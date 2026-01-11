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
                    <label for="status" class="mb-0 mr-2">Estado:</label>
                    <select name="status" id="status" class="form-control form-control-sm d-inline-block" style="width: 120px;">
                        <option value="1" {{ $user->status == 1 ? 'selected' : '' }}>Activo</option>
                        <option value="0" {{ $user->status == 0 ? 'selected' : '' }}>Bloqueado</option>
                    </select>
                </div>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Nombre</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}" required>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Contraseña (dejar en blanco para no cambiar)</label>
                            <input type="password" name="password" class="form-control" autocomplete="new-password">
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Rol</label>
                            <select name="role" class="form-control" required>
                                @foreach($roles as $role)
                                    <option value="{{ $role->id }}" {{ $user->role == $role->id ? 'selected' : '' }}>
                                        {{ $role->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Codigo Zona (codzon)</label>
                            <input type="text" name="codzon" class="form-control" value="{{ old('codzon', $user->codzon) }}">
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Codigo Puesto (codpuesto)</label>
                            <input type="text" name="codpuesto" class="form-control" value="{{ old('codpuesto', $user->codpuesto) }}">
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Municipio (mun)</label>
                            <input type="text" name="mun" class="form-control" value="{{ old('mun', $user->mun) }}">
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

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Usuario</h1>

    <form action="{{ route('users.update', $user->ci) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="ci" class="form-label">CI</label>
            <input type="text" name="ci" class="form-control" value="{{ $user->ci }}" disabled>
        </div>

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" name="nombre" class="form-control" value="{{ $user->nombre }}" required>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Nueva Contraseña (opcional)</label>
            <input type="password" name="password" class="form-control">
        </div>

        <div class="mb-3">
            <label for="role_id" class="form-label">Rol</label>
            <select name="role_id" class="form-control" required>
                @foreach ($roles as $role)
                    <option value="{{ $role->id }}" {{ $user->role_id == $role->id ? 'selected' : '' }}>
                        {{ $role->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('users.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
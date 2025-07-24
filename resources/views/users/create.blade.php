@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Registrar Usuario</h1>

    <form action="{{ route('users.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="ci" class="form-label">CI</label>
            <input type="text" name="ci" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" name="nombre" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Contraseña</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="role_id" class="form-label">Rol</label>
            <select name="role_id" class="form-control" required>
                <option value="">Seleccione un rol</option>
                @foreach ($roles as $role)
                    <option value="{{ $role->id }}">{{ $role->nombre }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('users.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
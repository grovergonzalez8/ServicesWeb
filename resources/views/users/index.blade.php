@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h2>Lista de Usuarios</h2>
        <a href="{{ route('users.create') }}" class="btn btn-success">+ Crear Usuario</a>
    </div>
    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if ($users->isEmpty())
            <div class="alert alert-info">No hay usuarios registrados.</div>
        @else
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nro.</th>
                        <th>C.I.</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Rol</th> <!-- si tienes roles -->
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $index => $user)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $user->ci }}</td>
                            <td>{{ $user->nombre }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->rol ?? '-' }}</td> <!-- Ajusta según tu modelo -->
                            <td>
                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary btn-sm">Editar</a>
                                <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Estás seguro de eliminar este usuario?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</div>
@endsection
@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h2>Editar Departamento</h2>
    </div>
    <div class="card-body">
        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>¡Ups!</strong> Hubo algunos problemas con tus datos.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('departamentos.update', $departamento->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre del Departamento</label>
                <input type="text" name="nombre" class="form-control" id="nombre" value="{{ old('nombre', $departamento->nombre) }}" required>
            </div>

            <a href="{{ route('departamentos.index') }}" class="btn btn-secondary">Cancelar</a>
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
    </div>
</div>
@endsection
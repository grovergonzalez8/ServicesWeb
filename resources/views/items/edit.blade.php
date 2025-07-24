@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h2>Editar Ítem: {{ $item->codigo }}</h2>
    </div>
    <div class="card-body">
        <form action="{{ route('items.update', $item->codigo) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="codigo" class="form-label">Código</label>
                <input type="text" name="codigo" id="codigo" class="form-control" value="{{ $item->codigo }}" readonly>
                <small class="text-muted">No se puede cambiar el código.</small>
            </div>
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" name="nombre" id="nombre" class="form-control" value="{{ old('nombre', $item->nombre) }}" required>
                @error('nombre') <div class="text-danger">{{ $message }}</div> @enderror
            </div>
            <div class="mb-3">
                <label for="stock" class="form-label">Stock</label>
                <input type="number" name="stock" id="stock" class="form-control" value="{{ old('stock', $item->stock) }}" min="0" required>
                @error('stock') <div class="text-danger">{{ $message }}</div> @enderror
            </div>
            <div class="mb-3">
                <label for="unidad_medida" class="form-label">Unidad de Medida</label>
                <input type="text" name="unidad_medida" id="unidad_medida" class="form-control" value="{{ old('unidad_medida', $item->unidad_medida) }}" required>
                @error('unidad_medida') <div class="text-danger">{{ $message }}</div> @enderror
            </div>
            <button type="submit" class="btn btn-primary">Actualizar</button>
            <a href="{{ route('items.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</div>
@endsection
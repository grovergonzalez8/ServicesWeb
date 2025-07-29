@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Nueva Entrada de Inventario</h1>

    <form action="{{ route('inventory-entries.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="item_codigo" class="form-label">Item</label>
            <select name="item_codigo" id="item_codigo" class="form-control" required>
                <option value="">Seleccione un item</option>
                @foreach ($items as $item)
                    <option value="{{ $item->codigo }}" {{ old('item_codigo') == $item->codigo ? 'selected' : '' }}>
                        {{ $item->nombre }}
                    </option>
                @endforeach
            </select>
            @error('item_codigo')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="cantidad" class="form-label">Cantidad</label>
            <input type="number" name="cantidad" id="cantidad" class="form-control" min="1" value="{{ old('cantidad') }}" required>
            @error('cantidad')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="fecha" class="form-label">Fecha</label>
            <input type="datetime-local" name="fecha" id="fecha" class="form-control" value="{{ old('fecha') ?? date('Y-m-d\TH:i') }}" required>
            @error('fecha')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="observacion" class="form-label">Observación</label>
            <textarea name="observacion" id="observacion" class="form-control">{{ old('observacion') }}</textarea>
            @error('observacion')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Registrar Entrada</button>
        <a href="{{ route('inventory-entries.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
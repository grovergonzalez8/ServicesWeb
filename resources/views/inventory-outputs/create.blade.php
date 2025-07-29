@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Registrar Salida de Inventario</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('inventory-outputs.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="item_codigo" class="form-label">Ítem</label>
            <select name="item_codigo" id="item_codigo" class="form-control" required>
                <option value="">Seleccione un ítem</option>
                @foreach ($items as $item)
                    <option value="{{ $item->codigo }}" {{ old('item_codigo') == $item->codigo ? 'selected' : '' }}>
                        {{ $item->nombre ?? $item->codigo }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="user_ci" class="form-label">Usuario</label>
            <select name="user_ci" id="user_ci" class="form-control" required>
                <option value="">Seleccione un usuario</option>
                @foreach ($users as $user)
                    <option value="{{ $user->ci }}" {{ old('user_ci') == $user->ci ? 'selected' : '' }}>
                        {{ $user->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="cantidad" class="form-label">Cantidad</label>
            <input type="number" name="cantidad" id="cantidad" class="form-control" min="1" value="{{ old('cantidad') }}" required>
        </div>

        <div class="mb-3">
            <label for="observacion" class="form-label">Observación (opcional)</label>
            <textarea name="observacion" id="observacion" class="form-control" rows="3">{{ old('observacion') }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Registrar Salida</button>
        <a href="{{ route('inventory-outputs.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
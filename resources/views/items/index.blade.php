@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h2>Lista de Items</h2>
        <a href="{{ route('items.create') }}" class="btn btn-success">+ Crear Item</a>
    </div>
    <div class="card-body">

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if ($items->isEmpty())
            <div class="alert alert-info">No hay ítems registrados.</div>
        @else
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nro.</th>
                        <th>Código</th>
                        <th>Nombre</th>
                        <th>Stock</th> {{-- Nueva columna para stock --}}
                        <th>Unidad de Medida</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($items as $index => $item)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $item->codigo }}</td>
                            <td>{{ $item->nombre }}</td>
                            <td>{{ $item->stock }}</td> {{-- Mostrar stock --}}
                            <td>{{ $item->unidad_medida }}</td>
                            <td>
                                <a href="{{ route('items.edit', $item->codigo) }}" class="btn btn-primary btn-sm">Editar</a>
                                <form action="{{ route('items.destroy', $item->codigo) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Estás seguro de eliminar este ítem?')">
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
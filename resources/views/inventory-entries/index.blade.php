@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Entradas de Inventario</h1>

    <a href="{{ route('inventory-entries.create') }}" class="btn btn-success mb-3">Nueva Entrada</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Item</th>
                <th>Código Item</th>
                <th>Cantidad</th>
                <th>Usuario</th>
                <th>Fecha</th>
                <th>Observación</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($entries as $entry)
                <tr>
                    <td>{{ $entry->id }}</td>
                    <td>{{ $entry->item->nombre ?? 'Item no encontrado' }}</td>
                    <td>{{ $entry->item_codigo }}</td>
                    <td>{{ $entry->cantidad }}</td>
                    <td>{{ $entry->user->nombre ?? 'Usuario no encontrado' }}</td>
                    <td>{{ \Carbon\Carbon::parse($entry->fecha)->format('d/m/Y H:i') }}</td>
                    <td>{{ $entry->observacion }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="7">No hay entradas registradas.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{ $entries->links() }}
</div>
@endsection
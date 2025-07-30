@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Salidas de Inventario</h1>

    <a href="{{ route('inventory-outputs.create') }}" class="btn btn-success mb-3">Registrar Nueva Salida</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($outputs->isEmpty())
        <div class="alert alert-info">No hay salidas registradas aún.</div>
    @else
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Ítem</th>
                    <th>Usuario</th>
                    <th>Departamento Destino</th>
                    <th>Cantidad</th>
                    <th>Fecha</th>
                    <th>Observación</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($outputs as $output)
                    <tr>
                        <td>{{ $output->id }}</td>
                        <td>{{ $output->item->nombre ?? $output->item_codigo }}</td>
                        <td>{{ $output->user->nombre ?? 'N/A' }}</td>
                        <td>{{ $output->departamento->nombre ?? 'N/A' }}</td>
                        <td>{{ $output->cantidad }}</td>
                        <td>{{ $output->fecha->format('d/m/Y H:i') }}</td>
                        <td>{{ $output->observacion }}</td>
                        <td>
                            <a href="{{ route('inventory-outputs.edit', $output->id) }}" class="btn btn-primary btn-sm">Editar</a>

                            <form action="{{ route('inventory-outputs.destroy', $output->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('¿Está seguro de eliminar esta salida?');">
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
@endsection
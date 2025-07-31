@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Generador de Sellos</h1>
    
    <!-- Botón Generar -->
    <form action="{{ route('seal-numbers.generate') }}" method="POST" class="mb-4">
        @csrf
        <button type="submit" class="btn btn-primary">Generar Nuevo Sello</button>
    </form>

    <!-- Tabla de Sellos -->
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Número de Sello</th>
                <th>Usuario</th>
                <th>Fecha</th>
                <th>Observación</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($sellos as $sello)
            <tr>
                <td>{{ $sello->numero_sello }}</td>
                <td>{{ $sello->user ? $sello->user->name : 'Disponible' }}</td>
                <td>{{ $sello->fecha->format('d/m/Y H:i') }}</td>
                <td>{{ $sello->observacion }}</td>
                <td>
                    @if(!$sello->user)
                    <form action="{{ route('seal-numbers.reserve', $sello->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-sm btn-success">Reservar</button>
                    </form>
                    @else
                    <span class="text-muted">Reservado</span>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Paginación -->
    {{ $sellos->links() }}
</div>
@endsection
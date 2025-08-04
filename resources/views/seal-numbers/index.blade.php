@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h2 class="mb-0">
                <i class="fas fa-stamp"></i> Generador de Sellos
            </h2>
        </div>
        
        <div class="card-body">
            <!-- Mensajes de sesión... -->
            
            @if($isAdmin)
            <div class="mb-4">
                <form action="{{ route('seal-numbers.generate') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-plus-circle"></i> Generar Nuevo Sello
                    </button>
                </form>
            </div>
            @endif
            
            <div class="table-responsive">
                <table class="table table-hover table-bordered">
                    <thead class="thead-light">
                        <tr>
                            <th>Número</th>
                            <th>Generado por</th>
                            <th>Reservado por</th>
                            <th>Fecha</th>
                            <th>Estado</th>
                            <th>Observación</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($sellos as $sello)
                        <tr>
                            <td class="font-weight-bold">{{ $sello->numero_sello }}</td>
                            <td>
                                {{ $sello->generador->name ?? 'N/A' }}
                                @if($sello->generador)
                                    <small class="text-muted">({{ $sello->generador->ci }})</small>
                                @endif
                            </td>
                            <td>
                                @if($sello->estado === 'reservado' && $sello->user)
                                    {{ $sello->user->name }}
                                    <small class="text-muted">({{ $sello->user->ci }})</small>
                                @else
                                    -
                                @endif
                            </td>
                            <td>{{ $sello->fecha->format('d/m/Y H:i') }}</td>
                            <td>
                                @if($sello->estado === 'disponible')
                                    <span class="badge badge-success">Disponible</span>
                                @else
                                    <span class="badge badge-primary">Reservado</span>
                                @endif
                            </td>
                            <td>{{ $sello->observacion }}</td>
                            <td>
                                @if($sello->estado === 'disponible')
                                <form action="{{ route('seal-numbers.reserve', $sello->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-success">
                                        <i class="fas fa-check"></i> Reservar
                                    </button>
                                </form>
                                @else
                                <span class="text-muted">Reservado</span>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
            {{ $sellos->links() }}
        </div>
    </div>
</div>
@endsection
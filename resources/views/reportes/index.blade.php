@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Reportes de Inventario (Entradas y Salidas)</h1>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nro.</th>
                <th>Tipo</th>
                <th>Código</th>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Usuario</th>
                <th>Departamento</th>
                <th>Fecha</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($reportes as $reporte)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $reporte->tipo }}</td>
                    <td>{{ $reporte->item->codigo }}</td>
                    <td>{{ $reporte->item->nombre }}</td>
                    <td>{{ $reporte->cantidad }}</td>
                    <td>{{ $reporte->user?->nombre ?? '-' }}</td>
                    <td>{{ $reporte->departamento?->nombre ?? '-' }}</td>
                    <td>{{ $reporte->fecha->format('d/m/Y') }}</td>
                </tr>
            @empty
                <tr><td colspan="8">No hay reportes registrados.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
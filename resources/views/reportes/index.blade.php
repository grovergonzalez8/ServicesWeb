@extends('layouts.app') <!-- Asegúrate de tener un layout base llamado app.blade.php -->

@section('content')
<div class="container">
    <h1 class="mb-4">Listado de Reportes</h1>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Item</th>
                <th>Usuario</th>
                <th>Departamento</th>
                <th>Título</th>
                <th>Contenido</th>
                <th>Tipo</th>
                <th>Observación</th>
                <th>Fecha</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reportes as $reporte)
                <tr>
                    <td>{{ $reporte->id }}</td>
                    <td>{{ $reporte->item->nombre ?? 'N/A' }}</td>
                    <td>{{ $reporte->user->name ?? 'N/A' }} (CI: {{ $reporte->user->ci ?? '' }})</td>
                    <td>{{ $reporte->departamento->nombre ?? 'N/A' }}</td>
                    <td>{{ $reporte->titulo }}</td>
                    <td>{{ $reporte->contenido }}</td>
                    <td>{{ $reporte->tipo ?? '-' }}</td>
                    <td>{{ $reporte->observacion ?? '-' }}</td>
                    <td>{{ $reporte->fecha->format('Y-m-d H:i') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
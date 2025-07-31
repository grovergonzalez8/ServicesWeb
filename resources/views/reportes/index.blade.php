@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Reporte de Entradas y Salidas</h1>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Tipo</th>
                <th>Fecha</th>
                <th>Item</th>
                <th>Departamento</th>
                <th>Usuario</th>
                <th>Cantidad</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reportes as $reporte)
            <tr>
                <td>{{ $reporte->tipo }}</td>
                <td>{{ $reporte->fecha->format('Y-m-d H:i') }}</td>
                <td>{{ $reporte->item->nombre ?? '-' }}</td>
                <td>{{ $reporte->departamento->nombre ?? '-' }}</td>
                <td>{{ $reporte->user->nombre ?? '-' }}</td>
                <td>{{ $reporte->cantidad }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
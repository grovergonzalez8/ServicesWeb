@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Salidas de Inventario</h1>

    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Item</th>
                <th>Cantidad</th>
                <th>Usuario</th>
                <th>Departamento</th>
                <th>Fecha</th>
                <th>Observación</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($outputs as $index => $output)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $output->item->nombre }}</td>
                    <td>{{ $output->cantidad }}</td>
                    <td>{{ $output->user->nombre }}</td>
                    <td>{{ $output->departamento->nombre }}</td>
                    <td>{{ $output->fecha->format('Y-m-d H:i') }}</td>
                    <td>{{ $output->observacion }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Reportes</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-5">
    <h1 class="mb-4">Lista de Reportes</h1>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Nro</th>
                <th>Item</th>
                <th>Usuario</th>
                <th>Departamento</th>
                <th>Título</th>
                <th>Contenido</th>
                <th>Fecha</th>
                <th>Tipo</th>
                <th>Observación</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reportes as $i => $reporte)
                <tr>
                    <td>{{ $i + 1 }}</td>
                    <td>{{ $reporte->item->nombre ?? 'N/A' }}</td>
                    <td>{{ $reporte->user->nombre ?? 'N/A' }} (CI: {{ $reporte->user_ci }})</td>
                    <td>{{ $reporte->departamento->nombre ?? 'N/A' }}</td>
                    <td>{{ $reporte->titulo }}</td>
                    <td>{{ $reporte->contenido }}</td>
                    <td>{{ \Carbon\Carbon::parse($reporte->fecha)->format('d/m/Y H:i') }}</td>
                    <td>{{ $reporte->tipo ?? '-' }}</td>
                    <td>{{ $reporte->observacion ?? '-' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel de Administración</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-dark bg-dark px-3">
        <a class="navbar-brand" href="{{ route('admin.dashboard') }}">Admin Panel</a>
    </nav>

    <div class="container mt-4">
        <h2>Bienvenido al Panel de Administración</h2>

        <div class="row mt-4">
            <div class="col-md-3">
                <a href="/users" class="btn btn-outline-primary w-100 mb-2">Usuarios</a>
            </div>
            <div class="col-md-3">
                <a href="/departamentos" class="btn btn-outline-primary w-100 mb-2">Departamentos</a>
            </div>
            <div class="col-md-3">
                <a href="/items" class="btn btn-outline-primary w-100 mb-2">Items</a>
            </div>
            <div class="col-md-3">
                <a href="/inventory-entries" class="btn btn-outline-primary w-100 mb-2">Entradas</a>
            </div>
            <div class="col-md-3">
                <a href="/inventory-outputs" class="btn btn-outline-primary w-100 mb-2">Salidas</a>
            </div>
            <div class="col-md-3">
                <a href="/reportes" class="btn btn-outline-primary w-100 mb-2">Reportes</a>
            </div>
            <div class="col-md-3">
                <a href="/seal-numbers" class="btn btn-outline-primary w-100 mb-2">Nros. de Sello</a>
            </div>
            <div class="col-md-3">
                <a href="/letter-numbers" class="btn btn-outline-primary w-100 mb-2">Nros. de Carta</a>
            </div>
        </div>
    </div>
</body>
</html>
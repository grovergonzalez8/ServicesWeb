@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold mb-6">Lista de Departamentos</h1>

    <a href="{{ route('departamentos.create') }}" class="mb-4 inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
        + Nuevo Departamento
    </a>

    <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
        <thead class="bg-gray-100 text-gray-700 text-left">
            <tr>
                <th class="px-4 py-2">#</th>
                <th class="px-4 py-2">Nombre</th>
                <th class="px-4 py-2">Descripción</th>
                <th class="px-4 py-2">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($departamentos as $index => $departamento)
            <tr class="border-t hover:bg-gray-50">
                <td class="px-4 py-2">{{ $index + 1 }}</td>
                <td class="px-4 py-2">{{ $departamento->nombre }}</td>
                <td class="px-4 py-2">{{ $departamento->descripcion }}</td>
                <td class="px-4 py-2 flex space-x-2">
                    <a href="{{ route('departamentos.edit', $departamento->id) }}" class="text-blue-600 hover:underline">Editar</a>
                    <form action="{{ route('departamentos.destroy', $departamento->id) }}" method="POST" onsubmit="return confirm('¿Eliminar este departamento?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:underline">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
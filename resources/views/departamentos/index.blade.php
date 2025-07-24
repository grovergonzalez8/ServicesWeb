@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold mb-4">Departamentos</h1>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="mb-4">
        <a href="{{ route('departamentos.create') }}" class="btn btn-primary">
            + Nuevo Departamento
        </a>
    </div>

    <div class="bg-white shadow-md rounded p-4">
        <table class="min-w-full">
            <thead>
                <tr>
                    <th class="py-2 px-4 text-left">#</th>
                    <th class="py-2 px-4 text-left">Nombre</th>
                    <th class="py-2 px-4 text-left">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($departamentos as $index => $departamento)
                    <tr class="border-t">
                        <td class="py-2 px-4">{{ $index + 1 }}</td>
                        <td class="py-2 px-4">{{ $departamento->nombre }}</td>
                        <td class="py-2 px-4 flex space-x-2">
                            <a href="{{ route('departamentos.edit', $departamento->id) }}" class="btn btn-warning btn-sm">
                                Editar
                            </a>

                            <form action="{{ route('departamentos.destroy', $departamento->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar este departamento?')" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">
                                    Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach

                @if ($departamentos->isEmpty())
                    <tr>
                        <td colspan="3" class="py-4 text-center text-gray-500">No hay departamentos registrados.</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
@endsection
@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold mb-4">Editar Departamento</h1>

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>• {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('departamentos.update', $departamento->id) }}" method="POST" class="bg-white p-6 rounded shadow-md">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre del Departamento</label>
            <input type="text" name="nombre" id="nombre" value="{{ old('nombre', $departamento->nombre) }}" required
                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
        </div>

        <div class="flex justify-end">
            <a href="{{ route('departamentos.index') }}" class="bg-gray-300 text-gray-800 px-4 py-2 rounded mr-2">Cancelar</a>
            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Actualizar</button>
        </div>
    </form>
</div>
@endsection
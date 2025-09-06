@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4 max-w-xl">
    <h1 class="text-2xl font-bold text-indigo-700 mb-6 text-center">Editar Reporte</h1>

    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('reportes.update', $reporte->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label for="titulo" class="block text-sm font-medium text-gray-700">Título</label>
            <input type="text" name="titulo" id="titulo" class="w-full mt-1 border border-gray-300 p-2 rounded" value="{{ old('titulo', $reporte->titulo) }}" required>
        </div>

        <div>
            <label for="descripcion" class="block text-sm font-medium text-gray-700">Descripción</label>
            <textarea name="descripcion" id="descripcion" class="w-full mt-1 border border-gray-300 p-2 rounded" rows="4">{{ old('descripcion', $reporte->descripcion) }}</textarea>
        </div>

        <div>
            <label for="fecha" class="block text-sm font-medium text-gray-700">Fecha</label>
            <input type="date" name="fecha" id="fecha" class="w-full mt-1 border border-gray-300 p-2 rounded" value="{{ old('fecha', $reporte->fecha) }}" required>
        </div>

        <div class="flex justify-between">
            <a href="{{ route('reportes.index') }}" class="text-sm text-gray-600 hover:underline">← Volver</a>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Actualizar</button>
        </div>
    </form>
</div>
@endsection

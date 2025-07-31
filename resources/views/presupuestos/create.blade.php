@extends('layouts.app')

@section('title', 'Nuevo Presupuesto | SAP Aurora')

@section('content')
    <h1 class="text-3xl font-bold mb-6 text-indigo-700">Crear Nuevo Presupuesto</h1>

    @if ($errors->any())
        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('presupuestos.store') }}" method="POST" class="bg-white shadow rounded p-6 max-w-xl">
        @csrf

        <div class="mb-4">
            <label for="nombre_partida" class="block text-sm font-medium text-gray-700">Nombre de la Partida</label>
            <input type="text" name="nombre_partida" id="nombre_partida" value="{{ old('nombre_partida') }}"
                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
        </div>

        <div class="mb-4">
            <label for="monto_asignado" class="block text-sm font-medium text-gray-700">Monto Asignado</label>
            <input type="number" step="0.01" name="monto_asignado" id="monto_asignado" value="{{ old('monto_asignado') }}"
                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
        </div>

        <div class="mb-4">
            <label for="fecha_creacion" class="block text-sm font-medium text-gray-700">Fecha de Creación</label>
            <input type="date" name="fecha_creacion" id="fecha_creacion" value="{{ old('fecha_creacion') }}"
                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
        </div>

        <div class="flex justify-end space-x-3">
            <a href="{{ route('presupuestos.index') }}"
               class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-4 py-2 rounded-md text-sm">Cancelar</a>
            <button type="submit"
                    class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-md text-sm">Guardar</button>
        </div>
    </form>
@endsection

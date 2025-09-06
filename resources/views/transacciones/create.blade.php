@extends('layouts.app')

@section('title', 'Crear Transacción | SAP Aurora')

@section('content')
<div class="max-w-xl mx-auto bg-white p-6 rounded shadow">
    <h1 class="text-2xl font-bold mb-4 text-indigo-700">Nueva Transacción</h1>

    <form action="{{ route('transacciones.store') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label for="descripcion" class="block text-sm font-semibold text-gray-600">Descripción</label>
            <input type="text" name="descripcion" id="descripcion" class="w-full border rounded px-3 py-2 mt-1" required>
        </div>

        <div class="mb-4">
            <label for="monto" class="block text-sm font-semibold text-gray-600">Monto</label>
            <input type="number" name="monto" id="monto" step="0.01" class="w-full border rounded px-3 py-2 mt-1" required>
        </div>

        <div class="mb-4">
            <label for="fecha" class="block text-sm font-semibold text-gray-600">Fecha</label>
            <input type="date" name="fecha" id="fecha" class="w-full border rounded px-3 py-2 mt-1" required>
        </div>

        <div class="mb-4">
            <label for="presupuesto_id" class="block text-sm font-semibold text-gray-600">Presupuesto</label>
            <select name="presupuesto_id" id="presupuesto_id" class="w-full border rounded px-3 py-2 mt-1" required>
                @foreach($presupuestos as $presupuesto)
                    <option value="{{ $presupuesto->id }}">{{ $presupuesto->nombre }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">Guardar</button>
    </form>
</div>
@endsection

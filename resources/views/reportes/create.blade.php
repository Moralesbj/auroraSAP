@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold text-indigo-700 mb-6 text-center">Registrar Nuevo Reporte</h1>

    <form action="{{ route('reportes.store') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label for="titulo" class="block">Título</label>
            <input type="text" name="titulo" id="titulo" class="w-full border p-2" required>
        </div>

        <div class="mb-4">
            <label for="descripcion" class="block">Descripción</label>
            <textarea name="descripcion" id="descripcion" class="w-full border p-2"></textarea>
        </div>

        <div class="mb-4">
            <label for="fecha" class="block">Fecha</label>
            <input type="date" name="fecha" id="fecha" class="w-full border p-2" required>
        </div>

        <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded">Guardar</button>
    </form>
</div>
@endsection

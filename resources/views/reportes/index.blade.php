@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold text-indigo-700 mb-6 text-center">Lista de Reportes</h1>

    <a href="{{ route('reportes.create') }}" class="bg-indigo-600 text-white px-4 py-2 rounded mb-4 inline-block">Nuevo Reporte</a>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-2 rounded mb-4">{{ session('success') }}</div>
    @endif

    <table class="table-auto w-full text-left">
        <thead>
            <tr>
                <th class="px-4 py-2">Título</th>
                <th class="px-4 py-2">Fecha</th>
                <th class="px-4 py-2">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($reportes as $reporte)
            <tr class="border-t">
                <td class="px-4 py-2">{{ $reporte->titulo }}</td>
                <td class="px-4 py-2">{{ $reporte->fecha }}</td>
                <td class="px-4 py-2 space-x-2">
                    <a href="{{ route('reportes.edit', $reporte) }}" class="text-blue-500">Editar</a>
                    <form action="{{ route('reportes.destroy', $reporte) }}" method="POST" class="inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500" onclick="return confirm('¿Eliminar este reporte?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="3" class="px-4 py-2 text-center">No hay reportes.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div class="mt-4">
        {{ $reportes->links() }}
    </div>
</div>
@endsection

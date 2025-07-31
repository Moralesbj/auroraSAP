@extends('layouts.app')

@section('title', 'Presupuestos | SAP Aurora')

@section('content')
    <h1 class="text-3xl font-bold mb-6 text-indigo-700">Listado de Presupuestos</h1>

    @if(session('success'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="flex justify-end mb-4">
        <a href="{{ route('presupuestos.create') }}" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700 text-sm">
            + Nuevo Presupuesto
        </a>
    </div>

    <div class="bg-white shadow rounded p-6 overflow-x-auto">
        <table class="min-w-full table-auto">
            <thead>
                <tr class="bg-gray-100 text-gray-600 text-sm uppercase">
                    <th class="py-3 px-4 border-b">#</th>
                    <th class="py-3 px-4 border-b">Nombre Partida</th>
                    <th class="py-3 px-4 border-b">Monto Asignado</th>
                    <th class="py-3 px-4 border-b">Fecha de Creación</th>
                    <th class="py-3 px-4 border-b">Acciones</th>
                </tr>
            </thead>
            <tbody class="text-sm text-gray-700">
                @forelse ($presupuestos as $presupuesto)
                    <tr class="hover:bg-gray-50">
                        <td class="py-3 px-4 border-b">{{ $loop->iteration }}</td>
                        <td class="py-3 px-4 border-b">{{ $presupuesto->nombre_partida }}</td>
                        <td class="py-3 px-4 border-b">${{ number_format($presupuesto->monto_asignado, 2, ',', '.') }}</td>
                        <td class="py-3 px-4 border-b">{{ \Carbon\Carbon::parse($presupuesto->fecha_creacion)->format('Y-m-d') }}</td>
                        <td class="py-3 px-4 border-b space-x-2">
                            <a href="{{ route('presupuestos.edit', $presupuesto) }}" class="text-yellow-600 hover:underline text-sm">Editar</a>
                            <form action="{{ route('presupuestos.destroy', $presupuesto) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('¿Seguro que deseas eliminar este presupuesto?')" class="text-red-600 hover:underline text-sm">
                                    Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="py-4 px-4 text-center text-gray-500">No hay presupuestos registrados.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection

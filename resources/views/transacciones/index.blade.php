@extends('layouts.app')

@section('title', 'Transacciones | SAP Aurora')

@section('content')
    <h1 class="text-3xl font-bold mb-6 text-indigo-700">Transacciones Registradas</h1>

    <!-- Tarjetas resumen -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4 mb-8">
        <div class="bg-white p-5 rounded shadow border-l-4 border-green-500">
            <h2 class="text-sm text-gray-500">Total Ingresos</h2>
            <p class="text-2xl font-bold text-gray-800">$125,000</p>
        </div>
        <div class="bg-white p-5 rounded shadow border-l-4 border-red-500">
            <h2 class="text-sm text-gray-500">Total Egresos</h2>
            <p class="text-2xl font-bold text-gray-800">$85,000</p>
        </div>
        <div class="bg-white p-5 rounded shadow border-l-4 border-indigo-500">
            <h2 class="text-sm text-gray-500">Transacciones Hoy</h2>
            <p class="text-2xl font-bold text-gray-800">3</p>
        </div>
        <div class="bg-white p-5 rounded shadow border-l-4 border-yellow-500">
            <h2 class="text-sm text-gray-500">Balance Actual</h2>
            <p class="text-2xl font-bold text-gray-800">$40,000</p>
        </div>
    </div>

    <!-- Tabla de transacciones -->
    <div class="bg-white shadow rounded p-6">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl font-semibold text-gray-700">Historial de Transacciones</h2>
            <a href="#" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700 text-sm">+ Nueva Transacción</a>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full table-auto border-collapse">
                <thead>
                    <tr class="bg-gray-100 text-gray-600 text-sm uppercase">
                        <th class="py-3 px-4 border-b">#</th>
                        <th class="py-3 px-4 border-b">Tipo</th>
                        <th class="py-3 px-4 border-b">Monto</th>
                        <th class="py-3 px-4 border-b">Descripción</th>
                        <th class="py-3 px-4 border-b">Fecha</th>
                        <th class="py-3 px-4 border-b">Acciones</th>
                    </tr>
                </thead>
                <tbody class="text-sm text-gray-700">
                    <tr class="hover:bg-gray-50">
                        <td class="py-3 px-4 border-b">1</td>
                        <td class="py-3 px-4 border-b text-green-600 font-bold">Ingreso</td>
                        <td class="py-3 px-4 border-b">$5,000</td>
                        <td class="py-3 px-4 border-b">Pago de servicios</td>
                        <td class="py-3 px-4 border-b">2025-06-30</td>
                        <td class="py-3 px-4 border-b">
                            <a href="#" class="text-indigo-600 hover:underline text-sm">Ver</a> |
                            <a href="#" class="text-yellow-600 hover:underline text-sm">Editar</a> |
                            <a href="#" class="text-red-600 hover:underline text-sm">Eliminar</a>
                        </td>
                    </tr>
                    <!-- Más transacciones de ejemplo -->
                </tbody>
            </table>
        </div>
    </div>
@endsection

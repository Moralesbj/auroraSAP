@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto mt-10 bg-white shadow rounded-lg p-6">
    <h2 class="text-2xl font-bold text-indigo-700 mb-4">Detalle de Transacción</h2>

    <ul class="space-y-2">
        <li><strong>Descripción:</strong> {{ $transaccion->descripcion }}</li>
        <li><strong>Monto:</strong> ${{ number_format($transaccion->monto, 2) }}</li>
        <li><strong>Fecha:</strong> {{ \Carbon\Carbon::parse($transaccion->fecha)->format('d/m/Y') }}</li>
        <li><strong>Presupuesto:</strong> {{ $transaccion->presupuesto->nombre ?? 'N/A' }}</li>
    </ul>

    <div class="mt-4">
        <a href="{{ route('transacciones.edit', $transaccion) }}" class="text-indigo-600 hover:underline">Editar</a> |
        <a href="{{ route('transacciones.index') }}" class="text-gray-600 hover:underline">Volver</a>
    </div>
</div>
@endsection
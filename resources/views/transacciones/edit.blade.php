@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto mt-10 bg-white shadow rounded-lg p-6">
    <h2 class="text-2xl font-bold mb-4 text-indigo-700">Editar Transacción</h2>

    <form action="{{ route('transacciones.update', $transaccion) }}" method="POST">
        @csrf
        @method('PUT')
        @include('transacciones.form')
        <div class="mt-4">
            <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">
                Actualizar
            </button>
            <a href="{{ route('transacciones.index') }}" class="ml-2 text-gray-600 hover:text-gray-800">Cancelar</a>
        </div>
    </form>
</div>
@endsection

{{--
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 
--}}
@extends('layouts.app')

@section('title', 'Inicio | SAP Aurora')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Bienvenido, {{ Auth::user()->name }}</h1>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div class="bg-white p-4 shadow rounded">
            <h2 class="text-lg font-semibold">Presupuestos</h2>
            <p>Total: 5</p>
        </div>
        <div class="bg-white p-4 shadow rounded">
            <h2 class="text-lg font-semibold">Transacciones</h2>
            <p>Total: 18</p>
        </div>
        <div class="bg-white p-4 shadow rounded">
            <h2 class="text-lg font-semibold">Reportes</h2>
            <p>Último: junio 2025</p>
        </div>
    </div>
@endsection



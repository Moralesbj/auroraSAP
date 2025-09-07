{{-- resources/views/auth/register.blade.php --}}
@extends('layouts.guest')

@section('content')
    <h2 class="text-2xl font-bold mb-6 text-center text-indigo-700">Registrarse</h2>

    {{-- Mostrar errores --}}
    @if ($errors->any())
        <div class="mb-4 p-3 bg-red-100 border border-red-400 text-red-700 rounded">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Formulario de registro --}}
    <form method="POST" action="{{ route('register') }}">
        @csrf

        {{-- Nombre --}}
        <div class="mb-4">
            <label for="name" class="block text-gray-700 font-semibold">Nombre completo</label>
            <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus
                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200">
        </div>

        {{-- Email --}}
        <div class="mb-4">
            <label for="email" class="block text-gray-700 font-semibold">Correo electrónico</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required
                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200">
        </div>

        {{-- Contraseña --}}
        <div class="mb-4">
            <label for="password" class="block text-gray-700 font-semibold">Contraseña</label>
            <input id="password" type="password" name="password" required
                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200">
        </div>

        {{-- Confirmar contraseña --}}
        <div class="mb-4">
            <label for="password_confirmation" class="block text-gray-700 font-semibold">Confirmar contraseña</label>
            <input id="password_confirmation" type="password" name="password_confirmation" required
                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200">
        </div>

        {{-- Botón registrar + enlace login --}}
        <div class="flex items-center justify-between">
            <a class="text-sm text-indigo-600 hover:underline" href="{{ route('login') }}">
                ¿Ya tienes cuenta?
            </a>

            <button type="submit"
                    class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700 transition">
                Registrarse
            </button>
        </div>
    </form>
@endsection
 
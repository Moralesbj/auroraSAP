@extends('layouts.app')

@section('content')
<div class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="w-full max-w-md bg-white rounded-2xl shadow-lg p-8">
        <h1 class="text-2xl font-bold text-center mb-6">Iniciar Sesión</h1>

        {{-- Mensajes de estado --}}
        @if (session('status'))
            <div class="mb-4 text-green-600 font-medium">
                {{ session('status') }}
            </div>
        @endif

        {{-- Errores --}}
        @if ($errors->any())
            <div class="mb-4 text-red-600 font-medium">
                {{ $errors->first() }}
            </div>
        @endif

        {{-- Formulario de login --}}
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-4">
                <label class="block text-sm font-medium">Correo electrónico</label>
                <input type="email" name="email" required autofocus
                       class="w-full mt-1 px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium">Contraseña</label>
                <input type="password" name="password" required
                       class="w-full mt-1 px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <button type="submit"
                    class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition">
                Ingresar
            </button>
        </form>

        {{-- Enlace a registro --}}
        <p class="text-center mt-4 text-sm text-gray-600">
            ¿No tienes una cuenta?
            <a href="{{ route('register') }}" class="text-blue-600 font-semibold hover:underline">
                Regístrate aquí
            </a>
        </p>
    </div>
</div>
@endsection

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SAP Aurora</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>
<body class="bg-gray-100 flex">

    @auth
        {{-- Sidebar --}}
        <aside class="w-64 bg-indigo-700 text-white min-h-screen shadow-lg">
            <div class="p-4 text-2xl font-bold border-b border-indigo-500">
                SAP Aurora
            </div>
            <nav class="p-4 space-y-2">
                <a href="{{ route('dashboard') }}" class="block px-3 py-2 rounded-lg hover:bg-indigo-600">📊Dashboard</a>
                <a href="{{ route('presupuestos.index') }}" class="block px-3 py-2 rounded-lg hover:bg-indigo-600">💰Presupuestos</a>
                <a href="{{ route('transacciones.index') }}" class="block px-3 py-2 rounded-lg hover:bg-indigo-600">🔄Transacciones</a>
                <a href="{{ route('reportes.index') }}" class="block px-3 py-2 rounded-lg hover:bg-indigo-600">📑 Reportes</a>
                <a href="{{ route('usuarios.index') }}" class="block px-3 py-2 rounded-lg hover:bg-indigo-600">👥 Usuarios</a>
            </nav>
        </aside>
    @endauth

    {{-- Contenedor principal --}}
    <div class="flex-1 flex flex-col min-h-screen">

        {{-- Header --}}
        <header class="bg-white shadow-md p-4 flex justify-between items-center">
            <h1 class="text-xl font-bold text-indigo-700">Panel de Administración</h1>

            <div class="flex items-center space-x-4">
                @auth
                    <span class="text-gray-700">Hola, {{ Auth::user()->name }}</span>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" 
                            class="px-3 py-1 bg-red-500 text-white rounded-lg hover:bg-red-600 transition">
                            Cerrar sesión
                        </button>
                    </form>
                @endauth

                @guest
                    <a href="{{ route('login') }}" 
                       class="px-3 py-1 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition">
                        Iniciar sesión
                    </a>
                @endguest
            </div>
        </header>

        {{-- Contenido dinámico --}}
        <main class="flex-1 p-6">
            @yield('content')
        </main>
    </div>

    @yield('scripts')
</body>
</html>

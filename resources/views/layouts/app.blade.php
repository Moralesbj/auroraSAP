<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Dashboard | SAP Aurora')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">

    <!-- Barra de navegación -->
    <nav class="bg-white shadow">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <a href="{{ route('dashboard') }}" class="flex items-center text-xl font-bold text-indigo-600">
                        SAP Aurora
                    </a>
                    <div class="ml-10 flex space-x-4">
                        <a href="{{ route('dashboard') }}" class="text-gray-700 hover:text-indigo-600">Inicio</a>
                        <a href="{{ route('presupuestos.index') }}" class="text-gray-700 hover:text-indigo-600">Presupuestos</a>
                        <a href="{{ route('transacciones.index') }}" class="text-gray-700 hover:text-indigo-600">Transacciones</a>
                        <a href="{{ route('reportes.index') }}" class="text-gray-700 hover:text-indigo-600">Reportes</a>
                        @if(Auth::user() && Auth::user()->role === 'admin')
                            <a href="{{ route('usuarios.index') }}" class="text-gray-700 hover:text-indigo-600">Usuarios</a>
                        @endif
                    </div>
                </div>

                <div class="flex items-center space-x-4">
                    <span class="text-sm text-gray-600">{{ Auth::user()->name }}</span>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="text-sm text-red-500 hover:underline" type="submit">Salir</button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <!-- Contenido -->
    <main class="p-6">
        @yield('content')
    </main>

</body>
</html>

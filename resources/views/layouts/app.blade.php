<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Título de tu Aplicación</title>
    {{-- Agrega tus estilos CSS aquí --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <header style="background-color: #333; color: white; padding: 10px;">
    <nav>
        <a href="#" onclick="window.history.back(); return false;">Regresar</a>
        {{-- Agrega otros enlaces de navegación aquí --}}
    </nav>
    </header>

    <main class="container" style="margin: 20px;">
        @yield('content') {{-- Aquí se insertará el contenido específico de cada vista --}}
    </main>

<<<<<<< HEAD
    <footer style="background-color: #333; color: white; padding: 10px;">
        {{-- Agrega el contenido del pie de página --}}
    </footer>
</body>
=======
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                @yield('content')
            </main>
        </div>

        <head>
            <!-- ... otras etiquetas ... -->
            <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
        </head>
        
    </body>
>>>>>>> 60657667c466f84a8bea916434dfa667988f6e99
</html>


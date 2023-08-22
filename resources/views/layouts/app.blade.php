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

    <footer style="background-color: #333; color: white; padding: 10px;">
        {{-- Agrega el contenido del pie de página --}}
    </footer>
</body>
</html>


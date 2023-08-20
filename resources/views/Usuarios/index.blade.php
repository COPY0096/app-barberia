<!DOCTYPE html>
<html lang="es">
<head>
    <title>Salón de Belleza - Servicios y Citas</title>
    <!-- Tus encabezados aquí (si los tienes) -->
</head>
<body>

    <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
        @if (Route::has('login'))
            <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                @auth
                    <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                    @endif
                @endauth
            </div>
        @endif
        <!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }

        header {
            background-color: #2c3e50;
            color: white;
            text-align: center;
            padding: 2rem;
        }

        h1, h2 {
            margin: 0;
        }

        ul {
            list-style: disc;
            padding-left: 1.5rem;
        }

        section {
            padding: 2rem;
            border-top: 1px solid #ccc;
            background-color: white;
            margin: 1rem;
            border-radius: 4px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .btn {
            display: inline-block;
            padding: 0.5rem 1rem;
            background-color: #3498db;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #2980b9;
        }

        .service-btn {
            display: inline-block;
            padding: 0.5rem 1rem;
            background-color: #e74c3c;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }

        .service-btn:hover {
            background-color: #c0392b;
        }
        
        .contact-info {
            font-size: 1.2rem;
            margin-top: 1rem;
        }
    </style>
    <title>BarberShop101</title>
</head>
<body>

<div class="bg-gray-900 text-white p-4">
    <h1 class="text-3xl font-semibold">BarberShop101</h1>
</div>

<header>
    <h1 class="text-2xl font-semibold">¡Bienvenido a nuestro Salón!</h1>
    <h2 class="text-xl font-medium">Explora nuestros Servicios</h2>
    <a href="{{ route('mostrar') }}" class="btn">Mostrar Productos</a>

    <ul>
        <h2 class="text-xl font-medium">Servicios de Barberia</h2>
        @foreach ($serviciosPeluqueria as $servicio)
            <li>{{ $servicio }}</li>
        @endforeach
    </ul>

    <h2 class="text-xl font-medium">Servicios de Spa</h2>
    <ul>
        @foreach ($serviciosSpa as $servicio)
            <li>{{ $servicio }}</li>
        @endforeach
    </ul>
</header>

<section>
    <h2 class="text-2xl font-semibold">Descubre nuestra Misión</h2>
    <p>{{ $mision }}</p>
</section>

<section>
    <h2 class="text-2xl font-semibold">Vislumbra nuestra Visión</h2>
    <p>{{ $vision }}</p>
</section>

<section>
    <h2 class="text-2xl font-semibold">Contáctanos</h2>
    <p class="contact-info">Ubicación: {{ $direccion }}</p>
    <p class="contact-info">Teléfono: {{ $telefono }}</p>
    <p class="contact-info">Correo: {{ $correo }}</p>
</section>

<section>
    <h2 class="text-2xl font-semibold">Reserva un Servicio</h2>
    <p>¿Listo para lucir increíble?</p>
    <a href="{{ url('/redireccionar') }}" class="service-btn">Reservar Ahora</a>
</section>


</body>
</html>

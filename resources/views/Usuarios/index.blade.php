<!-- resources/views/index.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Salón de Belleza - Servicios y Cita</title>
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
                <div>
                    <h1>BarberShop101</h1>
                </div>

                </div>
            </div>
        </div>









    <header>
        <h1>Nuestros Servicios</h1>
        <h2>Servicios de Peluquería</h2>
        <ul>
            @foreach ($serviciosPeluqueria as $servicio)
                <li>{{ $servicio }}</li>
            @endforeach
        </ul>

        <h2>Servicios de Spa</h2>
        <ul>
            @foreach ($serviciosSpa as $servicio)
                <li>{{ $servicio }}</li>
            @endforeach
        </ul>
    </header>   

    <section>
        <h2>Misión Empresarial</h2>
        <p>{{ $mision }}</p>
    </section>

    <section>
        <h2>Visión Empresarial</h2>
        <p>{{ $vision }}</p>
    </section>

    <section>
        <h2>Contacto</h2>
        <p>Estamos ubicados en: {{ $direccion }}</p>
        <p>Teléfono de contacto: {{ $telefono }}</p>
        <p>Correo electrónico: {{ $correo }}</p>
    </section>


</body>
</html>

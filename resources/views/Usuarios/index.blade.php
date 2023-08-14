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







        <!DOCTYPE html>
        <html lang="es">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Nuestros Servicios</title>
            <style>
                body {
                    font-family: 'Helvetica Neue', sans-serif;
                    margin: 0;
                    padding: 0;
                    background-color: #f7f7f7;
                }
        
                header {
                    background-color: #ffbf80;
                    padding: 20px;
                    text-align: center;
                }
        
                h1 {
                    color: #fff;
                    margin-bottom: 10px;
                }
        
                h2 {
                    color: #ff8c00;
                    margin-top: 20px;
                }
        
                ul {
                    list-style: none;
                    padding: 0;
                }
        
                li {
                    margin-bottom: 5px;
                    color: #555;
                }
        
                section {
                    padding: 20px;
                    border-top: 1px solid #ddd;
                }
        
                p {
                    line-height: 1.6;
                    color: #777;
                }
        
                .service-btn {
                    background-color: #ff8c00;
                    color: #fff;
                    padding: 8px 15px;
                    border: none;
                    border-radius: 5px;
                    cursor: pointer;
                    transition: background-color 0.3s;
                }
        
                .service-btn:hover {
                    background-color: #ff6b00;
                }
            </style>
        </head>
        <body>
            <header>
                <h1>¡Bienvenido a nuestro Salón!</h1>
                <h2>Explora nuestros Servicios</h2>
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
                <h2>Descubre nuestra Misión</h2>
                <p>{{ $mision }}</p>
            </section>
        
            <section>
                <h2>Vislumbra nuestra Visión</h2>
                <p>{{ $vision }}</p>
            </section>
        
            <section>
                <h2>Contáctanos</h2>
                <p>Ubicación: {{ $direccion }}</p>
                <p>Teléfono: {{ $telefono }}</p>
                <p>Correo: {{ $correo }}</p>
            </section>

            <!DOCTYPE html>
<html lang="es">
<head>
    <!-- Tus encabezados aquí -->
</head>
<body>
    <!-- Tu contenido actual aquí -->   
    <section>
        <h2>Reserva un Servicio</h2>
        <p>¿Listo para lucir increíble?</p>
        <a href="{{ url('/redireccionar') }}" class="service-btn">Reservar Ahora</a>
    </section>
</body>
</html>

        </body>
        </html>
        


</body>
</html>

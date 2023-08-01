<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link rel="shortcut icon" type="image/png" href="{{ asset('img/logo-img.png') }}">
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        <script src="https://kit.fontawesome.com/4240342587.js"></script>
        <script src="{{ asset('jquery.js') }}"></script>
        @vite(['resources/css/app.scss', 'resources/js/app.js'])
        @vite(['resources/css/style.css', 'resources/js/main.js'])
        
    </head>
    <body class="body-admin">

        @section('header')
            <div class="header-admin">
                <div class="barra-navegacion-lateral">
                    <div class="menu-lateral">

                        <div class="py-2 text-center bg-verde barra-movil">
                            <h3 class="texto-grande"><i class="fa-solid fa-user-shield"></i> Admin - Barberia</h3>
                            <div class="boton-cont-navegacion">
                                <i class="fa-solid fa-bars"></i>
                            </div>
                        </div>
                    </div>
                    <nav class="menu-lateral navegacion-admin">
                        
                        <div class="">
                            {{-- <a href="{{ route('admin.edit') }}" class="text-decoration-none"> --}}
                                <div class="py-4 border-bottom px-3 d-flex align-items-center justify-content-around">
                                    <div class="cont-img-menu">
                                        <img src="{{ isset(Auth::user()->imagen) ? route('admin.image', ['nombre_imagen' => Auth::user()->imagen]) : '' }}" alt="">
                                    </div>
                                    <h4 class="texto-mediano text-white ms-1">{{ Auth::user()->nombre ?? ''}} <span class="d-block fs-6">Barbero</span></h4>
                                </div>
                            </a>
                            
                            <ul class="cont-enlaces-menu">
                                <li>
                                    {{-- <a class="enlaces-menu {{ request()->routeIs('admin.index') ? 'active' : '' }}" href="{{ route('admin.index') }}" ><i class="fa-solid fa-house"></i> Inicio</a> --}}
                                </li>
                                <li>
                                    {{-- <a class="enlaces-menu {{ request()->routeIs('reservation.list') ? 'active' : '' }}" href="{{ route('reservation.list') }}"><i class="fa-solid fa-calendar-days"></i> Reservas</a> --}}
                                </li>
                                <li>
                                    {{-- <a class="enlaces-menu {{ request()->routeIs('admin.config') ? 'active' : '' }}" href="{{ route('admin.config') }}"> <i class="fa-solid fa-gears"></i> Gestión</a> --}}
                                </li>
                                <li>
                                    <!-- Authentication -->
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <a class="enlaces-menu" href="{{ route('logout') }} " onclick="event.preventDefault();
                                        this.closest('form').submit();">
                                            <i class="fa-solid fa-arrow-right-from-bracket">
                                            </i> Cerrar Sesión</a>
                                    </form>
                                </li>
                            </ul>
                            <div class="logo-barra-lateral">
                                <div class="cont-img-logo">
                                    <img src=" {{ asset('img/logo-img.png') }}" alt="Logo">
                                </div>
                            </div>       
                        </div>
                    </nav>
                </div>
            </div>
        @show

        <main class="content">
            @yield('content')
        </main>

        @if (!request()->routeIs('password.reset'))
            <div id="overlay">
                <div id="loader">
                    <img src="{{ asset('img/load.png') }}" alt="">
                </div>
            </div>
        @endif

        {{-- <div id="url" class="d-none" data-url="{{ route('index') }}"></div> --}}
    </body>
</html>
<!-- resources/views/index.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Salón de Belleza - Servicios y Cita</title>
</head>
<body>
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

    <section>
        <h2>Crear una cita</h2>
        <form action="{{ route('cita.store') }}" method="post">
            @csrf
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required>
            <br>

            <label for="servicio">Servicio:</label>
            <select id="servicio" name="servicio" required>
                <option value="peluqueria">Servicio de Peluquería</option>
                <option value="spa">Servicio de Spa</option>
            </select>
            <br>

            <label for="fecha">Fecha:</label>
            <input type="date" id="fecha" name="fecha" required>
            <br>

            <label for="hora">Hora:</label>
            <input type="time" id="hora" name="hora" required>
            <br>

            <input type="submit" value="Crear Cita">
        </form>
    </section>
</body>
</html>

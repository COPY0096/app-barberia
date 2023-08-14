<h1>hola</h1>

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


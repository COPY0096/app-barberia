<!DOCTYPE html>
<html>
<head>
    <title>Sistema de Peluquería/Salón</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }
        
        section {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
            max-width: 400px;
            margin: 40px auto;
        }

        h2 {
            color: #333;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="date"],
        input[type="time"],
        input[type="email"],
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
        }

        select {
            cursor: pointer;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
    <script>
    
    </script>
</head>
<body>
    
        <form action="{{ route('cita.store') }}" method="post">
            <!-- ... Rest of the form remains the same ... -->
        </form>
   
</body>
</html>

<!DOCTYPE html>
<html>
<head>
    <title>Sistema de Peluquería/Salón</title>
    <script>
        function mostrarOpcionesSegunServicio() {
            var servicioSeleccionado = document.getElementById("servicio").value;
            var barberoCampo = document.getElementById("campo-barbero");
            var tipoServicioCampo = document.getElementById("campo-tipo-servicio");
            
            if (servicioSeleccionado === "peluqueria") {
                barberoCampo.style.display = "block";
                tipoServicioCampo.style.display = "block";
                var tipoServicioSelect = document.getElementById("tipo_servicio");
                tipoServicioSelect.innerHTML = `
                    <option value="corte">Corte de pelo</option>
                    <option value="peinado">Peinado</option>
                    <option value="tinte">Tinte de pelo</option>
                    <option value="facial">Facial</option>
                `;
            } else if (servicioSeleccionado === "spa") {
                barberoCampo.style.display = "none";
                tipoServicioCampo.style.display = "block";
                var tipoServicioSelect = document.getElementById("tipo_servicio");
                tipoServicioSelect.innerHTML = `
                    <option value="manicura">Manicura</option>
                    <option value="pedicura">Pedicura</option>
                    <option value="masaje">Masaje</option>
                    <option value="relajacion">Sistemas de Relajación</option>
                `;
            }
        }
    </script>
</head>
<body>
    <section>
        <h2>Crear una cita</h2>
        <form action="{{ route('cita.store') }}" method="post">
            @csrf
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required>

            <label for="servicio">Servicio:</label>
            <select id="servicio" name="servicio" required onchange="mostrarOpcionesSegunServicio()">
                <option value="peluqueria">Servicio de Peluquería</option>
                <option value="spa">Servicio de Spa</option>
            </select>

            <div id="campo-barbero" style="display:none;">
                <label for="barbero">Barbero:</label>
                <select id="barbero" name="barbero" required>
                    <option value="ricardo">Barbero 1</option>
                    <option value="jeremy">Barbero 2</option>
                    <option value="ramon">Barbero 3</option>
                    <option value="agustin">Barbero 4</option>
                    <option value="roberto">Barbero 5</option>
                </select>
            </div>

            <div id="campo-tipo-servicio" style="display:none;">
                <label for="tipo_servicio">Tipo de Servicio:</label>
                <select id="tipo_servicio" name="tipo_servicio" required>
                    <!-- Las opciones se generan dinámicamente según el servicio seleccionado -->
                </select>
            </div>

            <label for="fecha">Fecha:</label>
            <input type="date" id="fecha" name="fecha" required>

            <label for="hora">Hora:</label>
            <input type="time" id="hora" name="hora" required>

            <label for="correo">Correo electrónico:</label>
            <input type="email" id="correo" name="correo" required>


            <!DOCTYPE html>
<html>
<head>
    <title>Sistema de Peluquería/Salón</title>
    <style>
        
    </style>
    <script>
        function mostrarMensajeCitaCreada() {
            alert("¡La cita ha sido creada exitosamente!");
        }
    </script>
    
</head>
<body>
    
    <form action="{{ route('cita.store') }}" method="post">
        @csrf
        <!-- ... Campos del formulario ... -->
        <input type="submit" value="Crear Cita">
    </form>
    

        

</body>
</html>

        </form>
    </section>
</body>

</html>


</html>

</html>
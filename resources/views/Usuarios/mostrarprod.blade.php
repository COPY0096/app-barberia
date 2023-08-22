@extends('layouts.layout')

@section('content')
<div class="bg-gradient-to-b from-blue-200 to-blue-400 min-h-screen py-10">
    <div class="container mx-auto">
        <h1 class="text-4xl font-bold text-center text-white mb-8">Productos de la barbería/spa</h1>

        <div class="filtro-container text-center mb-6">
            <label for="filtro" class="block text-lg font-medium text-gray-700 mb-2 text-white">Buscar productos:</label>
            <input type="text" id="filtro" class="border rounded-lg px-4 py-2 w-full focus:outline-none focus:ring-2 focus:ring-blue-500" onkeyup="filtrarProductos()">
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach($productos as $producto)
            <div class="w-full p-4 producto-card">
                <div class="bg-white border rounded-lg shadow-lg p-6 h-full">
                    <img src="{{ asset('storage/' . $producto->imagen) }}" class="w-full mb-4 rounded-lg" alt="{{ $producto->nombre }}">
                    <h5 class="text-xl font-semibold mb-2">{{ $producto->nombre }}</h5>
                    <p class="text-gray-600 mb-4">{{ $producto->descripcion }}</p>
                    <div class="mt-auto">
                        <button class="comprar-btn bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded-lg w-full mb-2" onclick="agregarAlCarrito({{ $producto->id }})">Comprar</button>
                        <button class="detalles-btn bg-gray-400 hover:bg-gray-500 text-gray-800 py-2 px-4 rounded-lg w-full" onclick="mostrarDetalles({{ $producto->id }})">Ver Detalles</button>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<script>
    function filtrarProductos() {
        var filtro = document.getElementById('filtro').value.toLowerCase();
        var productos = document.querySelectorAll('.producto-card');

        productos.forEach(function(producto) {
            var nombreProducto = producto.querySelector('.text-xl').textContent.toLowerCase();
            var descripcionProducto = producto.querySelector('.text-gray-600').textContent.toLowerCase();

            if (nombreProducto.includes(filtro) || descripcionProducto.includes(filtro)) {
                producto.style.display = 'block';
            } else {
                producto.style.display = 'none';
            }
        });
    }

    function agregarAlCarrito(productoId) {
        // Realizar una solicitud POST a la ruta
        fetch(`/agregar-al-carrito/${productoId}`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            },
            body: JSON.stringify({}),
        })
        .then(response => response.json())
        .then(data => {
            console.log(data.message); // Puedes mostrar un mensaje de éxito en la consola
        })
        .catch(error => {
            console.error('Error:', error);
        });
    }

    function mostrarDetalles(productoId) {
        // Implementa aquí la lógica para mostrar los detalles del producto
        console.log(`Mostrando detalles del producto ${productoId}.`);
    }
</script>
@endsection
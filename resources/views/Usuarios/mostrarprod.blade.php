@extends('layouts.base')

@section('content')


<div class="container">
    <h1>Productos de la barbería/spa</h1>
    <div class="row">
        @foreach($productos as $producto)
        <div class="col-md-4">
            <div class="card">
                <img src="{{ asset('storage/' . $producto->imagen) }}" class="card-img-top"
                    alt="{{ $producto->nombre }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $producto->nombre }}</h5>
                    <p class="card-text">{{ $producto->descripcion }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<!-- Agregar en la vista de lista de productos -->
<table>
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Estado</th>
        </tr>
    </thead>
    <tbody>
        @foreach($productos as $producto)
        <tr>
            <td><a href="{{ route('productos.show', $producto->id_producto) }}">{{ $producto->nombre }}</a></td>
            <td>{{ $producto->descripcion }}</td>
            <td>{{ $producto->status }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

</body>

</html>




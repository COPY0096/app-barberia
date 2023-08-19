@extends('layouts.base')


@section('content')
    <div class="container">
        <h1>Bienvenido a la zona de productos</h1>
    </div>
@endsection



    <!-- Agregar en la vista de lista de productos -->
@foreach($productos as $producto)
    <tr>
        <td><a href="{{ route('products.show', $producto->id_producto) }}">{{ $producto->nombre }}</a></td>
        <td>{{ $producto->descripcion }}</td>
        <td>{{ $producto->status }}</td>
    </tr>
@endforeach



</body>
</html>



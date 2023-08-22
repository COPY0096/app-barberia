@extends('layouts.userapp')

@section('content')
<div class="container">
    <h1>Carrito de Compras</h1>
    @foreach($cartItems as $cartItem)
        <div>
            <p>Producto: {{ $cartItem->product->nombre }}</p>
            <p>Cantidad: {{ $cartItem->pivot->quantity }}</p>
            <p>Precio unitario: ${{ $cartItem->product->precio }}</p>
            <form action="{{ route('cart.remove') }}" method="POST">
                @csrf
                <input type="hidden" name="product_id" value="{{ $cartItem->product->id }}">
                <button type="submit">Remover del Carrito</button>
            </form>
        </div>
    @endforeach
</div>
@endsection

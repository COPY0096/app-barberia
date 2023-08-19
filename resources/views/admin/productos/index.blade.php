@extends('layouts.app')

@section('content')
    <h1>Lista de Productos</h1>
    <ul>
        @foreach($productos as $producto)
            <li>{{ $producto->nombre }}</li>
        @endforeach
    </ul>
@endsection

@extends('layouts.base')

@section('content')
<div class="row">
    <div class="col-12">

        <div>
            <h2>Editar Tarea</h2>
        </div>
        <div>
            <a href="{{route('clientes.index')}}" class="btn btn-primary">Volver</a>
        </div>
    </div>

    @if ($errors->any())
            <div class="alert alert-danger mt-2">
                <strong>ATENCION!</strong> Algo fue mal..<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


    <form action="{{ route('clientes.update', $cliente) }}" method="POST">
    @csrf
    @method('PUT')
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-6 mt-2">
                <div class="form-group">
                    <strong>Nombre:</strong>
                    <input type="text" name="nombre" class="form-control" placeholder="Nombre" value="{{ $cliente->nombre}}" >
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-6 mt-2">
                <div class="form-group">
                    <strong>Apellido:</strong>
                    <input type="text" name="apellido" class="form-control" placeholder="Apellido" value="{{ $cliente->apellido}}" >
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-6 mt-2">
                <div class="form-group">
                    <strong>Celular:</strong>
                    <input type="text" name="celular" class="form-control" placeholder="Celular" value="{{ $cliente->celular}}">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-6 mt-2">
                <div class="form-group">
                    <strong>Email:</strong>
                    <input name="email_cliente" class="form-control" placeholder="Email" value="{{ $cliente->email_cliente}}">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-2">
                <button type="submit" class="btn btn-primary">Actualizar</button>
            </div>
        </div>
    </form>
</div>
@endsection
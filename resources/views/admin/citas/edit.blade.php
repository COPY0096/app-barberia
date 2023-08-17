@extends('layouts.base')

@section('content')
<div class="row">
    <div class="col-12">
        <h2>Editar Cita</h2>
        <a href="{{route('citas.index')}}" class="btn btn-primary">Volver</a>
    </div>

    @if ($errors->any())
        <div class="col-12 mt-2">
            <div class="alert alert-danger">
                <strong>ATENCIÓN!</strong> Algo salió mal..<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif

    <div class="col-12 mt-3">
        <form action="{{ route('citas.update', $cita) }}" method="POST" class="row">
            @csrf
            @method('PUT')
            <div class="col-md-6">
                <div class="form-group">
                    <strong>Nombre:</strong>
                    <input type="text" name="nombre" class="form-control" placeholder="Nombre" value="{{ $cita->nombre }}">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <strong>Fecha:</strong>
                    <input type="date" name="fecha" class="form-control" value="{{ $cita->fecha }}">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <strong>Hora:</strong>
                    <input type="time" name="hora" class="form-control" value="{{ $cita->hora }}">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <strong>Barbero:</strong>
                    <select name="barbero" class="form-control">
                        <!-- Opciones de barberos -->
                    </select>
                </div>
            </div>

            <div class="col-12 text-center mt-3">
                <button type="submit" class="btn btn-primary">Actualizar</button>
            </div>
        </form>
    </div>
</div>
@endsection

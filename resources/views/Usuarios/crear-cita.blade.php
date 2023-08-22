@extends('layouts.app')


<head>
    <!-- Otros enlaces y metadatos -->
    <link href="{{ asset('css/formularios.css') }}" rel="stylesheet">
</head>


@section('content')
    <div class="container">
        
        <form action="{{ route('store-agendar-cita') }}" method="POST">
            @csrf
            <h1>Agendar Cita</h1>
            <div class="form-group">
                <label for="id_cliente">Cliente:</label>
                <select name="id_cliente" class="form-control">
                    @foreach ($clientes as $cliente)
                        <option value="{{ $cliente->id_cliente }}">{{ $cliente->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="id_empleado">Empleado:</label>
                <select name="id_empleado" class="form-control">
                    @foreach ($empleados as $empleado)
                        <option value="{{ $empleado->id_empleado }}">{{ $empleado->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="fecha_creacion">Fecha y Hora:</label>
                <input type="datetime-local" name="fecha_creacion" class="form-control">
            </div>
            <!-- Agrega aquí otros campos necesarios -->
            <div class="form-group">
                <label for="id_servicio">Servicio:</label>
                <select name="id_servicio" class="form-control">
                    @foreach ($servicios as $servicio)
                        <option value="{{ $servicio->id_servicio }}">{{ $servicio->nombre_servicio }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Agendar Cita</button>
                <a href="{{ route('inicio') }}" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
@endsection

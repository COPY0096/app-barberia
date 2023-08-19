@extends('layouts.base')

@section('content')
<div class="row">
    <div class="col-12">
        <h2>Lista de Citas</h2>
        <a href="{{route('citas.create')}}" class="btn btn-primary">Nueva Cita</a>
    </div>

    @if ($citas->isEmpty())
        <div class="col-12 mt-2">
            <div class="alert alert-info">
                No hay citas programadas.
            </div>
        </div>
    @else
        <div class="col-12 mt-2">
            <table class="table">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Fecha</th>
                        <th>Hora</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($citas as $cita)
                        <tr>
                            <td>{{ $cita->nombre }}</td>
                            <td>{{ $cita->fecha }}</td>
                            <td>{{ $cita->hora }}</td>
                            <td>
                                <a href="{{ route('citas.edit', $cita->id) }}" class="btn btn-primary">Editar</a>
                                <form action="{{ route('citas.destroy', $cita->id) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar esta cita?')">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection

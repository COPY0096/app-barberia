@extends('adminlte::page')

@section('title', 'Control de Citas')

@section('content_header')
    <h1>
        Citas
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-create-cita">
            Crear
        </button>
        <button type="button" class="btn btn-primary" onclick="window.print();">
            Imprimir
        </button>
    </h1>
@stop

@if (Session::get('success'))
    <div class="alert alert-success mt-2">
        <strong>{{ Session::get('success') }}</strong><br><br>
    </div>
@endif

@section('content')
<div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Listado de Citas</h3>
                    </div>
                    <div class="card-body">
                        <table id="citas" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Cliente</th>
                                    <th>Empleado</th>
                                    <th>Fecha de Creación</th>
                                    <th>Servicio</th>
                                    <th>Razón de Cancelación</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($citas as $cita)
                                    <tr>
                                        <td>{{ $cita->cliente->nombre }} {{ $cita->cliente->apellido }}</td>
                                        <td>{{ $cita->empleado->nombre }} {{ $cita->empleado->apellido }}</td>
                                        <td>{{ $cita->fecha_creacion->format('d/m/Y H:i:s') }}</td>
                                        <td>{{ $cita->servicio ? $cita->servicio->nombre_servicio : 'Sin servicio' }}</td>
                                        <td>
                                            <form action="{{ route('citas.actualizar-razon', $cita) }}" method="POST">
                                                @csrf
                                                Razón de cancelación actual: {{ $cita->razon_de_cancelacion }} <br>
                                                <select name="razon_de_cancelacion">
                                                    <option value="No llegó">No llegó</option>
                                                    <option value="Cambio de fecha">Cambio de fecha</option>
                                                    <option value="Otro">Otro</option>
                                                </select>
                                                <button type="submit">Actualizar Razón</button>
                                            </form>
                                        </td>
                                        <td>
                                            <form action="{{ route('citas.actualizar-estado', [$cita->id_cliente, $cita->id_empleado]) }}" method="POST">
                                                @csrf
                                                {{ $cita->estado }} <br>
                                                <select name="estado">
                                                    <option value="pendiente">Pendiente</option>
                                                    <option value="completada">Completada</option>
                                                    <option value="cancelada">Cancelada</option>
                                                </select>
                                                <button type="submit">Actualizar Estado</button>
                                            </form>
                                        </td>
                                        <td>
                                            <button class="btn btn-warning">Editar</button>
                                            <button class="btn btn-danger">Eliminar</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Cliente</th>
                                    <th>Empleado</th>
                                    <th>Fecha de Creación</th>
                                    <th>Servicio</th>
                                    <th>Razón de Cancelación</th>
                                    <th>Acciones</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>

<!-- Modal para Agendar Cita -->
<div class="modal fade" id="modal-create-cita">
    <div class="modal-dialog">
        <div class="modal-content bg-default">
            <div class="modal-header">
                <h4 class="modal-title">Agendar Nueva Cita</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('citas.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="id_cliente">Cliente</label>
                        <select name="id_cliente" class="form-control">
                            @foreach($clientes as $cliente)
                                <option value="{{ $cliente->id_cliente }}">{{ $cliente->nombre }} {{ $cliente->apellido }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="id_empleado">Empleado</label>
                        <select name="id_empleado" class="form-control">
                            @foreach($empleados as $empleado)
                                <option value="{{ $empleado->id_empleado }}">{{ $empleado->nombre }} {{ $empleado->apellido }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="fecha_creacion">Fecha de la Cita</label>
                        <input type="datetime-local" name="fecha_creacion" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="estado">Estado</label>
                        <select name="estado" class="form-control">
                            <option value="pendiente">Pendiente</option>
                            <option value="completada">Completada</option>
                            <option value="cancelada">Cancelada</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="id_servicio">Servicio</label>
                        <select name="id_servicio" class="form-control">
                            @foreach($servicios as $servicio)
                                <option value="{{ $servicio->id_servicio }}">{{ $servicio->nombre_servicio }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="razon_de_cancelacion">Razón de Cancelación</label>
                        <textarea name="razon_de_cancelacion" class="form-control"></textarea>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-outline-light" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-outline-primary">Agendar Cita</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Fin Modal -->



@endsection



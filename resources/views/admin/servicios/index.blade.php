@extends('adminlte::page')

@section('title', 'Servicios')


@section('content_header')
    <h1>
        Servicios
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-create-servicio">
            Crear
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
                        <h3 class="card-title">Listado de servicios</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="servicios" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Descripcion</th>
                                    <th>Precio</th>
                                    <th>Duracion</th>
                                    <th>Acciones</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($servicios as $servicio)
                                <tr>
                                    <td>{{ $servicio->id_servicio }}</td>
                                    <td>{{ $servicio->nombre_servicio }}</td>
                                    <td>{{ $servicio->descripcion_servicio }}</td>
                                    <td>{{ $servicio->precio_servicio }}</td>
                                    <td>{{ $servicio->duracion_servicio }}</td>
                                    <td>
                                        <button class="btn btn-warning">Editar</button>
                                       
                                        <button class="btn btn-danger">Eliminar</button>
                                    </td>
                                 </tr>
                                @endforeach

                            </tbody>
                            <tfoot>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Descripcion</th>
                                <th>Precio</th>
                                <th>Duracion</th>
                                <th>Acciones</th>
                            </tfoot>
                
                        </table>
                        
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>

    <!-- modal -->
    <div class="modal fade" id="modal-create-servicio">
        <div class="modal-dialog">
            <div class="modal-content bg-default">
                <div class="modal-header">
                    <h4 class="modal-title">Crear servicio</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                </div>
                <form action="{{ route('servicios.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nombre_servicio">Nombre</label>
                            <input type="text" name="nombre_servicio" class="form-control" id="nombre_servicio">
                        </div>
                        <div class="form-group">
                            <label for="descripcion_servicio">Descripcion</label>
                            <input type="text" name="descripcion_servicio" class="form-control" id="descripcion_servicio">
                        </div>
                        <div class="form-group">
                            <label for="precio_servicio">Precio</label>
                            <input type="text" name="precio_servicio" class="form-control" id="precio_servicio">
                        </div>
                        <div class="form-group">
                            <label for="duracion_servicio">Duracion</label>
                            <input type="text" name="duracion_servicio" class="form-control" id="duracion_servicio">
                        </div>
                    </div>

                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-outline-primary">Save changes</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
@stop



@section('js')
    <script>
        $(document).ready(function() {
            $('#categories').DataTable({
                "order": [
                    [3, "desc"]
                ]
            });
        });
    </script>
@stop
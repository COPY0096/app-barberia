@extends('adminlte::page')

@section('title', 'Compras')

@section('content_header')
    <h1>
        Compras
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-create-cita">
            Añadir
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
                        <h3 class="card-title">Inventario</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="productos" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Foto</th>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Descripcion</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($productos as $producto)
                                <tr>
                                    <td>{{ $producto->photo }}</td>
                                    <td>{{ $producto->id_producto }}</td>
                                    <td>{{ $producto->nombre }}</td>
                                    <td>{{ $producto->descripcion }}</td>
                                    <td>{{ $producto->estado }}</td>
                                    <td>
                                        <button class="btn btn-warning">Editar</button>
                                        <button class="btn btn-danger">Eliminar</button>
                                    </td>
                                 </tr>
                                @endforeach

                            </tbody>
                            <tfoot>
                                <th>Foto</th>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Descripcion</th>
                                <th>Estado</th>
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
    <div class="modal fade" id="modal-create-producto">
        <div class="modal-dialog">
            <div class="modal-content bg-default">
                <div class="modal-header">
                    <h4 class="modal-title">Crear Producto</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                </div>
                <form action="{{ route('productos.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" name="nombre" class="form-control" id="nombre">
                        </div>
                        <div class="form-group">
                            <label for="descripcion">Descripcion</label>
                            <input type="text" name="descripcion" class="form-control" id="descripcion">
                        </div>
                        <!-- <div class="form-group">
                            <label for="status">Estado</label>
                            <input type="text" name="status" class="form-control" id="status">
                        </div> -->
                        <div class="form-group">
                            <strong>Estado (inicial):</strong>
                            <select name="status" class="form-select" id="">
                                <option value="">-- Elige el status --</option>
                                <option value="Disponible">Disponible</option>
                                <option value="No Disponible">En progreso</option>
                            </select>
                         </div>
                        <div class="form-group">
                            <label for="photo">Foto</label>
                            <input type="text" name="photo" class="form-control" id="photo">
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
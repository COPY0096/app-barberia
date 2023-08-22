
@extends('adminlte::page')

@section('title', 'Productos')

@section('content_header')
    <h1>
        Productos
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-create-producto">
            Añadir
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
                        <h3 class="card-title">Listado de productos</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="productos" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Foto</th>
                                    <th>Nombre</th>
                                    <th>Descripcion</th>
                                    <th>Precio</th>
                                    <th>Categoria</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($productos as $producto)
                                <tr>
                                    <!-- <td>{{ $producto->photo }}</td> -->
                                    
                                    <td>{{ $producto->id_producto }}</td>
                                    <td><img src="{{ asset('ruta/del/archivo/' . $producto->photo) }}" alt="Foto del producto" width="100"></td>
                                    <td>{{ $producto->nombre }}</td>
                                    <td>{{ $producto->descripcion }}</td>
                                    <td>{{ $producto->precio_unitario }}</td>
                                    <td>{{ $producto->id_categoria }}</td>
                                    <td>{{ $producto->estado }}</td>
                                    <td>
                                        <button class="btn btn-warning">Editar</button>
                                        <button class="btn btn-danger">Eliminar</button>
                                    </td>
                                 </tr>
                                @endforeach

                            </tbody>
                            <tfoot>
                                <th>ID</th>
                                <th>Foto</th>
                                <th>Nombre</th>
                                <th>Descripcion</th>
                                <th>Precio</th>
                                <th>Categoria</th>
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
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('productos.store') }}" method="POST" enctype="multipart/form-data">
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
                        <div class="form-group">
                            <label for="precio_unitario">Precio</label>
                            <input type="text" name="precio_unitario" class="form-control" id="precio_unitario">
                        </div>
                        <div class="form-group">
                            <label for="id_categoria">Categoria</label>
                            <input type="text" name="id_categoria" class="form-control" id="id_categoria">
                        </div>
                        <div class="form-group">
                            <strong>Estado (inicial):</strong>
                            <select name="status" class="form-select" id="">
                                <option value="">-- Elige el status --</option>
                                <option value="1">Disponible</option>
                                <option value="0">No Disponible</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="photo">Foto</label>
                            <input type="file" name="photo" class="form-control-file" id="photo">
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


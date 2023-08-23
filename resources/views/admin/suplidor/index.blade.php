@extends('adminlte::page')

@section('title', 'suplidores')

@section('content_header')
    <h1>
        Suplidores
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-create-suplidor">
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
                        <h3 class="card-title">Listado de suplidores</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="suplidores" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Email</th>
                                    <th>Teléfono</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($suplidores as $suplidor)
                                <tr>
                                    <td>{{ $suplidor->id_suplidor }}</td>
                                    <td>{{ $suplidor->nombre }}</td>
                                    <td>{{ $suplidor->email }}</td>
                                    <td>{{ $suplidor->telefono }}</td>
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
                                <th>Email</th>
                                <th>Teléfono</th>
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
    <div class="modal fade" id="modal-create-suplidor">
        <!-- ... (código del modal de creación de suplidores) ... -->
    </div>
    <!-- /.modal -->
@stop

@section('js')
    <script>
        $(document).ready(function() {
            $('#suplidores').DataTable({
                "order": [
                    [3, "desc"]
                ]
            });
        });
    </script>
@stop

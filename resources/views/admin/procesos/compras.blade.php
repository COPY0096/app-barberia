@extends('adminlte::page')

@section('title', 'Compras')

@section('content_header')
    <h1>
        Compras
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-create-compra">
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
@section('content_header')
    <h1>
        Compras
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-create-compra">
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
                    <h3 class="card-title">Listado de compras</h3>
                </div>
                <div class="card-body">
                    <table id="compras" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Cliente</th>
                                <th>Fecha</th>
                                <th>Total</th>
                                <th>Detalles</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($compras as $compra)
                            <tr>
                                <td>{{ $compra->id_cliente }}</td>
                                <td>{{ $compra->cliente->nombre }} {{ $compra->cliente->apellido }}</td>
                                <td>{{ $compra->created_at->format('d/m/Y H:i:s') }}</td>
                                <td>{{ $compra->monto_total }}</td>
                                <td>
                                    @foreach ($compra->productos as $producto)
                                        <p>Nombre: {{ $producto->nombre }}</p>
                                        <p>Precio Unitario: {{ $producto->pivot->precio_unitario }}</p>
                                        <p>Cantidad: {{ $producto->pivot->cantidad }}</p>
                                        <p>------------------------------------</p>
                                    @endforeach
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
                                <th>ID</th>
                                <th>Cliente</th>
                                <th>Fecha</th>
                                <th>Total</th>
                                <th>Detalles</th>
                                <th>Acciones</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- modal -->
<div class="modal fade" id="modal-create-compra">
    <div class="modal-dialog">
        <div class="modal-content bg-default">
            <div class="modal-header">
                <h4 class="modal-title">Crear compra</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>
            <form action="{{ route('compras.store') }}" method="POST">
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
                        <label for="productos">Productos</label>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Producto</th>
                                    <th>Cantidad / Precio</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($productos as $producto)
                                    <tr>
                                        <td>{{ $producto->nombre }}</td>
                                        <td>
                                            <input placeholder="Cantidad" type="number" name="cantidades[{{ $producto->id_producto }}]" class="form-control" min="1">
                                            <input placeholder="Precio" min="1" step="0.01" type="number" name="importes[{{ $producto->id_producto }}]" class="form-control" min="1">
                                            <input type="hidden" name="productos[]" value="{{ $producto->id_producto }}">
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-outline-primary">Guardar compra</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

@stop

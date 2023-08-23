@extends('layouts.base')

@section('content')
<div class="row">
    <div class="col-12">

        <div>
            <h2>Crear Suplidor</h2>
        </div>
        <div>
            <a href="{{ route('suplidores.index') }}" class="btn btn-primary">Volver</a>
        </div>
    </div>

    @if ($errors->any())
            <div class="alert alert-danger mt-2">
                <strong>ATENCIÓN!</strong> Algo salió mal..<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
    @endif

    <form action="{{ route('suplidores.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-6 mt-2">
                <div class="form-group">
                    <strong>Nombre:</strong>
                    <input type="text" name="nombre" class="form-control" placeholder="Nombre">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-6 mt-2">
                <div class="form-group">
                    <strong>Email:</strong>
                    <input type="email" name="email" class="form-control" placeholder="Email">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-6 mt-2">
                <div class="form-group">
                    <strong>Teléfono:</strong>
                    <input type="text" name="telefono" class="form-control" placeholder="Teléfono">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-6 mt-2">
                <div class="form-group">
                    <strong>Dirección:</strong>
                    <input type="text" name="direccion" class="form-control" placeholder="Dirección">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-6 mt-2">
                <div class="form-group">
                    <strong>Ciudad:</strong>
                    <input type="text" name="ciudad" class="form-control" placeholder="Ciudad">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-6 mt-2">
                <div class="form-group">
                    <strong>Página Web:</strong>
                    <input type="text" name="paginaweb" class="form-control" placeholder="Página Web">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-2">
                <button type="submit" class="btn btn-primary">Crear</button>
            </div>
        </div>
    </form>
</div>
@endsection

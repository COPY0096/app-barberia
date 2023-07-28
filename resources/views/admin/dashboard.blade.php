@extends('adminlte::page')

{{-- @section('title', 'Dashboard') --}}

@section('css')
    <!-- <link rel="stylesheet" href="/css/admin_custom.css"> -->
@stop

@section('content_header')
    <!-- <h1>
        Clientes
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-create-cliente">
            Crear
        </button>
    </h1> -->
@stop

@if (Session::get('success'))
    <div class="alert alert-success mt-2">
        <strong>{{ Session::get('success') }}</strong><br><br>
    </div>
@endif

@section('content')
   
    
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

 {{-- @extends('layouts.userapp')

 @section('content')
<h1>hola</h1>
@endsection --}}


@extends('layouts.base')

@section('content')
    <main>
        <section id="reservas_hoy" class="my-5">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <h2 class="titulos">Reservas para el día de hoy</h2>
                    </div>
                </div>
                @if (session('message'))
                        <div class="row mt-3">
                            <div class="col">
                                <div class="alert alert-success">
                                    {{ session('message') }}
                                </div>
                            </div>
                        </div>
                    @endif
                    @foreach($citas as $cita)
                    <div class="row">
                        <div class="col">
                            <div class="bloque-reserva {{ $cita->status == 2 ? 'trama-bloque-reserva' : '' }}">
                                    
                                    <div class="row " id="cont_campos_reserva_hoy_{{ $cita->id_cita }}">
                                        <div class="col-10" class="datos-reserva">
                                            <div class="row">
                                                <div class="col-sm-4 col-md-4 col-lg-3 px-4 texto-mediano">
                                                    Fecha creacion: 
                                                    <span class="span-text-reserva">{{ $cita->fecha_creacion }}</span>
                                                </div>
                                                <div class="col-sm-4 col-md-4 col-lg-3 px-4 texto-mediano">
                                                    Cliente: 
                                                    <span class="span-text-reserva">{{ $cita->id_cliente }}</span>
                                                </div>
                                                <div class="col-sm-4 col-md-4 col-lg-3 px-4 texto-mediano">
                                                    Empleado: 
                                                    <span class="span-text-reserva">{{ $cita->id_empleado }}</span>
                                                </div>
                                                <div class="col-sm-4 col-md-4 col-lg-3 px-4 texto-mediano">
                                                    Inicio: 
                                                    <span class="span-text-reserva">{{ $cita->hora_de_inicio }}</span>
                                                </div>
                                                <div class="col-sm-4 col-md-4 col-lg-3 px-4 texto-mediano">
                                                    Final: 
                                                    <span class="span-text-reserva">{{ $cita->hora_de_finalizacion }}</span>
                                                </div>
                                                <div class="col-sm-4 col-md-4 col-lg-3 px-4 texto-mediano">
                                                    Estado: 
                                                    <span class="span-text-reserva">{{ $cita->cancelado }}</span>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        @if ($cita->cancelado == 1)
                                            <div class="col-2 d-flex flex-column justify-content-center align-items-center">
                                                <button type="button" class="btn btn-verde btn-icon my-2 btn-reserva-lista" value="{{ $cita->id_cita }}"><i class="fa-solid fa-circle-check"></i></button>
                                                <button type="button" class="btn btn-rojo btn-icon my-2 btn-modal-eliminar" value="{{ $cita->id_cita }} " data-bs-toggle="modal" data-bs-target="#modal-eliminar"><i class="fa-solid fa-ban"></i></button>
                                            </div>
                                        @endif
                                    </div>
                                
                                   <div class="row">
                                        <div class="col d-flex justify-content-center texto-mediano">
                                            No se encontraron reservas para el día de hoy
                                        </div>
                                    </div>  
                                    @if ($cita->cancelado == 2)
                                        <i class="fa-solid fa-circle-check icon-reserva-lista"></i>
                                    @endif
                                    
                            </div>
                        </div>
                    </div>
                @endforeach
                @if(count($citas) == 0)
                    <div class="row mt-5">
                        <div class="col d-flex justify-content-center texto-mediano">
                            No se encontraron reservas para el día de hoy
                        </div>
                    </div>
                @endif
            </div>
        </section>

        <!-- Modal -->
        <div class="modal fade" id="modal-eliminar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Eliminar reserva</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Esta seguro de eliminar la reserva?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" data-bs-dismiss="modal">Cancelar</button>
                        <form action="{{ route('cita.delete') }}" method="POST">
                            @csrf
                            <button type="submit" name="eliminar" class="btn btn-sm btn-danger btn-eliminar-reserva">Eliminar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection
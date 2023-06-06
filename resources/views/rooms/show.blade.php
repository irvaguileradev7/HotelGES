@extends('layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2> Ver Habitacion</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('rooms.index') }}">Regresar</a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">

                    <img src="{{ asset('/' . $room->image) }}" width="50%" class="img-fluid">
                </div>
            </div>


        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Numero de habitacion:</strong>
                    {{ $room->number }}
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Detalles:</strong>
                    {{ $room->detail }}
                </div>
            </div>
            
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Tipo:</strong>
                    {{ $room->type->room_type}}
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Piso:</strong>
                    {{ $room->floor->number_floor}}
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                    <strong>Status:</strong>
                    {{-- {{ $room->status_id }} --}}
                    @switch( $room->status_id )
                            @case(1)
                                Disponible
                            @break
                            @case(2)
                                No disponible
                            @break
                    @endswitch

            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Capacidad:</strong>
                    {{ $room->capacity}}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Precio:</strong>
                    {{ $room->price}}
                </div>
            </div>
        </div>
    </div>
@endsection

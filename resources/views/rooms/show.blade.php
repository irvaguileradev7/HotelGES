@extends('layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Ver Habitacion</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-green" href="{{ route('rooms.index') }}">Regresar</a>
                </div>
            </div>
        </div>
        <div class="container" style="margin-bottom: 30px">
            <div class="row" style="margin-top: 30px">
                <div class="col"><img class="bordered-image img-fluid" src="{{ asset('/' . $room->image) }}"></div>
                <div class="col">
                    <table class="table table-bordered custom-table">
                        <tr>
                            <th>Número de habitación:</th>
                            <td>{{ $room->number }}</td>
                        </tr>
                        <tr>
                            <th>Detalles:</th>
                            <td>{{ $room->detail }}</td>
                        </tr>
                        <tr>
                            <th>Tipo:</th>
                            <td>{{ $room->type->room_type }}</td>
                        </tr>
                        <tr>
                            <th>Piso:</th>
                            <td>{{ $room->floor->number_floor }}</td>
                        </tr>
                        <tr>
                            <th>Status:</th>
                            <td>
                                @switch($room->status_id)
                                    @case(1)
                                        Disponible
                                    @break

                                    @case(2)
                                        No disponible
                                    @break
                                @endswitch
                            </td>
                        </tr>
                        <tr>
                            <th>Capacidad:</th>
                            <td>{{ $room->capacity }}</td>
                        </tr>
                        <tr>
                            <th>Precio:</th>
                            <td>{{ $room->price }}</td>
                        </tr>
                    </table>
                    </v>
                </div>
            </div>
        </div>
    @endsection

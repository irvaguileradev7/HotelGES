@extends('layout')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 margin-tb">

                <div class="container">
                    <div class="pull-left">
                        <h1>Registro de reservaciones</h1>
                    </div>
                    <div class="pull-right">
                        <a class="btn btn-success" href="{{ '/' }}">Regresar</a>
                    </div>
                </div>
            </div>
        </div>
        <br>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <br>
        <div class="container">
            <table class="table table-bordered">
                <tr>
                    <th>Piso</th>
                    <th>No. habitacion</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Cantidad de noches</th>
                    <th>Inicio de la reservación</th>
                    <th>Termino de la reservación</th>
                </tr>

                @foreach ($reservations as $reservation)
                <tr class="white-cell">
                    <td>{{ $reservation->room->floor_id}}</td>
                    <td>{{ $reservation->room->number }}</td>
                    <td>{{ $reservation->guest->name}}</td>
                    <td>{{ $reservation->guest->last_name}}</td>
                    <td>{{ $reservation->nights}}</td>
                    <td>{{ $reservation->time_from }}</td>
                    <td>{{ $reservation->time_to }}</td>
                    <!-- Resto del código -->
                </tr>
                        
                        {{--<td>--}}
                            {{--
                        <div class="float-left">
                            <a class="btn btn-info" href="{{ route('rooms.show', $room->id) }}">Ver</a>
                            <a class="btn btn-primary" href="{{ route('rooms.edit', $room->id) }}">Editar</a>
                        </div>
                        <div class="float-end">
                        <form id="delete-form-{{ $room->id }}" action="{{ route('rooms.destroy', $room->id) }}"
                            method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"
                                onclick="confirmDelete(event, {{ $room->id }})">Eliminar</button>
                        </form>
                        </div>
                        --}}
                            {{--    ESTE
                        <form id="delete-form-{{ $reservation->id }}" action="{{ route('rooms.destroy', $room->id) }}"
                                method="POST">
                                @csrf
                                @method('DELETE')
                                <table>
                                    <tr>
                                        <td class="non-cell">
                                            <a class="btn btn-info" href="{{ route('rooms.show', $room->id) }}">Ver</a>
                                        </td>
                                        <td class="non-cell">
                                            <a class="btn btn-primary"
                                                href="{{ route('rooms.edit', $room->id) }}">Editar</a>
                                        </td>
                                        <td class="non-cell">
                                            <button type="submit" class="btn btn-danger"
                                                onclick="confirmDelete(event, {{ $room->id }})">Eliminar</button>
                                        </td>
                                    </tr>
                                </table>
                            </form>
                        </td>

                    </tr>
                                  --}}  
                @endforeach

            </table>

        </div>


        <script>
            function confirmDelete(event, roomId) {
                event.preventDefault();
                if (confirm('¿Está seguro que desea eliminar esta habitación?')) {
                    document.getElementById('delete-form-' + roomId).submit();
                }
            }
        </script>
    </div>
@endsection

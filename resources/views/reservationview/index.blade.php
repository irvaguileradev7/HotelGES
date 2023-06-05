@extends('layout')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 margin-tb">

                <div class="container">
                    <div class="pull-left">
                        <h1>Reservaciones</h1>
                    </div>
                    <div class="pull-right">
                        <a class="btn btn-success" href="{{ route('rooms.create') }}">Nueva habitación</a>
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
                    <th>Fehca de ingreso</th>
                    <th>Fecha de salida</th>
                    <th>No. habitacion</th>
                    <th>a</th>

                </tr>

                @foreach ($reservations as $reservation)
                <tr class="white-cell">
                    <td>{{ $reservation->time_from }}</td>
                    <td>{{ $reservation->time_to }}</td>
                    <td>{{ $reservation->room_id }}</td>
                    <!-- Resto del código -->
                </tr>
                        {{--
                        @switch( $room->type_id)
                            @case(1)
                                <td>Habitación individual</td>
                            @break

                            @case(2)
                                <td>Habitación doble</td>
                            @break

                            @case(3)
                                <td>Habitación triple</td>
                            @break

                            @case(4)
                                <td>Habitación Queen size</td>
                            @break

                            @case(5)
                                <td>Habitación King size</td>
                            @break

                            @case(6)
                                <td>Suite de lujo</td>
                            @break
                        @endswitch
                        --}}


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

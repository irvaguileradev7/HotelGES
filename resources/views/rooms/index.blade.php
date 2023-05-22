@extends('layout')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 margin-tb">

                <div class="container">
                    <div class="pull-left">
                        <h1>Habitaciones</h1>
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
                    <th>Piso</th>
                    <th>No. habitacion</th>
                    <th>Detalles</th>
                    <th>Tipo de habitación</th>
                    <th>Estatus</th>
                    <th width="280px">Acciones</th>
                </tr>

                @foreach ($rooms as $room)
                    <tr class="white-cell">
                        <td>{{ $room->floor_id}}</td>
                        <td>{{ $room->number }}</td>
                        <td>{{ $room->detail }}</td>
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
                        @switch( $room->status_id)
                            @case(1)
                                <td class="table-success">
                                    <p><strong class="text-success">Disponible</strong></p>
                                </td>
                            @break
                            @case(2)
                                <td class="table-secondary">
                                    <p><strong>Reservado</strong></p>
                                </td>
                            @break
                            @case(3)
                                <td class="table-danger">
                                    <p><strong class="text-danger">Ocupado</strong></p>
                                </td>
                            @break
                            @case(4)
                                <td class="table-dark">
                                    <strong>No Disponible</strong>
                                </td>
                            @break
                        @endswitch
                        


                        <td>
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
                            <form id="delete-form-{{ $room->id }}" action="{{ route('rooms.destroy', $room->id) }}"
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

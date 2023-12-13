@extends('layout')

@section('content')
    <div class="container tables">
        <div class="row">
            <h2 class="col">Habitaciones</h2>
            <a class="col crud text-end" href="{{ route('rooms.create') }}"><i class='bx bx-plus-circle'></i></a>

        </div>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        <br>

        <div class="container">
            <table class="table table-bordered custom-table align-middle">
                <tr>
                    <th>Imagen</th>
                    <th>Piso</th>
                    <th>No. habitación</th>
                    <th>Detalles</th>
                    <th>Tipo de habitación</th>
                    <th>Estatus</th>
                    <th width="280px">Acciones</th>
                </tr>

                @foreach ($rooms as $room)
                    <tr class="white-cell">
                        <td><img src="{{ asset('/' . $room->image) }}" width="100px"></td>

                        <td>{{ $room->floor_id }}</td>
                        <td>{{ $room->number }}</td>
                        <td>{{ $room->detail }}</td>
                        <td>{{ $room->type->room_type }}</td>

                        @switch($room->status_id)
                            @case(1)
                                <td class="table-success">
                                    <p><strong class="text-success">Disponible</strong></p>
                                </td>
                            @break

                            @case(2)
                                <td class="table-danger">
                                    <p><strong>No Disponible</strong></p>
                                </td>
                            @break
                        @endswitch

                        <td>
                            <form id="delete-form-{{ $room->id }}" action="{{ route('rooms.destroy', $room->id) }}"
                                method="POST">
                                @csrf
                                @method('DELETE')

                                <div class="row">
                                    <a class="col" href="{{ route('rooms.show', $room->id) }}"><span title="Ver"><i
                                                class='bx bx-book crud'></i></span></a>
                                    <a class="col" href="{{ route('rooms.edit', $room->id) }}"><span title="Editar"><i
                                                class='bx bxs-edit crud'></i></span></a>
                                    <a type="submit" class="col"
                                        onclick="confirmDelete(event, {{ $room->id }})"><span title="Eliminar"><i
                                                class='bx bxs-trash crud'></i></span></a>
                                </div>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>

    </div>

    <script>
        function confirmDelete(event, roomId) {
            event.preventDefault();
            if (confirm('¿Está seguro que desea eliminar esta habitación?')) {
                document.getElementById('delete-form-' + roomId).submit();
            }
        }
    </script>
@endsection

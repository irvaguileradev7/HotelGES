@extends('layout')


@section('content')
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
                <th>Id</th>
                <th>Nombre</th>
                <th>Detalles</th>
                <th width="280px">Acciones</th>
            </tr>

            @foreach ($rooms as $room)
                <tr>
                    <td>{{ $room->id }}</td>
                    <td>{{ $room->name }}</td>
                    <td>{{ $room->detail }}</td>

                    <td>
                        <div class="container">
                            
                        </div>
                        <form action="{{ route('rooms.destroy', $room->id) }}" method="POST">
                            <a class="btn btn-info" href="{{ route('rooms.show', $room->id) }}">Ver</a>
                            <a class="btn btn-primary" href="{{ route('rooms.edit', $room->id) }}">Editar</a>


                            @csrf
                            @method('DELETE')

                        </form>
                        <form id="delete-form-{{ $room->id }}" action="/rooms/{{ $room->id }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger"
                                onclick="confirmDelete(event, {{ $room->id }})">Eliminar</button>
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
@endsection

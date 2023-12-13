@extends('layout')

@section('content')
    <div class="container tables">
        <div class="row">
            <h1 class="col">Huespedes</h1>
            <a class=" col crud text-end" href="{{ route('asignrooms.index') }}"><i class='bx bx-plus-circle'></i></a>
        </div>
    </div>

    </div>

    <div class="container tables">
        <div class="row">
            <div class="col-lg-6">

                <form action="{{ route('guests.index') }}" method="GET">
                    <div class="row">
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="search"
                                placeholder="Buscar por nombre, apellidos, teléfono o correo...">
                        </div>
                        <div class="col-md-1">
                            <span class="input-group-btn mt-2">
                                <button class=" mt-1" type="submit"><i class='bx bx-search crud'></i></button>
                            </span>
                        </div>
                    </div>
                </form>

            </div>
            <div class="col-lg-6">
                <form action="{{ route('guests.index') }}" method="GET">
                    <div class="row">
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="id"
                                placeholder="Buscar por ID">
                        </div>
                        <div class="col-md-1">
                            <span class="input-group-btn mt-2">
                                <button class=" mt-1" type="submit"><i class='bx bx-search crud'></i></button>
                            </span>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <br>
    <div class="container tables">
        <table class="table table-bordered align-middle">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Telefono</th>
                <th>Correo</th>
                <th width="280px">Acciones</th>

            </tr>

            @foreach ($guests as $guest)
                <tr class="white-cell">
                    <td>{{ $guest->id }}</td>
                    <td>{{ $guest->name }}</td>
                    <td>{{ $guest->last_name }}</td>
                    <td>{{ $guest->phone }}</td>
                    <td>{{ $guest->email }}</td>
                    <td>
                        <form id="delete-form-{{ $guest->id }}" action="{{ route('guests.destroy', $guest->id) }}"
                            method="POST">
                            @csrf
                            @method('DELETE')
                            <table>
                                <tr>

                                    <td class="non-cell">
                                        <a class="btn btn-info" href="{{ route('guests.show', $guest->id) }}">Ver</a>
                                    </td>
                                    <td class="non-cell">
                                        <a class="btn btn-primary" href="{{ route('guests.edit', $guest->id) }}">Editar</a>
                                    </td>
                                    <td class="non-cell">
                                        <button type="submit" class="btn btn-danger"
                                            onclick="confirmDelete(event, {{ $guest->id }})">Eliminar</button>
                                    </td>
                                </tr>
                            </table>
                        </form>
                    </td>

                </tr>
            @endforeach
        </table>
    </div>
    </div>
    <script>
        function confirmDelete(event, guestId) {
            event.preventDefault();
            if (confirm('¿Está seguro que desea eliminar esta habitación?')) {
                document.getElementById('delete-form-' + guestId).submit();
            }
        }
    </script>
@endsection

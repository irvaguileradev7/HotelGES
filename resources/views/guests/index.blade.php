@extends('layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="container">
                    <div class="pull-left">
                        <h1>Huespedes</h1>
                    </div>

                    <div class="pull-right">
                        <a class="btn btn-success" href="{{ route('asignrooms.index') }}"> Nuevo huesped</a>
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
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Telefono</th>
                    <th>Correo</th>
                    <th width="280px">Acciones</th>

                </tr>

                @foreach ($guests as $guest)
                    <tr class="white-cell">
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
                                            <a class="btn btn-primary"
                                                href="{{ route('guests.edit', $guest->id) }}">Editar</a>
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

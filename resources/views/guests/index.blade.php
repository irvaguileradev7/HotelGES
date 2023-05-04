@extends('layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="container">
                <div class="pull-left">
                    <h1>Crear un nuevo huesped</h1>
                </div>

                <div class="pull-right">
                    <a class="btn btn-success" href="{{ route('guests.create') }}"> Nuevo huesped</a>
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
                <th>Apellido</th>
                <th>Telefono</th>

                <th width="280px">Acciones</th>
            </tr>

            @foreach ($guests as $guest)
                <tr class="white-cell">
                    <td>{{ $guest->id }}</td>
                    <td>{{ $guest->name }}</td>
                    <td>{{ $guest->last_name }}</td>
                    <td>{{ $guest->phone }}</td>


                    <td>
                        <form id="delete-form-{{ $guest->id }}" action="{{ route('guests.destroy', $guest->id) }}"
                            method="POST">
                            @csrf
                            @method('DELETE')
                            <table>
                                <tr>
                                    <td>
                                        <a class="btn btn-info" href="{{ route('guests.show', $guest->id) }}">Ver</a>
                                    </td>
                                    <td>
                                        <a class="btn btn-primary" href="{{ route('guests.edit', $guest->id) }}">Editar</a>
                                    </td>
                                    <td>
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

    <script>
        function confirmDelete(event, guestId) {
            event.preventDefault();
            if (confirm('¿Está seguro que desea eliminar esta habitación?')) {
                document.getElementById('delete-form-' + guestId).submit();
            }
        }
    </script>
@endsection

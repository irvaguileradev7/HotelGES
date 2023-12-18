@extends('layout')

@section('content')
    <div class="container tables">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-right">
                    <div class="container">
                        <div class="pull-left">
                            <h1>Usuarios</h1>
                        </div>
                        <a class="btn btn-success" href="{{ route('users.create') }}">Nuevo usuario</a>
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
            <table class="table table-bordered align-middle">
                <!-- Encabezados de la tabla -->
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Correo electrónico</th>
                    <th>Rol de usuario</th>
                    <th width="280px">Acciones</th>
                </tr>

                <!-- Iteración a través de los usuarios -->
                @foreach ($users as $user)
                    <tr class="white-cell">
                        <!-- Columnas de datos -->
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        @switch( $user->role_id )
                            @case(1)
                                <td>Administrador de IT</td>
                                @break
                            @case(2)
                                <td>Gerente de hotel</td>
                                @break
                            @case(3)
                                <td>Operario</td>
                                @break
                        @endswitch

                        <!-- Acciones -->
                        <td>
                            <form id="delete-form-{{ $user->id }}" action="{{ route('users.destroy', $user->id) }}"
                                method="POST">
                                @csrf
                                @method('DELETE')

                                <div class="row">
                                    <a class="col" href="{{ route('users.show', $user->id) }}"><span title="Ver"><i
                                                class='bx bx-book crud'></i></span></a>
                                    <a class="col" href="{{ route('users.edit', $user->id) }}"><span title="Editar"><i
                                                class='bx bxs-edit crud'></i></span></a>
                                    <a type="submit" class="col"
                                        onclick="confirmDelete(event, {{ $user->id }})"><span title="Eliminar"><i
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
        function confirmDelete(event, userId) {
            event.preventDefault();
            if (confirm('¿Está seguro que desea eliminar este usuario?')) {
                document.getElementById('delete-form-' + userId).submit();
            }
        }
    </script>
@endsection

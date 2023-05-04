@extends('layout')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="container">
                <div class="pull-left">
                    <h1>Pisos existentes</h1>
                </div>
                <div class="pull-right">
                    <a class="btn btn-success" href="{{ route('floors.create') }}">Nuevo piso</a>
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
                <th>Piso</th>

                <th width="280px">Acciones</th>
            </tr>

            @foreach ($floors as $floor)
            <tr class="white-cell">
                    <td>{{ $floor->id }}</td>
                    <td>{{ $floor->number_floor }}</td>

                    <td>
                        <form id="delete-form-{{ $floor->id }}" action="{{ route('floors.destroy', $floor->id) }}"
                            method="POST">
                            @csrf
                            @method('DELETE')
                            <table>
                                <tr>
                                    <td class="non-cell">
                                        <a class="btn btn-info" href="{{ route('floors.show', $floor->id) }}">Ver</a>
                                    </td>
                                    <td class="non-cell">
                                        <a class="btn btn-primary" href="{{ route('floors.edit', $floor->id) }}">Editar</a>
                                    </td>
                                    <td class="non-cell">
                                        <button type="submit" class="btn btn-danger"
                                            onclick="confirmDelete(event, {{ $floor->id }})">Eliminar</button>
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
        function confirmDelete(event, floorId) {
            event.preventDefault();
            if (confirm('¿Está seguro que desea eliminar esta habitación?')) {
                document.getElementById('delete-form-' + floorId).submit();
            }
        }
    </script>
@endsection

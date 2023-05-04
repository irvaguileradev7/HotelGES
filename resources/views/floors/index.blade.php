@extends('layout')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="container">
                <div class="pull-left">
                    <h1>Crear piso</h1>
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
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $floor->number_floor }}</td>


                    <td>
                        <form action="{{ route('floors.destroy', $floor->id) }}" method="POST">
                            <a class="btn btn-info" href="{{ route('floors.show', $floor->id) }}">Ver</a>
                            <a class="btn btn-primary" href="{{ route('floors.edit', $floor->id) }}">Editar</a>

                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>

                </tr>
            @endforeach
        </table>
    </div>
    <div class="container">
        {!! $floors->links() !!}

    </div>
@endsection

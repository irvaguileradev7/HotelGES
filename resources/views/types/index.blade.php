<!--Llamar al Layout-->
@extends('layout')

<!--Contenido que se invoca en el Layout-->
@section('content')
    <div class="row">

        <div class="col-lg-12 margin-tb">


            <div class="pull-right">
                <div class="container">
                    <div class="pull-left">
                        <h1>Crear tipos de habitaciones</h1>
                    </div>
                    <a class="btn btn-success" href="{{ route('types.create') }}">Nuevo tipo</a>
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
                <th>Tipos</th>

                <th width="280px">Acciones</th>
            </tr>

            @foreach ($types as $type)
                <tr>
                    {{-- <td>{{ ++$i }}</td> --}}
                    <td>{{ $type->id }}</td>
                    <td>{{ $type->room_type }}</td>


                    <td>
                        <form action="{{ route('types.destroy', $type->id) }}" method="POST">
                            <a class="btn btn-info" href="{{ route('types.show', $type->id) }}">Ver</a>
                            <a class="btn btn-primary" href="{{ route('types.edit', $type->id) }}">Editar</a>

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
        {!! $types->links() !!}

    </div>
@endsection

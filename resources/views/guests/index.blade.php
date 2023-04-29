@extends('layout')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h1>Crear un nuevo huesped</h1>
            </div>
            
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('guests.create') }}"> Nuevo huesped</a>
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
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $guest->name}}</td>
                <td>{{ $guest->last_name}}</td>
                <td>{{ $guest->phone}}</td>

                
                    <td>
                    <form action="{{ route('guests.destroy', $guest->id) }}" method="POST">
                        <a class="btn btn-info" href="{{ route('guests.show', $guest->id) }}">Ver</a>
                        <a class="btn btn-primary" href="{{ route('guests.edit', $guest->id) }}">Editar</a>

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
    {!! $guests->links() !!}
        
    </div>


@endsection

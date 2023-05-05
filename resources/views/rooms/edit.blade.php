@extends('layout')

@section('content')
<div class="container">
        <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Editar habitacion</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('rooms.index') }}">Regresar</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Error</strong>
        <br>
        Hubo un problema en los datos ingresados<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <form action="{{ route('rooms.update', $room->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nombre de la habitacion:</strong>
                    <input type="text" name="name" value="{{ $room->name }}" class="form-control"
                        placeholder="Name">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Detalles:</strong>
                    <textarea class="form-control" style="height:150px" name="detail" placeholder="Detail">{{ $room->detail }}</textarea>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </div>

    </form>
</div>

@endsection

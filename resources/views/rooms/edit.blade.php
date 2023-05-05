@extends('layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Editar habitacion</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('rooms.index') }}"> Regresar</a>
                </div>
            </div>
        </div>
        <br>
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
                        <input type="text" name="name" class="form-control" value="{{ $room->name }}"
                            placeholder="Nombre">
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Detalles:</strong>
                        <textarea class="form-control" style="height:150px" name="detail" placeholder="Detalles">{{ $room->detail }}</textarea>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Tipo:</strong>
                        <select id="type_id" name="type_id" class="form-control select2">
                            @foreach ($types as $type)
                                <option value="{{ $type->id }}" {{ $room->type_id == $type->id ? 'selected' : '' }}>
                                    {{ $type->room_type }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Piso:</strong>
                        <select id="floor_id" name="floor_id" class="form-control select2">
                            @foreach ($floors as $floor)
                                <option value="{{ $floor->id }}" {{ $room->floor_id == $floor->id ? 'selected' : '' }}>
                                    {{ $floor->number_floor }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </div>
            </div>

        </form>
    </div>

@endsection

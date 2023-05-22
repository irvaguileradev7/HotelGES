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
                        <strong>Numero de habitacion:</strong>
                        <input type="number" name="number" value="{{ $room->number }}" class="form-control"
                            placeholder="Numero...">
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Detalles:</strong>
                        <textarea class="form-control" style="height:150px" name="detail" placeholder="Detalles">{{ $room->detail }}</textarea>
                    </div>
                </div>

                <strong>Tipo:</strong>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <select id="type_id" name="type_id" class="form-control select2">
                        @foreach ($types as $type)
                            <option value="{{ $type->id }}" {{ $type->id == $room->type_id ? 'selected' : '' }}>
                                {{ $type->room_type }}</option>
                        @endforeach
                    </select>
                </div>

                <strong>Estatus:</strong>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <select id="status_id" name="status_id" class="form-control select2">
                        @foreach ($statuses as $status)
                            @switch ($status->id)
                                @case(1)
                                    <option value="1">Disponible</option>
                                @break

                                @case(2)
                                    <option value="2">Reservado</option>
                                @break

                                @case(3)
                                    <option value="3">Ocupado</option>
                                @break

                                @case(4)
                                    <option value="4">No Disponible</option>
                                @break
                            @endswitch
                        @endforeach
                    </select>
                </div>

                <strong>Piso:</strong>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <select id="floor_id" name="floor_id" class="form-control select2">
                        @foreach ($floors as $floor)
                            <option value="{{ $floor->id }}" {{ $floor->id == $room->floor_id ? 'selected' : '' }}>
                                {{ $floor->number_floor }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Capacidad:</strong>
                        <input type="number" name="capacity" value="{{ $room->capacity }}" class="form-control"
                            placeholder="Numero...">
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Precio:</strong>
                        <input type="number" name="price" value="{{ $room->price }}" class="form-control"
                            placeholder="Numero...">
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </div>
            </div>

        </form>
    </div>

@endsection

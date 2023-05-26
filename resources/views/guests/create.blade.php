@extends('layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Anadir tipos de dato</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('guests.index') }}"> Regresar</a>
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

        <form action="{{ route('guests.store') }}" method="POST">
            @csrf
            <div class="container">
                <div class="row">
                    <div class="col-md-8 offset-md-2">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="mb-0">Datos del usuario</h5>
                            </div>
                            <div class="card-body">
                                <div id="carouselExampleControls" class="carousel slide" data-interval="false">
                                    <div class="carousel-inner">
                                        <div class="container">
                                            <div class="carousel-item active">
                                                <div class="container">
                                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                                        <div class="form-group">
                                                            <strong>Nombre(s):</strong>
                                                            <input type="text" name="name" class="form-control"
                                                                placeholder="Nombre(s)...">
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                                        <div class="form-group">
                                                            <strong>Apellido(s):</strong>
                                                            <input type="text" name="last_name" class="form-control"
                                                                placeholder="Apellido(s)...">
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                                        <div class="form-group">
                                                            <strong>Correo:</strong>
                                                            <input type="text" name="email" class="form-control"
                                                                placeholder="Correo electronico...">
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                                        <div class="form-group">
                                                            <strong>Telefono:</strong>
                                                            <input type="text" name="phone" max="12"
                                                                class="form-control" placeholder="Telefono...">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="carousel-item">
                                                <div class="container">
                                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                                        <div class="form-group">
                                                            <strong>Adultos:</strong>
                                                            <input type="number" name="adults" class="form-control" min=1
                                                                placeholder="Adultos..." value="1">
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                                        <div class="form-group">
                                                            <strong>Ninos:</strong>
                                                            <input type="number" name="kids" class="form-control" min=0
                                                                placeholder="Niños..." value="0">
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="carousel-item">
                                                <div class="container">
                                                    <div class="card-body">
                                                        <strong>Habitacion:</strong>
                                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                                            <select id="floor_id" name="room_id"
                                                                class="form-control select2">
                                                                @foreach ($rooms as $room)
                                                                    <option value="{{ $room->id }}">{{ $room->number }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row">

                                                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                                            <button type="submit" class="btn btn-primary">Guardar</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="container">
                                            <a class="carousel-control-prev" href="#carouselExampleControls" role="button"
                                                data-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="btn btn-danger">Anterior</span>
                                            </a>
                                            <a class="carousel-control-next" href="#carouselExampleControls" role="button"
                                                data-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="btn btn-danger">Siguiente</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </form>
        {{-- <form action="{{ route('guests.store') }}" method="POST">
            @csrf
            <div id="accordion">
                <div class="card">
                    <div class="card-header">
                        <a class="btn" data-bs-toggle="collapse" href="#collapseOne">
                            Datos de la persona
                        </a>
                    </div>
                    <div id="collapseOne" class="collapse show" data-bs-parent="#accordion">
                        <div class="card-body">
                            <div class="container">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Nombre(s):</strong>
                                        <input type="text" name="name" class="form-control"
                                            placeholder="Nombre(s)...">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Apellido(s):</strong>
                                        <input type="text" name="last_name" class="form-control"
                                            placeholder="Apellido(s)...">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Correo:</strong>
                                        <input type="text" name="email" class="form-control"
                                            placeholder="Correo electronico...">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Telefono:</strong>
                                        <input type="text" name="phone" max="12" class="form-control"
                                            placeholder="Telefono...">
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <a class="collapsed btn" data-bs-toggle="collapse" href="#collapseTwo">
                            Cantidad de personas
                        </a>
                    </div>
                    <div id="collapseTwo" class="collapse" data-bs-parent="#accordion">
                        <div class="card-body">
                            <div class="container">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Adultos:</strong>
                                        <input type="number" name="adults" class="form-control" min=1
                                            placeholder="Adultos..." value="1">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Ninos:</strong>
                                        <input type="number" name="kids" class="form-control" min=0
                                            placeholder="Niños...">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <a class="collapsed btn" data-bs-toggle="collapse" href="#collapseThree">
                            Habitacion
                        </a>
                    </div>
                    <div id="collapseThree" class="collapse" data-bs-parent="#accordion">
                        <div class="container">
                            <div class="card-body">
                                <strong>Habitacion:</strong>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <select id="floor_id" name="room_id" class="form-control select2">
                                        @foreach ($rooms as $room)
                                            <option value="{{ $room->id }}">{{ $room->number }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
            <div class="row">

                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </div>

        </form>
        --}}
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

@endsection

@extends('layout')

@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{ asset('css/style_catalogue.css') }}">
        <title>Document</title>
    </head>

    <body>
        <section class="section-products">
            <div class="container">
                <div class="row justify-content-center text-center">
                    <div class="col-md-8 col-lg-6">
                        <div class="header">
                            <h2>Habitaciones</h2>

                        </div>
                    </div>
                </div>

                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 margin-tb">
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
                        <div class="row">
                            @foreach ($rooms as $index => $room)
                                <div class="col-md-6 col-lg-4 col-xl-3">
                                    <div id="product-{{ $index + 1 }}" class="single-product">
                                        <div class="part-1">
                                            <div class="image-container">
                                                <img src="{{ asset('/' . $room->image) }}" width="100%" class="img-fluid"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#exampleModal-{{ $index + 1 }}">
                                            </div>
                                        </div>
                                        <div class="part-2">
                                            <a href="#" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal-{{ $index + 1 }}">
                                                Habitacion numero: {{ $room->number }}
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <!-- Modal para el contenido del popup -->
                                <div class="modal fade" id="exampleModal-{{ $index + 1 }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-xl">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title" id="exampleModalLabel">Habitación
                                                    {{ $room->number }}</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="image-container">
                                                            <img src="{{ asset('/' . $room->image) }}" width="100%"
                                                                class="img-fluid" data-bs-toggle="modal"
                                                                data-bs-target="#exampleModal-{{ $index + 1 }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">

                                                        <h3>Tipo:</h3>
                                                        <h5>{{ $room->type->room_type }}</h5>
                                                        <h3>Capacidad:</h3>
                                                        <h5>{{ $room->capacity }}</h5>
                                                        <h3>Piso:</h3>
                                                        <h5>{{ $room->floor->number_floor }}</h5>
                                                        <h3>Detalles:</h3>
                                                        <h5>{{ $room->detail }}</h5>
                                                        <h3>Precio:</h3>
                                                        <h5>{{ $room->price }}$ MXN</h5>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="modal-footer">
                                                <form method="POST" action="{{ route('asignrooms.store') }}">
                                                    @csrf
                                                    <input type="hidden" name="room_id" value="{{ $room->id }}">
                                                    <button type="submit" class="btn btn-primary">Seleccionar
                                                        Habitación</button>
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Cerrar</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>
        </section>

    </body>

    </html>
@endsection

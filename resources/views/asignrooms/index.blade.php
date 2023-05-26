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
                            <h3>Habitaciones</h3>
                            <h2>Vistas</h2>
                        </div>
                    </div>
                </div>
                <h1>{{ $idGuest }}</h1>




				{{--Poner el contenido pero que este dentro del nuevo  estandar dinamico--}}
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 margin-tb">

                            <div class="container">
                                <div class="pull-left">
                                    <h1>Habitaciones</h1>
                                </div>
                                <div class="pull-right">
                                    <a class="btn btn-success" href="{{ route('rooms.create') }}">Nueva habitación</a>
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
                                <th>Piso</th>
                                <th>No. habitacion</th>
                                <th>Detalles</th>
                                <th>Tipo de habitación</th>
                                <th>Estatus</th>
                                <th width="280px">Acciones</th>
                            </tr>

                            @foreach ($rooms as $room)
                                <tr class="white-cell">
                                    <td>{{ $room->floor_id }}</td>
                                    <td>{{ $room->number }}</td>
                                    <td>{{ $room->detail }}</td>
                                    <td>{{ $room->type_id }}</td>
                                    {{--
                        @switch( $room->type_id)
                            @case(1)
                                <td>Habitación individual</td>
                            @break

                            @case(2)
                                <td>Habitación doble</td>
                            @break

                            @case(3)
                                <td>Habitación triple</td>
                            @break

                            @case(4)
                                <td>Habitación Queen size</td>
                            @break

                            @case(5)
                                <td>Habitación King size</td>
                            @break

                            @case(6)
                                <td>Suite de lujo</td>
                            @break
                        @endswitch
                        --}}
                                    @switch($room->status_id)
                                        @case(1)
                                            <td class="table-success">
                                                <p><strong class="text-success">Disponible</strong></p>
                                            </td>
                                        @break

                                        @case(2)
                                            <td class="table-secondary">
                                                <p><strong>Reservado</strong></p>
                                            </td>
                                        @break

                                        @case(3)
                                            <td class="table-danger">
                                                <p><strong class="text-danger">Ocupado</strong></p>
                                            </td>
                                        @break

                                        @case(4)
                                            <td class="table-dark">
                                                <strong>No Disponible</strong>
                                            </td>
                                        @break
                                    @endswitch



                                    <td>
                                        {{--
                        <div class="float-left">
                            <a class="btn btn-info" href="{{ route('rooms.show', $room->id) }}">Ver</a>
                            <a class="btn btn-primary" href="{{ route('rooms.edit', $room->id) }}">Editar</a>
                        </div>
                        <div class="float-end">
                        <form id="delete-form-{{ $room->id }}" action="{{ route('rooms.destroy', $room->id) }}"
                            method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"
                                onclick="confirmDelete(event, {{ $room->id }})">Eliminar</button>
                        </form>
                        </div>
                        --}}
                                        <form id="delete-form-{{ $room->id }}"
                                            action="{{ route('rooms.destroy', $room->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <table>
                                                <tr>
                                                    <td class="non-cell">
                                                        <a class="btn btn-info"
                                                            href="{{ route('rooms.show', $room->id) }}">Ver</a>
                                                    </td>
                                                    <td class="non-cell">
                                                        <a class="btn btn-primary"
                                                            href="{{ route('rooms.edit', $room->id) }}">Editar</a>
                                                    </td>
                                                    <td class="non-cell">
                                                        <button type="submit" class="btn btn-danger"
                                                            onclick="confirmDelete(event, {{ $room->id }})">Eliminar</button>
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
                        function confirmDelete(event, roomId) {
                            event.preventDefault();
                            if (confirm('¿Está seguro que desea eliminar esta habitación?')) {
                                document.getElementById('delete-form-' + roomId).submit();
                            }
                        }
                    </script>
                </div>


                <div class="row">
                    <!-- Single Product -->
                    <div class="col-md-6 col-lg-4 col-xl-3">
                        <div id="product-1" class="single-product">
                            <div class="part-1">
                                <ul>
                                    <li><a href="#"><i class="fas fa-shopping-cart"></i></a></li>
                                    <li><a href="#"><i class="fas fa-heart"></i></a></li>
                                    <li><a href="#"><i class="fas fa-plus"></i></a></li>
                                    <li><a href="#"><i class="fas fa-expand"></i></a></li>
                                </ul>
                            </div>
                            <div class="part-2">
                                <h3 class="product-title">Vista Avenida Principal</h3>
                                <h4 class="product-old-price">$200.99</h4>
                                <h4 class="product-price">$150.99</h4>
                            </div>
                        </div>
                    </div>
                    <!-- Single Product -->
                    <div class="col-md-6 col-lg-4 col-xl-3">
                        <div id="product-2" class="single-product">
                            <div class="part-1">
                                <span class="discount">15% off</span>
                                <ul>
                                    <li><a href="#"><i class="fas fa-shopping-cart"></i></a></li>
                                    <li><a href="#"><i class="fas fa-heart"></i></a></li>
                                    <li><a href="#"><i class="fas fa-plus"></i></a></li>
                                    <li><a href="#"><i class="fas fa-expand"></i></a></li>
                                </ul>
                            </div>
                            <div class="part-2">
                                <h3 class="product-title">Vista Alta al Mar</h3>
                                <h4 class="product-price">$500</h4>
                            </div>
                        </div>
                    </div>
                    <!-- Single Product -->
                    <div class="col-md-6 col-lg-4 col-xl-3">
                        <div id="product-3" class="single-product">
                            <div class="part-1">
                                <ul>
                                    <li><a href="#"><i class="fas fa-shopping-cart"></i></a></li>
                                    <li><a href="#"><i class="fas fa-heart"></i></a></li>
                                    <li><a href="#"><i class="fas fa-plus"></i></a></li>
                                    <li><a href="#"><i class="fas fa-expand"></i></a></li>
                                </ul>
                            </div>
                            <div class="part-2">
                                <h3 class="product-title">Vista Media Al Mar</h3>
                                <h4 class="product-old-price">$450</h4>
                                <h4 class="product-price">$400</h4>
                            </div>
                        </div>
                    </div>
                    <!-- Single Product -->
                    <div class="col-md-6 col-lg-4 col-xl-3">
                        <div id="product-4" class="single-product">
                            <div class="part-1">
                                <span class="new">new</span>
                                <ul>
                                    <li><a href="#"><i class="fas fa-shopping-cart"></i></a></li>
                                    <li><a href="#"><i class="fas fa-heart"></i></a></li>
                                    <li><a href="#"><i class="fas fa-plus"></i></a></li>
                                    <li><a href="#"><i class="fas fa-expand"></i></a></li>
                                </ul>
                            </div>
                            <div class="part-2">
                                <h3 class="product-title">Vista Avenida Principal</h3>
                                <h4 class="product-price">$300</h4>
                            </div>
                        </div>
                    </div>
                    <!-- Single Product -->
                    <div class="col-md-6 col-lg-4 col-xl-3">
                        <div id="product-5" class="single-product">
                            <div class="part-1">
                                <ul>
                                    <li><a href="#"><i class="fas fa-shopping-cart"></i></a></li>
                                    <li><a href="#"><i class="fas fa-heart"></i></a></li>
                                    <li><a href="#"><i class="fas fa-plus"></i></a></li>
                                    <li><a href="#"><i class="fas fa-expand"></i></a></li>
                                </ul>
                            </div>
                            <div class="part-2">
                                <h3 class="product-title">Vista Malecon</h3>
                                <h4 class="product-old-price">$300 $280</h4>
                                <h4 class="product-price">$280</h4>
                            </div>
                        </div>
                    </div>
                    <!-- Single Product -->
                    <div class="col-md-6 col-lg-4 col-xl-3">
                        <div id="product-6" class="single-product">
                            <div class="part-1">
                                <span class="discount">15% off</span>
                                <ul>
                                    <li><a href="#"><i class="fas fa-shopping-cart"></i></a></li>
                                    <li><a href="#"><i class="fas fa-heart"></i></a></li>
                                    <li><a href="#"><i class="fas fa-plus"></i></a></li>
                                    <li><a href="#"><i class="fas fa-expand"></i></a></li>
                                </ul>
                            </div>
                            <div class="part-2">
                                <h3 class="product-title">Vista al Mar</h3>
                                <h4 class="product-price">$475.99</h4>
                            </div>
                        </div>
                    </div>
                    <!-- Single Product -->
                    <div class="col-md-6 col-lg-4 col-xl-3">
                        <div id="product-7" class="single-product">
                            <div class="part-1">
                                <ul>
                                    <li><a href="#"><i class="fas fa-shopping-cart"></i></a></li>
                                    <li><a href="#"><i class="fas fa-heart"></i></a></li>
                                    <li><a href="#"><i class="fas fa-plus"></i></a></li>
                                    <li><a href="#"><i class="fas fa-expand"></i></a></li>
                                </ul>
                            </div>
                            <div class="part-2">
                                <h3 class="product-title">Vista Zona Dorada</h3>
                                <h4 class="product-old-price">$280</h4>
                                <h4 class="product-price">$350</h4>
                            </div>
                        </div>
                    </div>
                    <!-- Single Product -->
                    <div class="col-md-6 col-lg-4 col-xl-3">
                        <div id="product-8" class="single-product">
                            <div class="part-1">
                                <span class="new">new</span>
                                <ul>
                                    <li><a href="#"><i class="fas fa-shopping-cart"></i></a></li>
                                    <li><a href="#"><i class="fas fa-heart"></i></a></li>
                                    <li><a href="#"><i class="fas fa-plus"></i></a></li>
                                    <li><a href="#"><i class="fas fa-expand"></i></a></li>
                                </ul>
                            </div>
                            <div class="part-2">
                                <h3 class="product-title">Vista Alta Al MAr</h3>
                                <h4 class="product-price">$600</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </body>

    </html>
@endsection

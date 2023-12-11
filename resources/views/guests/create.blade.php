@extends('layout')

@section('content')

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


    <form id="guest-form" action="{{ route('guests.store') }}" method="POST" autocomplete="off">
        @csrf
        <input type="hidden" name="reservation_id" value="{{ session('reservation_id') }}">
        <div class="container">
            <div class="row">
                <div class="screen-center">
                    <div class="card" style="margin-bottom: 4%">
                        <div class="card-body">
                            <h5 class="mb-0">Datos del huesped</h5>
                            <div id="carouselExampleControls" class="carousel slide" data-interval="false">
                                <div class="carousel-inner pb-5">
                                    <div class="container">
                                        <div class="carousel-item active position-relative bottom-50">
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

                                                <div class="row">
                                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                                        <div class="form-group">
                                                            <strong>Correo:</strong>
                                                            <input type="text" name="email" class="form-control"
                                                                placeholder="Correo electronico...">
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                                        <div class="form-group">
                                                            <strong>Telefono:</strong>
                                                            <input type="text" name="phone" max="12"
                                                                class="form-control" placeholder="Telefono...">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="carousel-item position-relative bottom-50">
                                            <div class="container">
                                                <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
                                                    <div class="form-group">
                                                        <strong>Pais</strong>
                                                        <select name="country" id="country" class="form-control">
                                                            <option value="">Seleccionar Pais</option>
                                                            @foreach ($countries as $country)
                                                                <option value="{{ $country }}">{{ $country }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                    <div class="form-group">
                                                        <strong>Estado/Region/Provincia:</strong>
                                                        <input type="text" name="region" id="region"
                                                            class="form-control" placeholder="Region...">
                                                    </div>
                                                </div>

                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                    <div class="form-group">
                                                        <strong>Ciudad:</strong>
                                                        <input type="text" name="city" id="city"
                                                            class="form-control" placeholder="Ciudad...">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                                        <div class="form-group">
                                                            <strong>Direccion:</strong>
                                                            <input type="text" name="street_address" id="street_address"
                                                                class="form-control" placeholder="Direccion...">
                                                        </div>
                                                    </div>

                                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                                        <div class="form-group">
                                                            <strong>Codigo postal:</strong>
                                                            <input type="text" name="zip_code" id="zip_code"
                                                                class="form-control" placeholder="">
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
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <a href="#carouselExampleControls" role="button" data-slide="prev">
                            <span class="btn btn-danger">Anterior</span>
                        </a>
                        <a href="#carouselExampleControls" role="button" data-slide="next">
                            <span class="btn btn-danger">Siguiente</span>
                        </a>
                    </div>
                </div>
            </div>
    </form>
    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

    <script>
        // Aun no funciona
        // Evento que se activa cuando se intenta cerrar la página o actualizarla
        window.addEventListener("beforeunload", function(event) {
            // Eliminar la tabla asociada a la sesión
            var reservationId = "{{ session('reservation_id') }}";
            if (reservationId) {
                deleteReservationTable(reservationId);
            }

            // Mostrar un mensaje de advertencia
            event.preventDefault();
            event.returnValue = "Si cierra esta página, perderá su progreso.";
        });

        // Función para eliminar la tabla asociada a la sesión
        function deleteReservationTable(reservationId) {
            // Realiza una petición AJAX para eliminar la tabla
            //  jQuery incluido de usarse en la página
            $.ajax({
                url: "{{ route('deleteReservationTable') }}",
                method: "POST",
                data: {
                    reservationId: reservationId,
                    _token: "{{ csrf_token() }}"
                },
                success: function(response) {
                    console.log("Tabla eliminada correctamente");
                },
                error: function(xhr, status, error) {
                    console.error("Error al eliminar la tabla:", error);
                }
            });
        }
    </script>


@endsection

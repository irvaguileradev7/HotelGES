@extends('layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Editar habitacion</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('guests.index') }}">Regresar</a>
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

    <form action="{{ route('guests.update', $guest->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nombre(s):</strong>
                    <input type="text" name="name" class="form-control" value="{{ $guest->name }}"
                        placeholder="Name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Apellidos:</strong>
                    <input type="text" name="last_name" class="form-control" value="{{ $guest->last_name }}"
                        placeholder="Name">
                </div>
            </div>
            
            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Correo:</strong>
                        <input type="text" name="email" class="form-control" value="{{ $guest->email }}"
                            placeholder="Name">
                    </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Telefono:</strong>
                        <input type="text" name="phone" class="form-control" value="{{ $guest->phone }}"
                            placeholder="Name">
                    </div>
                </div>
            </div>

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
                    <input type="text" name="region" id="region" class="form-control"
                        placeholder="Region...">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Ciudad:</strong>
                    <input type="text" name="city" id="city" class="form-control"
                        placeholder="Ciudad...">
                </div>
            </div>

            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Direccion:</strong>
                        <input type="text" name="street_address" id="street_address" class="form-control"
                            placeholder="Direccion...">
                    </div>
                </div>

                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Codigo postal:</strong>
                        <input type="text" name="zip_code" id="zip_code" class="form-control"
                            placeholder="">
                    </div>
                </div>


            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </div>




    </form>
@endsection

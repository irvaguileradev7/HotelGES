@extends('layout')

@section('content')

    <div class="container">
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
                        <input type="text" name="name" class="form-control" value="{{ old('name', $guest->name) }}"
                            placeholder="Nombre">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Apellidos:</strong>
                        <input type="text" name="last_name" class="form-control"
                            value="{{ old('last_name', $guest->last_name) }}" placeholder="Apellidos">
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <strong>Correo:</strong>
                            <input type="text" name="email" class="form-control"
                                value="{{ old('email', $guest->email) }}" placeholder="Correo">
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <strong>Telefono:</strong>
                            <input type="text" name="phone" class="form-control"
                                value="{{ old('phone', $guest->phone) }}" placeholder="Telefono">
                        </div>
                    </div>
                </div>


                <input type="hidden" name="country" class="form-control" value="{{ old('phone', $guest->country) }}">

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>País</strong>
                        <select name="country" id="country" class="form-control">
                            <option value="">Seleccionar País</option>
                            @foreach ($countries as $country)
                                <option value="{{ $country }}" @if ($country == old('country', $guest->country)) selected @endif>
                                    {{ $country }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>


                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Estado/Región/Provincia:</strong>
                        <input type="text" name="region" id="region" class="form-control"
                            placeholder="Estado/Región/Provincia..." value="{{ old('region', $guest->region) }}">
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Ciudad:</strong>
                        <input type="text" name="city" id="city" class="form-control" placeholder="Ciudad..."
                            value="{{ old('city', $guest->city) }}">
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <strong>Dirección:</strong>
                            <input type="text" name="street_address" id="street_address" class="form-control"
                                placeholder="Dirección..." value="{{ old('street_address', $guest->street_address) }}">
                        </div>
                    </div>

                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <strong>Código Postal:</strong>
                            <input type="text" name="zip_code" id="zip_code" class="form-control"
                                placeholder="Código Postal" value="{{ old('zip_code', $guest->zip_code) }}">
                        </div>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </form>
    </div>
@endsection

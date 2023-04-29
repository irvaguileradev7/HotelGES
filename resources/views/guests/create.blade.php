@extends('layout')

@section('content')

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

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nombre(s):</strong>
                    <input type="text" name="name" class="form-control" placeholder="Name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Apellidos:</strong>
                    <input type="text" name="last_name" class="form-control" placeholder="Name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Correo:</strong>
                    <input type="text" name="email" class="form-control" placeholder="Name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Telefono:</strong>
                    <input type="number"  name="phone" class="form-control" placeholder="Name">
                </div>
            </div>
            <div class="container">
                <h4>Acompanantes</h3>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Adultos:</strong>
                        <input type="number" name="adults" class="form-control" placeholder="Name">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Ninos:</strong>
                        <input type="number"  name="kids" class="form-control" placeholder="Name">
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </div>

    </form>
@endsection

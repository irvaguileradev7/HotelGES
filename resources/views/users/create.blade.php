@extends('layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Crear un usuario</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('users.index') }}"> Regresar</a>
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

        <form action="{{ route('users.store') }}" method="POST">
            @csrf

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Nombre:</strong>
                        <input type="text" name="name" class="form-control" placeholder="Name">
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Correo:</strong>
                        <input type="email" name="email" class="form-control" placeholder="Name">
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Contraseña:</strong>
                        <input type="password" name="password" class="form-control" placeholder="Name">
                    </div>
                </div>

            </div>

            <strong>Roles:</strong>
            <div class="col-xs-12 col-sm-12 col-md-12">

                <select name="role_id" id="role_id" class="form-control">
                    <option value="">Seleccionar tipo de usuario</option>
                    @foreach( $roles as $role )
                        <option value="{{ $role->id }}">{{ $role->user_role_type }}</option>
                    @endforeach
                </select>
            </div>


                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </div>

        </form>
    </div>

@endsection

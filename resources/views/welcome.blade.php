@extends('layout')

@section('content')
    <div class="container" style= "margin-top:5%">
        <h1 style="margin-bottom: 25px">Sistema de gestion de hoteles</h1>
        <div class="row" style="margin-bottom: 30px">
            <div class="col-md-4">
                <div class="card">
                    <div class="space-padding">
                            <h3>
                                Bienvenido, {{ Auth::user()->name }}
                            </h3>
                                <p>Acceso como: {{ Auth::user()->role->user_role_type }} </p>
                            <img class="mod-size" src="{{ asset('/img/LogoHG.png') }}" width="250px">
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="grid-container">
                    <div class="container">
                        <a href="{{ route('asignrooms.index') }}">
                            <div class="btn btn-green">Habitaciones disponibles</div>
                    </div>
                </div>
                <div class="grid-container">
                    <div class="container">
                        <a href="{{ route('guests.index') }}">
                            <div class="btn btn-green">Lista de huespedes</div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

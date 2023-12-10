@extends('layout')

@section('content')
    <div class="container" style= "margin-top:10%">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="space-padding">
                        <div class="">
                            <h1>Bienvenido, {{ Auth::user()->name }} </h1>
                        </div>
                        <div class="">
                            <h3>Sistema de gestion de hoteles</h3>
                        </div>
                        <div class="">
                            <img class="mod-size" src="{{ asset('/img/LogoHG.png') }}" width="400rem">
                            </a>
                        </div>
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

@extends('layout')

@section('content')
    <div class="row">
        <div class="container">
            <div class="centerer">
                <div class="grid-contaniner">
                    <div class="content">
                        <div class="grid-container">
                            <h1>Bienvenido, {{ Auth::user()->name }} </h1>
                        </div>
                        <div class="grid-container">
                            <h3>Sistema de gestion de hoteles</h3>
                        </div>
                        <div class="grid-container">
                            <img class="mod-size" src="{{ asset('/img/LogoHG.png') }}" width="400rem">
                            </a>
                        </div>
                        <div class="grid-container">
                            <div class="container">
                                <a href="{{ route('asignrooms.index') }}">
                                    <div class="btn btn-green">Ver habitaciones disponibles</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

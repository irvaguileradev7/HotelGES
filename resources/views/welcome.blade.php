@extends('layout')

@section('content')
    <div class="container" style="margin-right: 200px, margin-left: 200px">
        <div class="row">
            <div class="card" style="margin-right: 200px">

                <div class="col">
                    <div class="">
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
        </div>
        <div class="col">
            <div class="grid-container">
                <div class="container">
                    <a href="{{ route('asignrooms.index') }}">
                        <div class="btn btn-green">Ver habitaciones disponibles</div>
                </div>
            </div>
        </div>
    </div>
@endsection

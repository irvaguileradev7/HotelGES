@extends('layout3')

@section('content')
    <div class="row">
        <div class="container">
            <div class="content">
                <img class="mod-size" src="{{ asset('/img/LogoHG.png') }}" width="400rem">
                <div class="container">
                    <a href="{{ route('asignrooms.index') }}">
                        <div class="btn btn-light">Habitaciones disponibles</div>

                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection

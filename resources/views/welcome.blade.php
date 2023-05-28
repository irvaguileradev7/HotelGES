@extends('layout3')

@section('content')
    <div class="row">
        <div class="container">
            <div class="content">
                <h1>HotelGes</h1>
                <h2>Gestion de hotel</h2>
                <div class="container">
                    <a href="{{ route('asignrooms.index') }}">
                        <div class="btn btn-danger">Asignar Habitaciones</div>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layout3')

@section('content')
    <div class="container">
        <div class="content">
            <h1>HotelGes</h1>
            <h2>Gestion de hotel</h2>
        </div>
        <a href="{{ route('asignrooms.index') }}" class="nav-link px-0 align-middle">
            <div class="btn btn-danger">Asignar Habitaciones</div>
        </a>
    </div>
@endsection

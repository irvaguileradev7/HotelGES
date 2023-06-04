@extends('layout')

@section('content')
<div class="container">
    <h1>Reservacion</h1>
    <h1>{{ Session::get('room_id') }}</h1>

    <form action="{{ route('reservations.store') }}" method="POST">
        @csrf
        <input type="hidden" name="room_id" value="{{ Session::get('room_id') }}">

        <input type="date" name="time_from">

        @error('time_from')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <input type="date" name="time_to">

        @error('time_to')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <button type="submit">Guardar</button>
    </form>
</div>
@endsection
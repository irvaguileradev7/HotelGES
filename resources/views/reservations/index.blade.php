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


        @if ($reservations->count() > 0)
            <h2>Reservaciones existentes:</h2>

            @php
                $currentMonth = null;
                $currentYear = null;
            @endphp

            <div class="calendar">
                @foreach ($reservations as $reservation)
                    @php
                        $month = date('F', strtotime($reservation->time_from));
                        $year = date('Y', strtotime($reservation->time_from));
                    @endphp

                    @if ($currentMonth != $month || $currentYear != $year)
                        @if (!is_null($currentMonth))
                            </ul>
                        @endif

                        <div class="month">
                            <h3>{{ $month }} {{ $year }}</h3>
                            <ul>
                    @endif

                    <li>Fecha de inicio: {{ $reservation->time_from }}</li>
                    <li>Fecha de fin: {{ $reservation->time_to }}</li>
                    <br>

                    @php
                        $currentMonth = $month;
                        $currentYear = $year;
                    @endphp
                @endforeach

                </ul>
            </div>
        @else
            <p>No hay reservaciones existentes para este cuarto.</p>
        @endif
    @endsection

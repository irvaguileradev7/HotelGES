@extends('layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Ver huésped</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('guests.index') }}">Regresar</a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nombre(s):</strong>
                    {{ $guest->name }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Apellido(s):</strong>
                    {{ $guest->last_name }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Correo:</strong>
                    {{ $guest->email }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Teléfono:</strong>
                    {{ $guest->phone }}
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Dirección:</strong>
                    {{ $guest->street_address }}. {{ $guest->city }}. {{ $guest->zip_code }}.
                    {{ $guest->country }}
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <h4>Información de la reservación:</h4>
                    <p>Habitación: {{ $reservation->room->number }}</p>
                    <p>Fecha de entrada: {{ $reservation->time_from }}</p>
                    <p>Fecha de salida: {{ $reservation->time_to }}</p>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <h4>Servicios asignados:</h4>
                    @foreach ($asignServices as $asignService)
                        <p>{{ $asignService->service->type }}</p>
                        <p>{{ $asignService->quantity }}</p>
                    @endforeach
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <h4>Información de pago:</h4>
                    @if ($payment)
                        <p>Total a pagar: {{ $payment->total_payment }}</p>
                        <p>Monto pagado: {{ $payment->guest_payment}}</p>
                        <p>Pago pendiente: {{ $payment->difference}}</p>
                    @else
                        <p>No se ha realizado ningún pago.</p>
                    @endif
                </div>
            </div>
        </div>

    </div>
@endsection

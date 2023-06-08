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
                <table class="table table-bordered custom-table">
                    <tr>
                        <th></th>
                        <td>Dato del huesped</td>
                    </tr>
                    <tr>
                        <th>Nombre(s)</th>
                        <td>{{ $guest->name }}</td>
                    </tr>
                    <tr>
                        <th>Apellido(s)</th>
                        <td>{{ $guest->last_name }}</td>
                    </tr>
                    <tr>
                        <th>Correo</th>
                        <td>{{ $guest->email }}</td>
                    </tr>
                    <tr>
                        <th>Teléfono</th>
                        <td>{{ $guest->phone }}</td>
                    </tr>
                    <tr>
                        <th>Dirección</th>
                        <td>{{ $guest->street_address }}. {{ $guest->city }}. {{ $guest->zip_code }}. {{ $guest->country }}
                        </td>
                    </tr>
                </table>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <h4>Información de la reservación:</h4>
                    <table class="table table-bordered custom-table">
                        <tr>
                            <th></th>
                            <td>Datos de la reservación</td>
                        </tr>
                        <tr>
                            <th>Habitación</th>
                            <td>{{ $reservation->room->number }}</td>
                        </tr>
                        <tr>
                            <th>Fecha de entrada</th>
                            <td>{{ $reservation->time_from }}</td>
                        </tr>
                        <tr>
                            <th>Fecha de salida</th>
                            <td>{{ $reservation->time_to }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <h4>Servicios asignados:</h4>
                    <table class="table table-bordered custom-table">
                        <tr>
                            <td>Servicio</td>
                            <td>Cantidad</td>
                            <td>Total</td>
                        </tr>
                        @foreach ($asignServices as $asignService)
                            <tr>
                                <td>{{ $asignService->service->type }}</td>
                                <td>{{ $asignService->quantity }}</td>
                                <td>{{ $asignService->total_services}}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <h4>Información de pago:</h4>
                    @if ($payment)
                        <table class="table table-bordered custom-table">
                            <tr>
                                <th></th>
                                <td>Pago</td>
                            </tr>
                            <tr>
                                <th>Total a pagar</th>
                                <td>{{ $payment->total_payment }}</td>
                            </tr>
                            <tr>
                                <th>Monto pagado</th>
                                <td>{{ $payment->guest_payment }}</td>
                            </tr>
                            <tr>
                                <th>Pago pendiente</th>
                                <td>{{ $payment->difference }}</td>
                            </tr>
                        </table>
                    @else
                        <p>No se ha realizado ningún pago.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

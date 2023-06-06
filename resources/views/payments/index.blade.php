@extends('layout')


@section('content')

{{-- <p>Total de costos de servicio: {{ $servicios }}</p>
<p>Precio de la habitación: {{ $precioCuarto->price }}</p>
<p>Total a pagar: {{$totalPagar}}</p> --}}

<form action="{{ route('payments.store') }}" method="POST">
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <p>Sesion{{ session('guest_id') }}</p>

</form>

<div class="container">
    <table class="table table-striped">
        <thead>
            <tr>
                <th class="table-default">Costo de los servicios</th>
                <th class="table-default">Costo de la habitación</th>
                <th class="table-default">Total a pagar</th>
            </tr>
        </thead>
        <tbody>
            <tr class="table-light">
                <td>{{$servicios}}</td>
                <td>{{$precioCuarto->price}}</td>
                <td>{{$totalPagar}}</td>
            </tr>
        </tbody>
    </table>
</div>




@endsection
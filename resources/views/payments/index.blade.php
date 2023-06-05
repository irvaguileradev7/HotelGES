@extends('layout')
{{-- HASTA AQUI SE LLEGO CON EL PROCESO DE RESERVACION --}}
{{-- FALTA AGREGAR EL TOTAL DE LOS SERVICIOS Y DEL CUARTO EN SI --}}

@section('content')
<h1>Total a pagar es: {{ $guest->totalServices }} </h1>

<form action="{{ route('payments.store') }}" method="POST">
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <p>Sesion{{ session('guest_id') }}</p>
</form>



@endsection
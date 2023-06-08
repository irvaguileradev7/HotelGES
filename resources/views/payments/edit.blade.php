@extends('layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <h3>Costos de servicio</h3>
                <p>{{ $servicios }}</p>
            </div>
            <div class="col">
                <h3>Costo de la reservación</h3>
                <p>{{ $precioCuarto }}</p>
            </div>
            <div class="col pb-5">
                <h3>Total a pagar</h3>
                <p id="totalPagar">{{ $totalPagar }}</p>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col pt-4 ps-5 text-end">

            </div>
            <div class="col">
                <form action="{{ route('payments.update', $payment->id) }}" method="POST" onsubmit="return validarPago()">
                    @csrf
                    @method('PUT')
                    <div class="col pb-5">
                        <h3>Pago realizado</h3>
                        <p id="pagoHuesped">{{ $pagoHuesped }}</p>
                    </div>
                    <h6>Ingresar el pago</h6>
                    <div class="col-xs-12 col-sm-12 col-md-12 align-text-start">
                        <input type="number" name="sumaPago" id="sumaPago" min="0" value="0" placeholder="Cantidad a sumar al pago del huésped" onkeyup="calcular()">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            </div>
            <div class="col">
                <h3>Saldo a cobrar:</h3>
                <p id="resultado">{{ $totalPagar - $pagoHuesped }}</p>
            </div>
        </div>
    </div>

    <script>
        function calcular() {
            var pagoHuesped = document.getElementById('pagoHuesped').innerText;
            var totalPagar = document.getElementById('totalPagar').innerText;
            document.getElementById('resultado').innerText = totalPagar - pagoHuesped;
        }

        function validarPago() {
            var sumaPago = parseInt(document.getElementById('sumaPago').value);
            var saldoCobrar = parseInt(document.getElementById('resultado').innerText);

            if (sumaPago > saldoCobrar) {
                alert("La cantidad a sumar no puede ser mayor al saldo a cobrar.");
                return false; // Cancela el envío del formulario
            }

            return true; // Permite el envío del formulario
        }
    </script>
@endsection
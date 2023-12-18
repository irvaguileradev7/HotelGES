@extends('layout')

@section('content')
    <div class="container">
        <div class="row">
            {{-- <div class="col-md-6">
                <h6>Ingresar al pago</h6>
                <form action="{{ route('payments.store') }}" method="POST" onsubmit="return validarPago()">
                    @csrf
                    <div class="col-xs-12 col-sm-12 col-md-12 align-text-start">
                        <input type="number" name="pagoHuesped" id="pagoHuesped" min="0" value={{ $pagoHuesped }}
                            placeholder="Cantidad del pago del huésped" onkeyup="calcular()">

                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            </div> --}}

            <div class="screen-center">
                <div class="card only-form" style="padding : 20px">
                    <div class="row">
                        <div class="col">
                            <strong>Costo de la reservación:</strong>
                        </div>
                        <div class="col">
                            <p>${{ $precioCuarto }}MXN</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <strong>Costos de servicios</strong>
                        </div>
                        <div class="col">
                            <p>${{ $servicios }}MXN</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <strong>Total a pagar</strong>
                        </div>
                        <div class="col">
                            {{-- Revisar, no permite poner texto en el. --}}
                            <p id="totalPagar">${{ $totalPagar }}MXN</p>
                        </div>
                    </div>
                    {{-- <h3>Saldo a cobrar:</h3>
                    <p id="resultado">{{ $pagoHuesped }}</p> --}}
                    <div class="row">
                        <div class="col">
                            <strong>Diferencia</strong>
                        </div>
                        <div class="col">
                            <p id="resultado">Calculando...</p>
                        </div>
                    </div>

                    <h6>Ingrese el pago</h6>
                    <form action="{{ route('payments.store') }}" method="POST" onsubmit="return validarPago()">
                        @csrf
                        <div class="col-xs-12 col-sm-12 col-md-12 align-text-start">
                            <input type="number" name="pagoHuesped" id="pagoHuesped" min="0"
                                value={{ $pagoHuesped }} placeholder="Cantidad del pago del huésped" onkeyup="calcular()">

                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        console.log('ok')

        function calcular() {
            var pagoHuesped = parseFloat(document.getElementById('pagoHuesped').value);
            var totalPagar = parseFloat(document.getElementById('totalPagar').innerText.replace('$', '').replace('MXN',
                ''));

            var resultadoElement = document.getElementById('resultado');

            resultadoElement.innerText = 'Calculando...';

            setTimeout(function() {
                var diferencia = totalPagar - pagoHuesped;
                resultadoElement.innerText = '$' + diferencia.toFixed(2) + ' MXN';
            }, 500);

            var diferencia = totalPagar - pagoHuesped;

            document.getElementById('resultado').innerText = '$' + diferencia.toFixed(2) + ' MXN';
        }

        function validarPago() {
            var sumaPago = parseInt(document.getElementById('pagoHuesped').value);
            var saldoCobrar = parseInt(document.getElementById('totalPagar').innerText);

            if (sumaPago > saldoCobrar) {
                alert("La cantidad a sumar no puede ser mayor al saldo a cobrar.");
                return false;
            }

            return true;
        }
    </script>
@endsection

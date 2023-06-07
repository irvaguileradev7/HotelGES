@extends('layout')


@section('content')

{{-- <p>Total de costos de servicio: {{ $servicios }}</p>
<p>Precio de la habitación: {{ $precioCuarto->price }}</p>
<p>Total a pagar: {{$totalPagar}}</p> --}}

{{-- <form action="{{ route('payments.store') }}" method="POST">
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <p>Sesion{{ session('guest_id') }}</p>

</form> --}}

{{-- <div class="container">
    <table class="table table-striped">
        <thead>
            <tr>
                <th class="table-default">Costo de los servicios</th>
                <th class="table-default">Costo de la habitación</th>
                <th class="table-defaul">Pago del huésped</th>
                <th class="table-default">Total a pagar</th>
            </tr>
        </thead>
        <tbody>
            <tr class="table-light">
                <td>{{$servicios}}</td>
                <td>{{$precioCuarto->price}}</td>
                <td>{{$pagoHuesped}}</td>
                <td>{{$totalPagar}}</td>
            </tr>
        </tbody>
    </table>
</div>
 --}}

 <div class="container">
    <div class="row">
      <div class="col">
        <h3>Costos de servicio</h3>
        <p>{{ $servicios}}</p>
      </div>
      <div class="col">
        <h3>Precio de la habitación</h3>
        <p>{{ $precioCuarto->price }}</p>
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
            <h6>Ingresar al pago</h6>
        </div>
        <div class="col">
            <form action="{{ route('payments.store')}}" method="get">
                <div class="col-xs-12 col-sm-12 col-md-12 align-text-start">
                    <input type="number" name="pagoHuesped" id="pagoHuesped"
                        min="0" value={{ $pagoHuesped }} placeholder="Cantidad del pago del huésped"
                        onkeyup="calcular()">

                        <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
        <div class="col">
            <h3>Saldo a cobrar:</h3>
            <p id="resultado">{{ $pagoHuesped }}</p>
        </div>
    </div>
    
</div>


<script>
console.log('ok')


function calcular(){
    var pagoHuesped= document.getElementById('pagoHuesped').value
    var totalPagar = document.getElementById('totalPagar').innerText

    document.getElementById('resultado').innerText=totalPagar-pagoHuesped


}
</script>



@endsection
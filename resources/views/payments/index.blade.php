@extends('layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="container">
                    <div class="pull-left">
                        <h1>Pagos</h1>
                    </div>

                    <div class="pull-right">
                        <a class="btn btn-success" href="{{ route('asignrooms.index') }}"> Nuevo pago</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <form action="{{ route('payments.index') }}" method="GET">
                <div class="input-group">
                    <input type="text" class="form-control" name="guest_id" placeholder="Buscar por ID...">
                    
                    <span class="input-group-btn mt-2">
                        <button class="btn btn-primary mt-1" type="submit">Buscar</button>
                    </span>
                </div>
            </form>
        </div>
        
        
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        <div class="container">
            <table class="table table-bordered">
                <tr>
                    <th>ID</th>
                    <th>Huésped</th>
                    <th>Pago total</th>
                    <th>Pago del huésped</th>
                    <th>Pendiente</th>
                    <th width="280px">Acciones</th>
                </tr>

                @foreach ($payments as $payment)
                    <tr class="white-cell">
                        <td>{{ $payment->guest->id }} </td>
                        <td>{{ $payment->guest->name }} {{ $payment->guest->last_name }}</td>
                        <td>{{ $payment->total_payment }}</td>
                        <td>{{ $payment->guest_payment }}</td>
                        <td>{{ $payment->difference }}</td>
                        <td>
                            <form id="delete-form-{{ $payment->id }}" action="{{ route('payments.destroy', $payment->id) }}"
                                method="POST">
                                @csrf
                                @method('DELETE')
                                <table>
                                    <tr>
                                        
                                        <td class="non-cell">
                                            <a class="btn btn-primary"
                                                href="{{ route('payments.edit', $payment->id) }}">Modificar</a>
                                        </td>
                  
                                    </tr>
                                </table>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
    <script>
        function confirmDelete(event, paymentId) {
            event.preventDefault();
            if (confirm('¿Está seguro que desea eliminar este pago?')) {
                document.getElementById('delete-form-' + paymentId).submit();
            }
        }
    </script>
@endsection
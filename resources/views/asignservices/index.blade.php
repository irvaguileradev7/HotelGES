@extends('layout')

@section('content')
    <h1>Elegir servicios</h1>
    <form action="{{ route('asignservices.store') }}" method="POST">
        <div class="container">
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <p>Sesion{{ session('guest_id') }}</p>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>

            <form action="{{ route('asignservices.store') }}" method="POST" autocomplete="off">
                <input type="hidden" name="guest_id" value="{{ session('guest_id') }}">
                <div class="list-group">
                    @foreach ($services as $service)
                        <label class="list-group-item">
                            <ul>
                                <li>{{ $service->type }}</li>
                                <li>{{ $service->price }}</li>
                                <li>{{ $service->details }}</li>
                                <li>Cantidad:
                                    <div class="container">
                                        <input type="number" name="quantity" class="form-control" min=0
                                            placeholder="Cantidad..." value="0">
                                    </div>
                                </li>

                            </ul>

                        </label>
                    @endforeach

                </div>
            </form>
        </div>
    @endsection

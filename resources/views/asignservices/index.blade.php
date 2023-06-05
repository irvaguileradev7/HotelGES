@extends('layout')

@section('content')
    <h1>Elegir servicios</h1>
    <form action="{{ route('asignservices.store') }}" method="POST">
        <div class="container">
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <p>Sesion{{ session('guest_id') }}</p>
                
            </div>

            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
            <form action="{{ route('asignservices.store') }}" method="POST" autocomplete="off">
                @csrf
                <div class="list-group">
                    @foreach ($services as $service)
                        <label class="list-group-item">
                            <ul>
                                <input type="hidden" name="service_id[]" value="{{ $service->id }}">
                                <input type="hidden" name="guest_id" value="{{ session('guest_id')}}">
                                <li>{{ $service->type }}</li>
                                <li>{{ $service->price }}</li>
                                <li>{{ $service->details }}</li>
                                <li>Cantidad:
                                    <div class="container">
                                        <input type="number" name="quantity[]" class="form-control" min=0
                                            placeholder="Cantidad..." value="0">
                                    </div>
                                </li>

                            </ul>

                        </label>

                    @endforeach

                </div>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </form>
        </div>
    @endsection

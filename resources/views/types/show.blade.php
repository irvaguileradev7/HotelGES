@extends('layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Ver tipo de habitacion</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('types.index') }}">Regresar</a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Tipo de habitacion:</strong>
                    {{ $type->room_type }}
                </div>
            </div>

        </div>
    </div>
@endsection

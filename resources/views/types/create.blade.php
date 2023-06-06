@extends('layout')

@section('content')
<div class="container">
    <div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Anadir tipos de dato</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('types.index') }}"> Regresar</a>
        </div>
    </div>
</div>

<br>
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Error</strong>
        <br>
        Hubo un problema en los datos ingresados<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('types.store') }}" method="POST">
    @csrf
  
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nombre de la habitacion:</strong>
                <input type="text" name="room_type" class="form-control" placeholder="Tipo de habitacion...">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
    </div>
   
</form>
</div>

@endsection
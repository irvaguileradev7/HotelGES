@extends('layout')

@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{ asset('css/style_catalogue.css') }}">
        <title>Document</title>
    </head>

    <body>
            <div class="container">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Pago:</strong>
                        <input type="number" name="pay" class="form-control" placeholder="Pago...">
                    </div>
                </div>
            </div>

			<div class="row">

                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </div>

    </body>

    </html>
@endsection

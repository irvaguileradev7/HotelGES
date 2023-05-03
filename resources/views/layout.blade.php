<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
                <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                    <a href="/"
                        class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                        <span class="fs-5 d-none d-sm-inline">HotelGes</span>
                    </a>
                    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start"
                        id="menu">
                        <li>
                            <a href="{{ route('rooms.index') }}" class="nav-link px-0 align-middle">
                                <i class="fs-4 bi-speedometer2"></i> <span
                                    class="ms-1 d-none d-sm-inline">Habitaciones</span> </a>

                        </li>
                        <li>
                            <a href="{{ route('types.index') }}" class="nav-link px-0 align-middle">
                                <i class="fs-4 bi-speedometer2"></i> <span class="ms-1 d-none d-sm-inline">Crear
                                    tipo</span> </a>

                        </li>
                        <li>
                            <a href="{{ route('floors.index') }}" class="nav-link px-0 align-middle">
                                <i class="fs-4 bi-speedometer2"></i> <span class="ms-1 d-none d-sm-inline">Crear
                                     piso</span> </a>

                        </li>

                        <li>
                            <a href="{{ route('guests.index') }}" class="nav-link px-0 align-middle">
                                <i class="fs-4 bi-speedometer2"></i> <span class="ms-1 d-none d-sm-inline">Agregar huesped</span> </a>

                        </li>

                    </ul>
                    <hr>

                </div>
            </div>
            <!--Contenido de las vistas dentro del layout-->
            <div class="col py-3">
                @yield('content')
            </div>
        </div>
    </div>

    <script src="js/bootstrap.min.js"></script>
</body>

</html>

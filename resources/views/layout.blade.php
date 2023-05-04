<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/style.css">
</head>

<body>
    {{--
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
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <div class="container-fluid">
                      <a class="navbar-brand" href="#">Navbar</a>
                      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                      </button>
                      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                        <div class="navbar-nav">
                          <a class="nav-link active" aria-current="page" href="#">Home</a>
                          <a class="nav-link" href="#">Features</a>
                          <a class="nav-link" href="#">Pricing</a>
                          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                        </div>
                      </div>
                    </div>
                  </nav>
                @yield('content')
            </div>
        </div>
    </div>
--}}
    <div class="side-navbar active-nav d-flex justify-content-between flex-wrap flex-column" id="sidebar">
        <ul class="nav flex-column text-white w-100">
          <a href="/"
                        class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                        <span class="fs-5 d-none d-sm-inline">HotelGes</span>
                    </a>
            <li>
              <hr>
                <a href="{{ route('rooms.index') }}" class="nav-link px-0 align-middle">
                    <i class="fs-4 bi-speedometer2"></i> <span class="ms-1 d-none d-sm-inline">Habitaciones</span> </a>

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
                    <i class="fs-4 bi-speedometer2"></i> <span class="ms-1 d-none d-sm-inline">Agregar huesped</span>
                </a>

            </li>

            <span href="#" class="nav-link h4 w-100 mb-5">
                <a href=""><i class="bx bxl-instagram-alt text-white"></i></a>
                <a href=""><i class="bx bxl-twitter px-2 text-white"></i></a>
                <a href=""><i class="bx bxl-facebook text-white"></i></a>
            </span>
    </div>

    <!-- Main Wrapper -->
    <div class="p-1 my-container active-cont">
        <!-- Top Nav -->
        <nav class="navbar top-navbar navbar-light bg-light px-5">
            <a class="btn border-0" id="menu-btn"><i class="bx bx-menu"></i></a>
        </nav>
        <!--End Top Nav -->
        @yield('content')
    </div>


    <!-- custom js -->
    <script>
        var menu_btn = document.querySelector("#menu-btn");
        var sidebar = document.querySelector("#sidebar");
        var container = document.querySelector(".my-container");
        menu_btn.addEventListener("click", () => {
            sidebar.classList.toggle("active-nav");
            container.classList.toggle("active-cont");
        });
    </script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>

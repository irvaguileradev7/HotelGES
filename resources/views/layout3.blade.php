<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/style_welcome.css">
</head>

<body>

    <div class="side-navbar active-nav d-flex justify-content-between flex-wrap flex-column" id="sidebar">
        <ul class="nav flex-column text-white w-100">
            <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                <span class="fs-5 d-none d-sm-inline">HotelGes</span>
            </a>
            <li>
                <hr>
                <p>Administracion </p>
            </li>
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
                    <i class="fs-4 bi-speedometer2"></i> <span class="ms-1 d-none d-sm-inline">Huespedes</span>
                </a>

            </li>
            <li>
                <a href="{{ route('users.index') }}" class="nav-link px-0 align-middle">
                    <i class="fs-4 bi-speedometer2"></i> <span class="ms-1 d-none d-sm-inline">Usuarios</span>
                </a>

            </li>

    </div>

    <div class="p-1 my-container active-cont">

        <nav class="navbar top-navbar navbar-light bg-light px-5">
            <a class="btn border-0" id="menu-btn"><i class="bi bi-list"></i></a>
            <div class="container">
                <div class="navbar-nav">
                    <span class="nav-item nav-link disabled">{{ Auth::user()->name }}</span>
                </div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-primary "
                        onclick="event.preventDefault(); this.closest('form').submit();">
                        Cerrar sesión
                    </button>
                </form>
            </div>



        </nav>
        @yield('content')
    </div>


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

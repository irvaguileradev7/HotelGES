<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HotelGes</title>
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="/css/style_welcome.css">
</head>

<body>
    <div class="sidebar">
        <div class="top">
            <div class="logo">
                <i class='bx bx-buildings'></i>
                <span class="bold">HotelGes</span>
            </div>
            <i class='bx bx-menu' id='btn'></i>

        </div>
        <div class="user bold">
            <p>{{ Auth::user()->name }}</p>
        </div>
        <ul>
            <li>
                <a href="/"><i class='bx bxs-dashboard'></i>
                    <span class="nav-item" id="nav">Inicio</span>
                </a>
                <span class="tooltip">Inicio</span>
            </li>
            <li>
                <a href="{{ route('payments.index') }}"><i class='bx bx-wallet'></i></i>
                    <span class="nav-item">Pagos</span>
                </a>
                <span class="tooltip">Pagos</span>
            </li>
            <li>
                <a href="{{ route('guests.index') }}"><i class='bx bxs-group'></i>
                    <span class="nav-item">Huespedes</span>
                </a>
                <span class="tooltip">Huespedes</span>
            </li>
            <li>
                <a href="{{ route('reservationview.index') }}"><i class='bx bxs-contact'></i>
                    <span class="nav-item">Reservaciones</span>
                </a>
                <span class="tooltip">Reservaciones</span>
            </li>
            <li>
                <a href="{{ route('rooms.index') }}"><i class='bx bxs-hotel'></i>
                    <span class="nav-item">Habitaciones</span>
                </a>
                <span class="tooltip">Habitaciones</span>
            </li>
            <li>
                <a href="{{ route('services.index') }}"><i class='bx bxs-bowl-hot'></i>
                    <span class="nav-item">Servicios</span>
                </a>
                <span class="tooltip">Servicios</span>
            </li>

            <li>
                <a href="{{ route('users.index') }}"><i class='bx bxs-user'></i>
                    <span class="nav-item">Usuarios</span>
                </a>
                <span class="tooltip">Usuarios</span>
            </li>

            <li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn-exit nav-item"
                        onclick="event.preventDefault(); this.closest('form').submit();"><i class='bx bxs-exit' ></i>
                        Salir
                    </button>
                </form>
            </li>

        </ul>
    </div>
    <div class="main-content">
        @yield('content')
    </div>

    <script src="/js/scripts.js"></script>
    <script src="/js/bootstrap.min.js"></script>
</body>

</html>

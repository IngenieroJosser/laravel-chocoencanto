<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ url('../../../../css/components/admin/dashboard.css') }}">
    <link rel="stylesheet" href="{{ url('../../../../css/components/admin/showApi.css') }}">
    <title>Admin - ChocóEncanto</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
        {{-- resources/views/admin/header_dashboard.blade.php --}}
    <header class="header--dashboard">
        <a href="{{ url('/') }}"><h4>@ChocóEncanto</h4></a>

        <div class="log-sign" style="padding: 1em 0;  margin-left: -15em; display: flex; display: flex; gap: 1em;">
            @if (Auth::check())
                <span style="font-family: 'text'; color: #000;">Bienvenido,<strong>  Admin {{ Auth::user()->user }}</strong>!</span>
                <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                    @csrf
                    <button style="background-color: var(--color-four); padding: .5em 1em; border-radius: 11px; color: var(--text-two); font-family: 'text';" type="submit" class="btn1">Cerrar sesión</button>
                </form>
            @else
                <a style="margin-left: 2em;" href="{{ route('logout') }}" class="btn1">Iniciar sesión</a>
                <!-- <a href="{{ url('/register') }}" class="btn2">Únete</a> -->
            @endif
        </div>
    </header>

    
    {{-- resources/views/admin/data_analytics.blade.php --}}
    <section class="container--admin">
        <section class="data-analytics">
        <a style="background-color: var(--color-four); padding: .9em 1.3em; color: #FFF; text-decoration: none; border-radius: 7px;" href="{{ route('admin.users.index') }}" class="btn btn-primary">CRUD Usuarios</a>
            {{-- <img class="data" src="{{ asset('assets/img/analytics.png') }}" alt="" /> --}}

            <div class="banner--admin">
                <div class="content--admin">
                    <img src="{{ asset('icons/cart.png') }}" alt="icono de compra">
                    <p>Venta de paquetes</p>
                    <div class="content">
                        <p class="count--content">235,867</p>
                        <h6>+3409</h6>
                    </div>
                </div>

                <div class="content--admin">
                    <img src="{{ asset('icons/dollar.png') }}" alt="peso colombiano">
                    <p>Ingresos</p>
                    <div class="content">
                        <p class="count--content">$235,867,090</p>
                        <h6>-$2,201</h6>
                    </div>
                </div>

                <div class="content--admin">
                    <img src="{{ asset('icons/group.png') }}" alt="usuario">
                    <p>Viajeros turistas</p>
                    <div class="content">
                        <p class="count--content">16,703</p>
                        <h6>+3,392</h6>
                    </div>
                </div>

                <div class="banner-a-2">
                    <img src="{{ asset('icons/rating.png') }}" alt="conversion">
                    <p>Rating turisticos</p>
                    <div class="content">
                        <p class="count--content">12,8%</p>
                        <h6>-1.22</h6>
                    </div>
                </div>
            </div>

            
        </section>

        <div class="data-analytics-grafic">
            <span>Categorias populares</span>
            <svg xmlns="http://www.w3.org/2000/svg" fill="#07190f" height="240" viewBox="0 -960 960 960" width="240">
                <path d="M441-82Q287-97 184-211T81-480q0-155 103-269t257-129v120q-104 14-172 93t-68 185q0 106 68 185t172 93v120Zm80 0v-120q94-12 159-78t79-160h120q-14 143-114.5 243.5T521-82Zm238-438q-14-94-79-160t-159-78v-120q143 14 243.5 114.5T879-520H759Z"/>
            </svg>
            <p>%</p>
        </div>
    </section>

    

</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ url('../../../../css/components/admin/dashboard.css') }}">
    <title>Admin - ChocóEncanto</title>
</head>
<body>
        {{-- resources/views/admin/header_dashboard.blade.php --}}
    <header class="header--dashboard">
        <a href=""><h4>@ChocóEncanto</h4></a>

        <div class="profile">
            <div class="profesion--user">
                <span>Josser Cordoba</span>
                <p>System Engineer</p>
            </div>
            <img src="{{ asset('assets/img/photo--user.png') }}" alt="foto de perfil de usuario">
            {{-- SVG icon code can be included here if necessary --}}
        </div>
    </header>

    <aside>
        <a href=""><img src="{{ asset('assets/icons/loupe.png') }}" alt="buscar"></a>
        <a href=""><img src="{{ asset('assets/icons/home.png') }}" alt="inicio"></a>
        <a href=""><img src="{{ asset('assets/icons/finish.png') }}" alt="bandera"></a>
        <a href=""><img src="{{ asset('assets/icons/data-analytics.png') }}" alt="análisis de información"></a>
        <a href=""><img src="{{ asset('assets/icons/user.png') }}" alt="usuario"></a>
        <a href=""><img src="{{ asset('assets/icons/settings.png') }}" alt="configuración"></a>
    </aside>

    {{-- resources/views/admin/data_analytics.blade.php --}}
    <section class="container--admin">
        <section class="data-analytics">
            {{-- <img class="data" src="{{ asset('assets/img/analytics.png') }}" alt="" /> --}}

            <div class="banner--admin">
                <div class="content--admin">
                    <img src="{{ asset('assets/icons/cart.png') }}" alt="icono de compra">
                    <p>Venta de paquetes</p>
                    <div class="content">
                        <p class="count--content">235,867</p>
                        <h6>+3409</h6>
                    </div>
                </div>

                <div class="content--admin">
                    <img src="{{ asset('assets/icons/dollar.png') }}" alt="peso colombiano">
                    <p>Ingresos</p>
                    <div class="content">
                        <p class="count--content">$235,867,090</p>
                        <h6>-$2,201</h6>
                    </div>
                </div>

                <div class="content--admin">
                    <img src="{{ asset('assets/icons/group.png') }}" alt="usuario">
                    <p>Viajeros turistas</p>
                    <div class="content">
                        <p class="count--content">16,703</p>
                        <h6>+3,392</h6>
                    </div>
                </div>

                <div class="banner-a-2">
                    <img src="{{ asset('assets/icons/rating.png') }}" alt="conversion">
                    <p>Rating turisticos</p>
                    <div class="content">
                        <p class="count--content">12,8%</p>
                        <h6>-1.22</h6>
                    </div>
                </div>
            </div>

            <div class="banner-content">
                <p>Rendimiento de ventas</p>
                <div class="banner-admin">
                    <div class="content--admoin">
                        <p>🔵 Paquetes</p>
                        <p>🟡 Habitaciones</p>
                        <p>🟢 Personas</p>
                        <p>🟤 Número de viajes</p>
                    </div>
                </div>
                <img src="{{ asset('assets/img/analytics.png') }}" alt="imagen grafica">
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

    {{-- resources/views/admin/recent_customers.blade.php --}}
    @php
        $customers = [
            [
                'name' => 'Jerry Mattedi',
                'orderDate' => '13 May, 2021:10:10 AM',
                'phoneNumber' => '251-461-5362',
                'location' => 'New York',
                'registered' => 'Yes',
                'details' => 'Qationa',
            ],
            [
                'name' => 'Eliana Vasilov',
                'orderDate' => '18 May, 2021:3:22 PM',
                'phoneNumber' => '171-534-1262',
                'location' => 'Ontario',
                'registered' => 'No',
                'details' => 'Qations',
            ],
            [
                'name' => 'Alvis Den',
                'orderDate' => '17 May, 2021:2:15 PM',
                'phoneNumber' => '974-661-5110',
                'location' => 'Milan',
                'details' => 'Details',
            ],
            [
                'name' => 'Lisa Shipy',
                'orderDate' => '23 Apr, 2021:15PM',
                'phoneNumber' => '541-661-3042',
                'location' => '1 3 4 5 Octions',
                'details' => 'San Francisco',
                'registered' => 'Yes',
            ],
            [
                'name' => 'Josser Cordoba',
                'orderDate' => '23 Apr, 2023:15PM',
                'phoneNumber' => '323-284-2193',
                'location' => 'Quibdó - Chocó - Colombia',
                'details' => 'Poblado - Flores de Buenaños',
                'registered' => 'Yes',
            ],
        ];
    @endphp

    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Fecha de Pedido</th>
                <th>Número de Teléfono</th>
                <th>Ubicación</th>
                <th>Inscrito</th>
                <th>Detalles</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($customers as $customer)
                <tr>
                    <td>{{ $customer['name'] }}</td>
                    <td>{{ $customer['orderDate'] }}</td>
                    <td>{{ $customer['phoneNumber'] }}</td>
                    <td>{{ $customer['location'] }}</td>
                    <td>{{ $customer['registered'] ?? '-' }}</td>
                    <td>{{ $customer['details'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>
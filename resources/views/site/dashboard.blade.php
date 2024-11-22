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
                <span style="font-family: 'text';">Bienvenido,<strong>  Admin {{ Auth::user()->user }}</strong>!</span>
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
                
                <!-- Aquí colocamos el canvas para el gráfico -->
                <canvas id="salesChart" width="400" height="200"></canvas>
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

    <section class="container--admin">
        <section class="data-analytics">

            <h2>API Regiones de Colombia</h2>
            <h6>Ruta de API: <a target="_blank" rel="noopener noreferrer" href="https://api-colombia.com/api/v1/Region">https://api-colombia.com/api/v1/Region</a></h6>

            <!-- Mostrar las regiones en un grid -->
            <div class="regions-grid">
                @foreach($regions as $region)
                    <div class="region-card">
                        <h3>{{ $region['name'] }}</h3>
                        <p>{{ $region['description'] }}</p>
                        <div class="description">
                            <strong>Departamentos:</strong> 
                            @if($region['departments'])
                                {{ implode(', ', $region['departments']) }}
                            @else
                                No disponible
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const ctx = document.getElementById('salesChart').getContext('2d');
            const salesChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Enero', 'Febrero', 'Marzo'],
                    datasets: [{
                        label: 'Reservas',
                        data: [10, 15, 20],
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });
    </script>

    <!-- Mostrar las atracciones turísticas -->
    <section class="container--admin">
    <section class="data-analytics">
        <h2>API Atracciones Turísticas</h2>
        <h6>Ruta de API: <a target="_blank" rel="noopener noreferrer" href="https://api-colombia.com/api/v1/TouristicAttraction">https://api-colombia.com/api/v1/TouristicAttraction</a></h6>

        <!-- Mostrar las atracciones en un grid -->
        <div class="attractions-grid">
            @foreach($attractions as $attraction)
                <div class="attraction-card">
                    <h3>{{ $attraction['name'] }}</h3>
                    <p>{{ $attraction['description'] }}</p>
                    <div class="details">
                        <strong>Latitud: {{ $attraction['latitude'] }}</strong>
                        <strong>Longitud: {{ $attraction['longitude'] }}</strong>
                        @if(is_array($attraction['images']) && !empty($attraction['images']))
                            <img src="{{ $attraction['images'][0] }}" alt="Imagen de atracción" />
                        @else
                            <p>No hay imágenes disponibles.</p>
                        @endif
                    </div>
                    <div class="rating">
                        <strong>Calificación:</strong> {{ $attraction['rating'] ?? 'No disponible' }}
                    </div>
                </div>
            @endforeach
        </div>
    </section>
</section>


</body>
</html>
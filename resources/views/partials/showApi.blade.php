<link rel="stylesheet" href="{{ url('../../../../css/components/admin/showApi.css') }}">

<div class="banner-content">
    <p>Regiones de Colombia</p>

    <ul>
        <!-- Iteramos las regiones para mostrarlas en una lista -->
        @forelse ($regions as $region)
            <li>{{ $region['name'] }}</li>
        @empty
            <li>No se encontraron regiones disponibles.</li>
        @endforelse
    </ul>

    <!-- Agregamos un canvas para mostrar el gráfico -->
    <canvas id="regionsChart" width="400" height="200"></canvas>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Validamos que el canvas exista en el DOM
        const canvasElement = document.getElementById('regionsChart');
        if (!canvasElement) {
            console.error('El elemento con ID "regionsChart" no existe en el DOM.');
            return;
        }

        const ctx = canvasElement.getContext('2d');

        // Pasamos las regiones desde Blade a JavaScript
        const regions = @json($regions); // Convierte los datos a JSON válido

        // Configuramos el gráfico con los datos obtenidos
        const regionsChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: regions.map(region => region.name), // Nombres de las regiones
                datasets: [{
                    label: 'Cantidad de tours', // Cambia según tus datos
                    data: regions.map(region => region.someField || 0), // Reemplaza `someField` por un campo numérico válido
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

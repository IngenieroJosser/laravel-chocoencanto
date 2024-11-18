// Datos de las reservas por destino
var reservasPorDestino = @json($reservasPorDestino);

// Extraemos los destinos y los totales
var destinos = reservasPorDestino.map(function(item) {
    return item.destino;
});
var totals = reservasPorDestino.map(function(item) {
    return item.total;
});

// Crear el gráfico
var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar', // Tipo de gráfico (puedes cambiarlo a 'line', 'pie', etc.)
    data: {
        labels: destinos, // Etiquetas del gráfico
        datasets: [{
            label: 'Reservas por Destino',
            data: totals, // Datos para cada destino
            backgroundColor: 'rgba(54, 162, 235, 0.2)', // Color de las barras
            borderColor: 'rgba(54, 162, 235, 1)', // Color del borde
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});

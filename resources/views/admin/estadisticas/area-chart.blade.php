<!DOCTYPE html>
<html>
<head>
    <title>Gráfico de Área</title>
    <script src="{{ asset('js/Chart.min.js') }}"></script>
</head>
<body>
    <canvas id="areaChart"></canvas>

    <script>
        var ctx = document.getElementById('areaChart').getContext('2d');
        var labels = {!! json_encode($labels) !!};
        var data = {!! json_encode($data) !!};

        var areaChart = new Chart(ctx, {
            type: 'line', // Puedes cambiar a 'area' si prefieres un gráfico de área
            data: {
                labels: labels,
                datasets: [{
                    label: 'Datos de ejemplo',
                    data: data,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
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
    </script>
</body>
</html>

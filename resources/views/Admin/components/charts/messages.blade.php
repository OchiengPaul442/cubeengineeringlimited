<canvas id="message-chart"></canvas>

@section('scripts')
    <script>
        var jan = JSON.parse({!! json_encode($jan) !!});
        var feb = JSON.parse({!! json_encode($feb) !!});
        var mar = JSON.parse({!! json_encode($mar) !!});
        var apr = JSON.parse({!! json_encode($apr) !!});
        var may = JSON.parse({!! json_encode($may) !!});
        var jun = JSON.parse({!! json_encode($jun) !!});
        var jul = JSON.parse({!! json_encode($jul) !!});
        var aug = JSON.parse({!! json_encode($aug) !!});
        var sep = JSON.parse({!! json_encode($sep) !!});
        var oct = JSON.parse({!! json_encode($oct) !!});
        var nov = JSON.parse({!! json_encode($nov) !!});
        var dec = JSON.parse({!! json_encode($dec) !!});
    </script>
    <script>
        const labels = [
            'January',
            'February',
            'March',
            'April',
            'May',
            'June',
            'July',
            'August',
            'September',
            'October',
            'November',
            'December'
        ];

        const data = {
            labels: labels,
            datasets: [{
                label: 'Client Messages',
                backgroundColor: 'rgb(255, 99, 132)',
                borderColor: 'rgb(255, 99, 132)',
                data: [jan, feb, mar, apr, may, jun, jul, aug, sep, oct, nov, dec],
            }]
        };

        const config1 = {
            type: 'line',
            data: data,
            options: {
                indexAxis: 'y',
                scales: {
                    x: {
                        beginAtZero: true
                    }
                }
            }
        };
    </script>
    <script>
        const messages = new Chart(
            document.getElementById('message-chart'),
            config1
        );
    </script>
@endsection

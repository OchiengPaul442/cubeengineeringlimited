<canvas id="badCanvas1"></canvas>

@section('scripts2')
    <script>
        var completed = JSON.parse({!! json_encode($completed) !!});
        var running = JSON.parse({!! json_encode($running) !!});
        var upcoming = JSON.parse({!! json_encode($upcoming) !!});
    </script>
    <script>
        const ctx = document.getElementById('badCanvas1').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Completed', 'Running', 'Upcoming'],
                datasets: [{
                    label: 'Projects Status',
                    data: [completed, running, upcoming, ],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
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
@endsection

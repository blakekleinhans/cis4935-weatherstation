<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
<canvas id="data-chart"></canvas>
<script>
    var ctx = document.getElementById('data-chart').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
            datasets: [{
                label: "%",
                borderColor: 'rgb(66, 179, 244)',
                data: [0, 10, 5, 2, 20, 30, 45],
                lineTension: 0,
            }]
        },
        options: {},
    });
</script>
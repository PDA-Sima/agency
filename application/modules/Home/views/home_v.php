<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>
</head>
<body>


<table allign="center">

    <tr>
        <td><canvas id="myChart4" width="450" height="450"></canvas>
            <script>
                var ctx = document.getElementById("myChart4");
                var myChart4 = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: [ <?php echo $graf1nazov ?> ],
                        datasets: [{
                            label: 'Počet kurzov na kategóriu',
                            data: [<?php echo $graf1hodnoty ?>],
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)'
                            ],
                            maintainAspectRatio: false,
                            responsive: true,
                            borderColor: [
                                'rgba(255,99,132,1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)'
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero:true
                                }
                            }]
                        }
                    }
                });
            </script></td>
    </tr>
</table>

</body>
</html>

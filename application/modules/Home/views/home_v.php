<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>
</head>
<body>


<table align="center">

    <tr>
        <td><canvas id="myChart1" width="370" height="370"></canvas>
            <script>
                var ctx = document.getElementById("myChart1");
                var myChart1 = new Chart(ctx, {
                    type: 'doughnut',
                    data: {
                        labels: [ <?php echo $graf1nazov ?> ],
                        datasets: [{
                            data: [<?php echo $graf1hodnoty ?>],
                            backgroundColor: [
                                'rgba(229, 76, 76, 0.73)',
                                'rgba(229, 229, 76, 0.73)',
                                'rgba(153, 229, 76, 0.73)',
                                'rgba(76, 229, 229, 0.73)',
                                'rgba(76, 153, 229, 0.73)'
                            ],
                        }]
                    },
                    options: {
                        title: {
                            display: true,
                            text: 'Počet kurzov na jednotlivé kategórie'
                        }
                    }
                });
            </script>
        </td>

        <td width="100"></td>

        <td><canvas id="myChart2" width="600" height="450"></canvas>
            <script>
                var ctx = document.getElementById("myChart2");
                var myChart2 = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: [ <?php echo $graf2nazov ?> ],
                        datasets: [{
                            label: 'Prehľad počtu kurzov jednotlivých lektorov',
                            data: [<?php echo $graf2hodnoty ?>],
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

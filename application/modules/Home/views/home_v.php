<div class="row">
<div class="col-sm-5">
    <table align="center">
        <tr>
            <td><canvas id="myChart1" height="400" width="400"></canvas>
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
        </tr>
    </table>
</div>

<div class="col-sm-7">
        <table align="center">
        <tr>
            <td>
            <canvas id="myChart2" height="400" width="700"></canvas>
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
            </script>
        </td>
        </tr>
        </table>
    </div>
</div>
<br><br><br>

<div class="row">
    <div class="col-md-12">
    <table align="center">
    <tr>
        <td><canvas id="myChart3" width="800" height="400"></canvas>
            <script>
                var ctx = document.getElementById("myChart3");
                var myChart3 = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: [ <?php echo $graf3nazov ?> ],
                        datasets: [{
                            label: 'Počet žiakov v daný dátum',
                            data: [<?php echo $graf3hodnoty ?>],
                            backgroundColor: [
                                'rgba(229, 76, 76, 0.73)',
                            ],
                        }]
                    },
                    options: {
                        title: {
                            display: true,
                            text: 'Dochádzka'
                        }
                    }
                });
            </script>
        </td>
    </tr>
    </table>
    </div>
</div>


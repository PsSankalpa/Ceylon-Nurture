<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="charts" style="width: 40%;">
        <canvas id="myChart"></canvas>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


    <!--chart1-->
    <!--chartbiuld-->
    <script>
        const chartdata = <?php echo json_encode($chartdata); ?>;
        const data = {
            labels: ['Sellers', 'Doctors', 'Common Users'],
            datasets: [{
                label: '# User Details',
                data: chartdata,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)', /*red*/
                    'rgba(54, 162, 235, 0.2)', /*blue*/
                    'rgba(255, 206, 86, 0.2)', /*yellow*/
                    /*'rgba(75, 192, 192, 0.2)', green*/
                    /*'rgba(153, 102, 255, 0.2)', purple*/
                    /*'rgba(255, 159, 64, 0.2)' orange*/
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                ],
                borderWidth: 1
            }]
        }; /////

        /*configure the block */
        const config = {
            type: 'bar',
            data: data,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                },
                plugins: {
                    legend: {
                        display: true,
                    }
                }
            }
        };

        /*render the chart */
        const myChart = new Chart(
            document.getElementById('myChart'),
            config
        );
    </script>

    <!--chart2-->
    <div class="charts" style="width: 40%;float: right;">
        <canvas id="myChart2"></canvas>
    </div>

    <!--chartbiuld-->
    <script>
        const pcommissiondata = <?php echo json_encode($pcommissiondata); ?>;
        //below data2 called by the config2
        const data2 = {
            labels: ['December', 'January', 'February', 'March'],
            datasets: [{
                label: '# Payment Details',
                data: pcommissiondata,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)', /*red*/
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                ],
                borderWidth: 1
            }]
        }; /////

        /*configure the block */
        const config2 = {
            type: 'line',
            data: data2,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        };

        /*render the chart */
        const myChart2 = new Chart(
            document.getElementById('myChart2'),
            config2
        );
    </script>

</body>

</html>
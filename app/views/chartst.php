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
        const registerdates = <?php echo json_encode($registerdates); ?>;
        const data = {
            labels: registerdates,
            datasets: [{
                label: 'User Count',
                data: chartdata,
                backgroundColor: [
                    'rgba(153, 102, 255, 0.2)' /*red*/
                ],
                borderColor: [
                    'rgba(153, 102, 255, 1)'
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

    <!--------------------chart2----------------------------------------------->
    <div class="charts" style="width: 40%;float: right;">
        <canvas id="myChart2"></canvas>
    </div>

    <!--chartbiuld-->
    <script>
        const pcommissiondata = <?php echo json_encode($pcommissiondata); ?>;
        const paymentdates = <?php echo json_encode($paymentdates); ?>;
        const donations = <?php echo json_encode($donations); ?>;
        //below data2 called by the config2
        const data2 = {
            labels: paymentdates,
            datasets: [{
                label: 'Products Payment Details',
                data: pcommissiondata,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)', /*red*/
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                ],
                borderWidth: 1
            },{
                label: 'Donation Payment Details',
                data: donations,
                backgroundColor: [
                    'rgba(54, 162, 235, 0.2)', /*blue*/
                ],
                borderColor: [
                    'rgba(54, 162, 235, 1)', /*blue*/
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
<!DOCTYPE html>
<html>

<head>
    <title>
        Admin Dashboard
    </title>
    <link rel="icon" href="<?= ASSETS ?>img/logo.png" type="image/x-icon" />
    <link rel="stylesheet" href="<?= ASSETS ?>css/commonStyle.css">
    <link rel="stylesheet" href="<?= ASSETS ?>css/adminStyle.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

</head>

<body id="body">
    <div class="container">
        <div class="navigation">
            <ul>
                <li>
                    <a href="<?= ROOT ?>home/home">
                        <span class="icon"><img class="logo" src="<?= ASSETS ?>img/logo.png"></span>
                        <span class="title">
                            <h2> Ceylon Nurture </h2>
                        </span>
                    </a>

                </li>
                <a href="#">
                    <li>
                        <a href="<?= ROOT ?>admin">
                            <span class="icon"><i class="fas fa-home"></i></span>
                            <span class="title"> Dashboard </span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= ROOT ?>admin/users">
                            <span class="icon"><i class="fas fa-users"></i></span>
                            <span class="title">Users</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= ROOT ?>admin/feedbacks">
                            <span class="icon"><i class="far fa-comments"></i></span>
                            <span class="title">Feedbacks</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= ROOT ?>admin/channeling">
                            <span class="icon"><i class="fas fa-hospital-user"></i></span>
                            <span class="title">Channeling</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= ROOT ?>admin/products">
                            <span class="icon"><i class="fas fa-shopping-cart"></i></span>
                            <span class="title">Products</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= ROOT ?>admin/payments">
                            <span class="icon"><i class="fas fa-file-invoice-dollar"></i></span>
                            <span class="title">Payments</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= ROOT ?>header/viewArticles">
                            <span class="icon"><i class="far fa-newspaper"></i></span>
                            <span class="title">Articles</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= ROOT ?>forum">
                            <span class="icon"><i class="far fa-comment-alt"></i></span>
                            <span class="title">Forums</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= ROOT ?>admin/reports">
                            <span class="icon"><i class="far fa-chart-bar"></i></span>
                            <span class="title">Reports</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= ROOT ?>logout">
                            <span class="icon"><i class="fas fa-sign-out-alt"></i></span>
                            <span class="title">Sign out</span>
                        </a>
                    </li>
            </ul>

        </div>


        <div class="main">
            <div class="topbar">

                <div class="toggle" onclick="toggleMenu();">
                    <i class="fas fa-bars"></i>
                </div>

                <div class="topbar_side">
                    <div class="notifications">
                        <div><i class="far fa-bell"></i> </div>
                        <div><i class="fas fa-sliders-h"></i></i></div>
                    </div>
                    <div class="profile">
                        <img class="profile_pic" src="<?= ASSETS ?>img/profile_picture1.jpg">
                        <?php if (Auth::logged_in_admin()) : ?>
                            <p> Hi <?= Auth::fname() ?></p>
                        <?php endif; ?>
                    </div>
                </div>

            </div>

            <div class="overview">

                <div class="toggle">
                    <h4>Overview</h4>
                </div>

                <div class="topbar_side heading">
                    <i class="far fa-calendar-alt"> 2021/04/01 - 2021/06/30</i>
                </div>

            </div>


            <div class="cardBox">
                <div class="card">
                    <div>
                        <div class="numbers">
                            <h6>LKR</h6> 10,000
                        </div>
                        <div class="cardName">Total Profit</div>
                    </div>
                    <div class="iconBox">
                        <i class="fas fa-chart-line"></i>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers">
                            <h6>LKR</h6> 5,000
                        </div>
                        <div class="cardName">Total Expenses</div>
                    </div>
                    <div class="iconBox">
                        <i class="fas fa-file-invoice-dollar"></i>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers">
                            <h6>LKR</h6> 1,000
                        </div>
                        <div class="cardName">New Donations</div>
                    </div>
                    <div class="iconBox">
                        <i class="fas fa-hand-holding-usd"></i>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers">10</div>
                        <div class="cardName">New Users</div>
                    </div>
                    <div class="iconBox">
                        <i class="fas fa-users"></i>
                    </div>
                </div>

            </div>

            <!---------------------for chart js------------------------------------------------------------------->
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

            <div class="details">
                <div class="salesReport">
                    <div class="cardHeader">
                        <h3>Payments</h3>
                    </div>
                    
                    <!--------------------chart1--for payment counts--------------------------------->
                    <div class="charts">
                        <canvas id="myChart2"></canvas>
                    </div>
                    <!--chartbiuld-->
                    <script>
                        const pcommissiondata = <?php echo json_encode($pcommissiondata); ?>;
                        const paymentdates = <?php echo json_encode($paymentdates); ?>;
                        const donations = <?php echo json_encode($donations); ?>;
                        const appointments = <?php echo json_encode($appointments); ?>;
                        //below data2 called by the config2
                        const data2 = {
                            labels: paymentdates,
                            datasets: [{
                                label: 'Products Payment Details',
                                data: pcommissiondata,
                                backgroundColor: [
                                    'rgba(255, 99, 132, 0.2)', /*purple*/
                                ],
                                borderColor: [
                                    'rgba(255, 99, 132, 1)', /*purple*/
                                ],
                                borderWidth: 1
                            }, {
                                label: 'Donation Payment Details',
                                data: donations,
                                backgroundColor: [
                                    'rgba(54, 162, 235, 0.2)', /*blue*/
                                ],
                                borderColor: [
                                    'rgba(54, 162, 235, 1)', /*blue*/
                                ],
                                borderWidth: 1
                            }, {
                                label: 'appointments Payment Details',
                                data: appointments,
                                backgroundColor: [
                                    'rgba(255, 159, 64, 0.2)' /*orange*/
                                ],
                                borderColor: [
                                    'rgba(255, 159, 64,1)' /*orange*/
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
                    <!---------------------------------------end of the payment details chart---------------------------------->

                </div>
                <div class="upcomingChanneling">
                        <div class="cardHeader">
                            <h3>Upcoming Channelings</h3>
                            <a href="<?=ROOT?>admin/channeling" class="btn">View All</a>
                        </div>
                        <table>
                           <thead>
                               <tr>
                                   <td>Name of the Doctor</td>
                                   <td>Date</td>
                                   <td>Options</td>
                               </tr>
                           </thead> 
                           <tbody>
                        <?php foreach ($rows1 as $row):?>
                                <?php
                                $scheduleid=$row->scheduleid;

                                $doctorid =$row->doctorid;
                                $doctors = new doctors();
                                $row1=$doctors->where('userid',$doctorid);

                                if($row1)
                                {
                                $row1=$row1[0];
                                }

                                $schedule = new schedule();
                                $row2=$schedule->where('scheduleid',$scheduleid);
                    
                                if($row2)
                                {
                                $row2=$row2[0];
                                }
                    
                                ?>
                               <tr>
                                   <td><?=$row->doctorName?></td>
                                   <td><?=$row2->dateofSlot?></td>
                                   <td><?=$row2->arrivalTime?></td>
                                   <td><?=$row1->hospital?></td>
                                   <td> <button class="viewMore">View</button></td>
                               </tr>
                            <?php endforeach;?>
                           </tbody>
                        </table>
                </div>
            </div>


            <div class="detailsBottom">
                <div class="activeUsers">
                    <div class="cardHeader">
                        <h3>Active Users</h3>
                        <div class="icon">
                            <i class="fas fa-user-check"></i>
                        </div>
 <!---------------------------chart2 for user count------------------------------------------->
                    </div>
                        <h3 style="text-align:left; font-size:30px;"><?= $cCount ?></h3><br>

                    <div class="charts">
                        <canvas id="myChart"></canvas>
                    </div>
                    

                   

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
                    <!---------------------------------------end of the user count chart---------------------------------->

                </div>
                <div class="newProducts">
                    <div class="cardHeaderA">
                        <h3>New Products</h3>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <td>Seller Name</td>
                                <td>Product</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Keerthi Perera</td>
                                <td>Ashwagandha Powder</td>
                            </tr>
                            <tr>
                                <td>Amal Wickramasinghe</td>
                                <td>Gold Turmeric Skin Cream</td>
                            </tr>
                            <tr>
                                <td>Sunil Mendis</td>
                                <td>Amalaki</td>
                            </tr>
                            <tr>
                                <td>Samani Silva</td>
                                <td>Neem Oil</td>
                            </tr>
                            <tr>
                                <td>Thush Perera</td>
                                <td>Vicco Ayurvedic Tooth paste</td>
                            </tr>
                            <tr>
                                <td>Sunil Mendis</td>
                                <td>Amla Hair Oil</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="popularForums">
                    <div class="cardHeaderA">
                        <h3>Popular Forums</h3>

                    </div>
                    <br>
                    <!--------------------chart1--for payment counts--------------------------------->
                    <div class="charts">
                        <canvas id="myChart3"></canvas>
                    </div>
                    <!--chartbiuld-->
                    <script>
                        const forums = <?php echo json_encode($forums); ?>;
                        //below data3 called by the config3
                        const data3 = {
                            labels: [
                                'Products',
                                'herbs',
                                'doctors'
                            ],
                            datasets: [{
                                label: 'Products Payment Details',
                                data: forums,
                                backgroundColor: [
                                    'rgb(255, 205, 86)', //yellow
                                    'rgba(75, 192, 192)', //green
                                    'rgb(54, 162, 235)', //blue
                                    
                                ],
                                hoverOffset: 4
                            }]
                        }; /////

                        /*configure the block */
                        const config3 = {
                            type: 'doughnut',
                            data: data3,
                        };

                        /*render the chart */
                        const myChart3 = new Chart(
                            document.getElementById('myChart3'),
                            config3
                        );
                    </script>
                    <!---------------------------------------end of the payment details chart---------------------------------->


                </div>

            </div>



        </div>

    </div>


    <script>
        function toggleMenu() {
            let toggle = document.querySelector('.toggle');
            let navigation = document.querySelector('.navigation');
            let main = document.querySelector('.main');


            toggle.classList.toggle('active');
            navigation.classList.toggle('active');
            main.classList.toggle('active');


        }
    </script>


</body>

</html>
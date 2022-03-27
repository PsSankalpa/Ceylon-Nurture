<!DOCTYPE html>
<html>
    <head>
        <title>
            Admin Dashboard   
        </title>
        <link rel="stylesheet" href="<?=ASSETS?>css/commonStyle.css">
        <link rel="stylesheet" href="<?=ASSETS?>css/adminStyle.css">
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    </head>

    <body id="body">
       <div class="container">
           <div class="navigation">
               <ul>
                    <li>
                    <a href="<?= ROOT ?>home/home">
                            <span class="icon"><img class="logo" src="<?= ASSETS ?>img/logo.png"></span>
                            <span class="title"><h2> Ceylon Nurture </h2></span>
                        </a>

                    </li>
                    <a href="#">
                    <li>
                    <a href="<?=ROOT?>admin">
                            <span class="icon"><i class="fas fa-home"></i></span>
                            <span class="title"> Dashboard </span>
                        </a>    
                    </li>
                    <li>
                    <a href="<?=ROOT?>admin/users">
                            <span class="icon"><i class="fas fa-users"></i></span>
                            <span class="title">Users</span>
                        </a>    
                    </li>
                    <li>
                        <a href="<?=ROOT?>admin/feedbacks">
                            <span class="icon"><i class="far fa-comments"></i></span>
                            <span class="title">Feedbacks</span>
                        </a>    
                    </li>
                    <li>
                        <a href="<?=ROOT?>admin/channeling">
                            <span class="icon"><i class="fas fa-hospital-user"></i></span>
                            <span class="title">Channeling</span>
                        </a>    
                    </li>
                    <li>
                        <a href="<?=ROOT?>admin/products">
                            <span class="icon"><i class="fas fa-shopping-cart"></i></span>
                            <span class="title">Products</span>
                        </a>    
                    </li>
                    <li>
                    <a href="<?=ROOT?>admin/payments">
                            <span class="icon"><i class="fas fa-file-invoice-dollar"></i></span>
                            <span class="title">Payments</span>
                        </a>    
                    </li>
                    <li>
                        <a href="<?=ROOT?>header/viewArticles">
                            <span class="icon"><i class="far fa-newspaper"></i></span>
                            <span class="title">Articles</span>
                        </a>    
                    </li>
                    <li>
                    <a href="<?=ROOT?>forum">
                            <span class="icon"><i class="far fa-comment-alt"></i></span>
                            <span class="title">Forums</span>
                        </a>    
                    </li>
                    <li>
                    <a href="<?=ROOT?>admin/reports">
                            <span class="icon"><i class="far fa-chart-bar"></i></span>
                            <span class="title">Reports</span>
                        </a>    
                    </li>
                    <li>
                    <a href="<?=ROOT?>logout">
                            <span class="icon"><i class="fas fa-sign-out-alt"></i></span>
                            <span class="title">Sign out</span>
                        </a>    
                    </li>
               </ul>

           </div>
    

           <div class="main">
               <div class="topbar">

                   <div class="toggle"  onclick="toggleMenu();">
                   <i class="fas fa-bars"></i>
                   </div>

                   <div class="topbar_side">
                        <div class="notifications"><div><i class="far fa-bell"></i> </div><div><i class="fas fa-sliders-h"></i></i></div></div>
                        <div class="profile">
                            <img class="profile_pic"src="<?=ASSETS?>img/profile_picture1.jpg">
                            <?php if (Auth::logged_in_admin()) : ?>
                                <p> Hi <?=Auth::fname() ?></p> 
                            <?php endif;?>   
                        </div>
                   </div>

                </div>

                <div class="overview">

                   <div class="toggle">
                       <h4>Overview</h4>
                   </div>

                   <div class="topbar_side heading">
                   <i class="far fa-calendar-alt">  2021/04/01 - 2021/06/30</i>
                    </div>

                </div>


                <div class="cardBox">
                    <div class="card">
                        <div>
                            <div class="numbers"><h6>LKR</h6> 10,000</div>
                            <div class="cardName">Total Profit</div>
                        </div>
                        <div class="iconBox">
                        <i class="fas fa-chart-line"></i></div>
                    </div>

                    <div class="card">
                        <div>
                            <div class="numbers"><h6>LKR</h6> 5,000</div>
                            <div class="cardName">Total Expenses</div>
                        </div>
                        <div class="iconBox">
                        <i class="fas fa-file-invoice-dollar"></i>
                        </div>
                    </div>
                    
                    <div class="card">
                        <div>
                            <div class="numbers"><h6>LKR</h6> 1,000</div>
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

                <div class="details">
                    <div class="salesReport">
                        <div class="cardHeader">
                            <h3>Sales Report</h3>
                        </div>
                        <img class="sales" src="<?=ASSETS?>img/admin_chart3.png">

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
                            
                        </div>
                          <h3 style="text-align:left; font-size:30px;">68</h3><br>
                          <img class="user" src="<?=ASSETS?>img/admin_chart2.png">

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
                           <?php foreach ($rows2 as $row):?>

                                <tr>
                                    <td><?=$row->productName?></td>
                                    <td><?=$row->sellerName?></td>
                                </tr>
                                <?php endforeach;?>
                           </tbody>
                        </table>
                    </div>

                    <div class="popularForums">
                        <div class="cardHeaderA">
                            <h3>Popular Forums</h3>

                        </div>
                        <br>
                        <img class="forum" src="<?=ASSETS?>img/admin_chart1.png">

                    </div>

                </div>


                
            </div>
    
        </div>

        
    <script>
        function toggleMenu(){
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
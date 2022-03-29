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
                    <a href="<?=ROOT?>admin">
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
                       <h4>Reports</h4>
                   </div>

                   <div class="topbar_side heading">
                   </div>

                </div>

                <div class="detailsA">
                   
                <div class="upcomingChanneling">
                        <div class="cardHeader">
                            <h3>Channeling</h3>
                            
                            <div class="report"><i class="far fa-calendar-alt">  2021/04/01 - 2021/06/30</i></div>
                        <form method="POST">
                            <div class="row">
                            <div class="col-25">
                                <label for="nic">Filter by Patient Name</label>
                            </div>
                            <div class="col-75">
                            <input type="text" value="<?=get_var('name')?>" id="name" name="name" placeholder="Patient Name">
                            </div>
                            </div>

                            <div class="row">
                            <input type="submit" value="Submit">
                            </div>
                            </form>
                            </div><br>

                        <table>
                            
                           <thead>
                               <tr>
                                   <td>Name of the Doctor</td>
                                   <td>Patient Name</td>
                                   <td>Date</td>
                                   <td>Time</td>
                                   <td>Location</td>
                                   <td>Total Payments</td>
                                   <td>Commission</td>
                                   <td>Generate PDF</td>
                               </tr>
                           </thead> 
                           <tbody>
                           <?php if($rows2):?>
                           <?php if($rows1):?>
                            <?php $rows2 = $rows1;?>
                            <?php endif;?>  

                                <?php foreach($rows2 as $row):?>
                               <tr>
                                   <td><?=$row->doctorName?></td>
                                   <td><?=$row->patientName?></td>
                                   <td><?=$row->date?></td>
                                   <td><?=$row->slotTimeStart?></td>
                                   <td>General Hospital,Colombo 05</td>
                                   <td> <?=$row->totalPayment?></td>
                                   <td><?=$row->commission?></td>
                                   <td><a href="<?=ROOT?>admin/generatepdfChanneling/<?= $row->appointmentid ?>" class="btn" style="font-size:0.7rem;"><b>Generate PDF</b></a></td>

                               </tr>
                               <?php endforeach; ?>
                             <?php endif;?>  

                                   
                               
                           </tbody>
                        </table>
                    </div>
   
                    

                </div>

                <div class="detailsA">
                   
                <div class="upcomingChanneling">
                        <div class="cardHeader">
                            <h3>Products</h3>

                            <div class="report"><i class="far fa-calendar-alt">  2021/04/01 - 2021/06/30</i></div>
                            <form method="POST">
                            <div class="row">
                            <div class="col-25">
                                <label for="nic">Filter by Product Name</label>
                            </div>
                            <div class="col-75">
                            <input type="text" value="<?=get_var('productName')?>" id="productName" name="productName" placeholder="Product Name">
                            </div>
                            </div>

                            <div class="row">
                            <input type="submit" value="Submit">
                            </div>
                            </form>
                        </div><br>

                        <table>
                           <thead>
                               <tr>
                                   <td>Product Name</td>
                                   <td>Seller Name</td>
                                   <td>Product Price</td>
                                   <td>Category</td>
                                   <td>address</td>
                                   <td>tpNumber</td>
                                   <td>Generate PDF</td>

                               </tr>
                           </thead> 
                           <tbody>
                           <?php if($rows):?>
                           <?php if($rows3):?>
                            <?php $rows = $rows3;?>
                            <?php endif;?> 
                           <?php foreach ($rows as $row):?>

                               <tr>
                                   <td><?=$row->productName?></td>
                                   <td><?=$row->sellerName?></td>
                                   <td><?=$row->productPrice?></td>
                                   <td><?=$row->category?></td>
                                   <td><?=$row->address?></td>
                                   <td><?=$row->tpNumber?></td>
                                   <td><a href="<?=ROOT?>admin/generatepdfProducts/<?= $row->productid ?>" class="btn" style="font-size:0.7rem;"><b>Generate PDF</b></a></td>

                               </tr>
                               <?php endforeach;?>
                               <?php endif;?> 

                               
                                   
                               
                           </tbody>
                        </table>
                    </div>
   
                    

                </div>

                <div class="detailsA">
                   
                <div class="upcomingChanneling">
                        <div class="cardHeader">
                            <h3>Doctor Payments</h3>
                            <form method="POST">
                            <div class="row">
                            <div class="col-25">
                                <label for="nic">Filter by Doctor Name</label>
                            </div>
                            <div class="col-75">
                            <input type="text" value="<?=get_var('doctorPaymentName')?>" id="doctorPaymentName" name="doctorPaymentName" placeholder="Doctor Name">
                            </div>
                            </div>

                            <div class="row">
                            <input type="submit" value="Submit">
                            </div>
                            </form>
                        </div><br>
                        <table>
                           <thead>
                               <tr>
                                   <td>Doctor Name</td>
                                   <td>Doctor id</td>
                                   <td>Date</td>
                                   <td>Amount</td>
                                   <td>Generate PDF</td>

                               </tr>
                           </thead> 
                           <tbody>
                            <?php if ($rows4):?>
                                <?php foreach ($rows4 as $row):?>

                               <tr>
                                   <td><?=$row->doctorName?></td>
                                   <td><?=$row->doctorid?></td>
                                   <td><?=$row->date?></td>
                                   <td><?=$row->amount?></td>
                                   <td><a href="<?=ROOT?>admin/generatepdfDoctorPayment/<?= $row->adminpaymentid ?>" class="btn" style="font-size:0.7rem;"><b>Generate PDF</b></a></td>

                               </tr>
                               <?php endforeach;?>
                            <?php endif;?>
                               
                                   
                               
                           </tbody>
                        </table>
                    </div>
   
                    

                </div>


                <div class="detailsA">
                   
                <div class="upcomingChanneling">
                        <div class="cardHeader">
                            <h3>Other Payments</h3>
                            <form method="POST">
                            <div class="row">
                            <div class="col-25">
                                <label for="nic">Filter by Payment Type</label>
                            </div>
                            <div class="col-75">
                            <input type="text" value="<?=get_var('paymentName')?>" id="paymentName" name="paymentName" placeholder="Payment Type">
                            </div>
                            </div>

                            <div class="row">
                            <input type="submit" value="Submit">
                            </div>
                            </form>
                        </div><br>
                        <table>
                           <thead>
                               <tr>
                                   <td>Type of Payment</td>
                                   <td>Date</td>
                                   <td>Amount</td>
                                   <td>Generate PDF</td>

                               </tr>
                           </thead> 
                           <tbody>
                           <?php if ($rows5):?>
                                <?php foreach ($rows5 as $row):?>

                               <tr>
                                   <td><?=$row->type?></td>
                                   <td><?=$row->date?></td>
                                   <td><?=$row->amount?></td>
                                   <td><a href="<?=ROOT?>admin/generatepdfPayment/<?= $row->adminPaymentid ?>" class="btn" style="font-size:0.7rem;"><b>Generate PDF</b></a></td>

                               </tr>
                               <?php endforeach;?>
                            <?php endif;?>

                               
                           </tbody>
                        </table>
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
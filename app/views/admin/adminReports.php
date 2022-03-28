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
                            
                            <div class="report"><a class="btn">Generate Report</a><i class="far fa-calendar-alt">  2021/04/01 - 2021/06/30</i></div>
                        </div><br>
                        <form method="POST">
                            <div class="row">
                            <div class="col-25">
                                <label for="nic">Filter by User Name</label>
                            </div>
                            <div class="col-75">
                            <input type="text" value="<?=get_var('name')?>" id="name" name="name" placeholder="User Name">
                            </div>
                            </div>

                            <div class="row">
                            <input type="submit" value="Submit">
                            <input type="reset" value="Reset">
                            </div>
                            </form>
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
                               </tr>
                           </thead> 
                           <tbody>
                           <?php if($rows1):?>
                            <?php $row = $rows1;?>
                                <?php foreach($row as $row):?>
                               <tr>
                                   <td><?=$row->doctorName?></td>
                                   <td><?=$row->patientName?></td>
                                   <td><?=$row->date?></td>
                                   <td><?=$row->slotTimeStart?></td>
                                   <td>General Hospital,Colombo 05</td>
                                   <td> <?=$row->totalPayment?></td>
                                   <td><?=$row->commission?></td>
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
                            <div class="report"><a class="btn">Generate Report</a><i class="far fa-calendar-alt">  2021/04/01 - 2021/06/30</i></div>
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
                                   <td>description</td>
                               </tr>
                           </thead> 
                           <tbody>
                           <?php foreach ($rows as $row):?>

                               <tr>
                                   <td><?=$row->productName?></td>
                                   <td><?=$row->sellerName?></td>
                                   <td><?=$row->productPrice?></td>
                                   <td><?=$row->category?></td>
                                   <td><?=$row->address?></td>
                                   <td><?=$row->tpNumber?></td>
                                   <td><?=$row->description?></td>
                               </tr>
                               <?php endforeach;?>

                               
                                   
                               
                           </tbody>
                        </table>
                    </div>
   
                    

                </div>

                <div class="detailsA">
                   
                   <div class="upcomingChanneling">
                           <div class="cardHeader">
                               <h3>Payments</h3>
                               <div class="report"><a class="btn">Generate Report</a><i class="far fa-calendar-alt">  2021/04/01 - 2021/06/30</i></div>
                           </div><br>
                           <table>
                              <thead>
                                  <tr>
                                      <td>Type of Payment</td>
                                      <td>Date</td>
                                      <td>Method of Payments</td>
                                      <td>Amount</td>
                                  </tr>
                              </thead> 
                              <tbody>
                                  <tr>
                                      <td>Monthly Implimentation cost</td>
                                      <td>05/11/2021</td>
                                      <td>Credit card Payment</td>
                                      <td> LKR 2500</td>
                                  </tr>
                                  
                                      <td>Maintenance Cost</td>
                                      <td>06/11/2021</td>
                                      <td> Bank transfer</td>
                                      <td> LKR 2500</td>
                                  </tr>
                                  
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
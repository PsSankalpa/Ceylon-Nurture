<!DOCTYPE html>
<html>
    <head>
        <title>
            Admin Dashboard   
        </title>
        <link rel="stylesheet" href="<?=ASSETS?>css/commonStyle.css">
        <link rel="stylesheet" href="<?=ASSETS?>css/adminStyle.css">
        <link rel="stylesheet" href="<?=ASSETS?>css/channelingStyle.css">

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
                       <h4>Payments</h4>
                       
                   </div>

                   <div class="topbar_sideA heading">
                   <i class="far fa-calendar-alt">  2021/04/01 - 2021/06/30</i>
                   <i class="far fa-money-bill-alt"> Amount LKR 2000-2500</i>
                   </div>

                </div>

                <div class="detailsA">
                   
                <div class="upcomingChanneling">
                        <div class="cardHeader">
                            <h3>Payments</h3>
                        </div><br>
                        <form class="regi_form" enctype="multipart/form-data" method="POST">

                            <div class="row">
                            <div class="col-25">
                                <label for="type">Type of payment</label>
                            </div>
                            <div class="col-75">
                            <select name="type">
                        <option value="<?=get_var('type')?>" >--Select Payment Type--</option>
                                <option>Implementation Cost</option>
                                <option>Maintenance Cost</option>
                                <option>Security certification Cost</option>

                        </select>
                            </div>
                            </div>

                       

                            <div class="row">
                            <div class="col-25">
                                <label for="amount">Payment Amount</label>
                            </div>
                            <div class="col-75">
                            <input type="number" value="<?=get_var('amount')?>" id="amount" name="amount" placeholder="Amount">
                            </div>
                            </div>

                            

                            <div class="row">
                            <input type="submit" value="Submit">
                            <input type="reset" value="Reset">
                            </div>
                        </form>    
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
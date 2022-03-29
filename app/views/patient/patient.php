<!DOCTYPE html>
<html>
    <head>
        <title>
            Patient   
        </title>
        <link rel="stylesheet" href="<?=ASSETS?>css/commonStyle.css">
        <link rel="stylesheet" href="<?=ASSETS?>css/patientStyle.css">
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    </head>

    <body id="body">
       <div class="container">
           <div class="navigation">
               <ul>
                    <li>
                            <span class="icon"></span>
                            <span class="title"><a href="<?= ROOT ?>home/home"><img class="logo" src="<?= ASSETS ?>img/logo.png"></a></span>

                    </li>
                    <li>
                        <a href="<?=ROOT?>channeling/patient">
                            <span class="icon"><i class="fas fa-home"></i></span>
                            <span class="title"> Dashboard </span>
                        </a>    
                    </li>
                    
                    <li>
                        <a href="<?=ROOT?>channeling/appointments">
                            <span class="icon"><i class="fas fa-hospital-user"></i></span>
                            <span class="title">Appointments</span>
                        </a>    
                    </li>
                    <li>
                        <a href="<?=ROOT?>channeling/payments">
                            <span class="icon"><i class="fas fa-file-invoice-dollar"></i></span>
                            <span class="title">Payments</span>
                        </a>    
                    </li>
                    <li>
                        <a href="<?=ROOT?>channeling/reports">
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
                        <div class="profile">
                            <img class="profile_pic"src="<?=ASSETS?>img/profile_picture1.jpg">
                            <?php if (Auth::logged_in()) : ?>
                                <p> Hi, <?=Auth::nameWithInitials() ?></p> 
                            <?php endif;?>   
                        </div>
                   </div>

                </div>

                <div class="overview">

                   <div class="top">
                       <h3>Patient Dashboard</h3>
                   </div>

                   <div class="topbar_side heading">
                   </div>

                </div>


                

                <div class="details">
                <div class="popularForums">
                        <div class="cardHeaderA">
                            <img class="doctor" src="<?=ASSETS?>img/patient.png">

                        </div>
                    </div>

                    <div class="salesReport">
                            <div class="cardHeaderA">
                                <h3>My Doctors</h3>
                            </div>

                                    <div class="cardBox"> 
                                    <?php if($row1):?>
                                       

                                        <?php foreach ($row1 as $doctor):?>    
                                                                          
                                        <div class="card">
                                            <div>                                               
                                                <div class="numbers"><?= $doctor?></div>
                                                <?php foreach($row2 as $doctorid):?>
                                                    
                                                <?php
                                                $doctors=new doctors();
                                                $specialitiesrow=$doctors->where('userid',$doctorid);
                                                //print_r($specialitiesrow);
                                            
                                            
                                            ?> 
                                                <!--<div class="cardName"> <?= $specialitiesrow[0]->specialities?></div>-->

                                                <?php endforeach;?>

                                            </div>
                                            <div class="iconBox">
                                                <img class="doctor" src="<?=ASSETS?>img/doctor7.png">
                                            </div>

                                        </div>

                                        <?php endforeach;?>
                                        <?php else:?>
                                        No Doctors available


                            <?php endif;?>   
                                    </div>
                               


                    </div>

                    <div class="newProducts">
                        <div class="cardHeaderA">
                        </div>
                        <div class="cardHeader">
                            <h3>Available Doctors</h3>
                            <a href="<?= ROOT ?>channeling/rate"> </a>
                        </div>
                        <table>
                           <thead>
                               <tr>
                                   <td>Name of the Doctor</td>
                                   <td>Speciality</td>
                                   <td>Hospital</td>
                               </tr>
                           </thead> 
                           <tbody>
                               <?php if($row4):?>
                           <?php foreach ($row4 as $row4):?>
                               <tr>
                                   <td><?=$row4->nameWithInitials?></td>
                                   <td><?=$row4->specialities?></td>
                                   <td> <?=$row4->hospital?></td>
                               </tr>
                               <?php endforeach;?>
                               <?php endif;?>                             
                           </tbody>
                        </table>
                    </div>                   

                    
                   
                </div>


                <div class="detailsBottom">
                   
                <div class="upcomingChanneling">
                        <div class="cardHeader">
                            <h3>Upcoming Appointments</h3>
                            <a href="<?=ROOT?>channeling/appointments" class="btn">View All</a>
                        </div>
                        <table>
                           <thead>
                               <tr>
                                   <td>Name of the Doctor</td>
                                   <td>Date</td>
                                   <td>Time</td>
                                   <td>Location</td>
                               </tr>
                           </thead> 
                           <tbody>

                           <?php if($row):?>

                           <?php foreach ($row as $row):?>
                                <?php

                                $scheduleid=$row->scheduleid;
                                $doctorid =$row->doctorid;

                                $doctors = new doctors();
                                $row1=$doctors->where('userid',$doctorid);

                                
                                $schedule = new schedule();
                                $row2=$schedule->where('scheduleid',$scheduleid);
                                

                                ?>
                                
                               <tr>
                                   <td><?=$row->doctorName?></td>
                                   <td><?=$row2[0]->dateofSlot?></td>
                                   <td><?=$row->slotTimeStart?></td>
                                   <td><?=$row1[0]->hospital?></td>
                               </tr>
                            <?php endforeach;?>
                            <?php endif;?>                             

                           </tbody>
                        </table>
                    </div>
   
                    <div class="ratings">
                        <div class="cardHeader">
                            <h3>My Ratings</h3>
                            <a href="<?= ROOT ?>channeling/rate"> <button class="btn">Give a Feedback</button></a>
                        </div>
                        <table>
                           <thead>
                               <tr>
                                   <td>Name of the Doctor</td>
                                   <td>Date</td>
                                   <td>Feedback</td>
                               </tr>
                           </thead> 
                           <tbody>
                               <?php if($row3):?>
                           <?php foreach ($row3 as $row):?>
                               <tr>
                                   <td><?=$row->doctorName?></td>
                                   <td><?=$row->date?></td>
                                   <td> <?=$row->feedback?></td>
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
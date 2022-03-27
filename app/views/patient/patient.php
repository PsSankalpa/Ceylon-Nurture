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
                   <i class="far fa-calendar-alt">  2021/04/01 - 2021/06/30</i>
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
                            <h3>Channel a doctor</h3><br>
                        </div>
                            <form class="regi_form" enctype="multipart/form-data" method="POST" action="<?=ROOT?>channeling">   

                                <div class="row">
                                <div class="col-25">
                                    <label for="name">Name</label>
                                </div>

                                <div class="col-75">
                                    <input type="text" value="<?=get_var('name')?>" id="name" name="name" placeholder="Name of the Doctor">
                                </div>
                                </div>

                                <div class="row">
                                <div class="col-25">
                                    <label for="speciality">Speciality</label>
                                </div>

                                <div class="col-75">
                                <select name="speciality">
                                    <option>--Select Speciality--</option>
                                            <option>Ayurvedha Panchakrama Prathikara</option>
                                            <option>General Physician</option>
                                    </select>
                                </div>
                                </div>

                                <div class="row">
                                <div class="col-25">
                                    <label for="hospital">Hospital</label>
                                </div>

                                <div class="col-75">
                                <select name="hospital">
                                    <option>--Select Hospital--</option>
                                            <option>Arogya Hospital</option>
                                            <option>Osu Sewana</option>
                                    </select>
                                </div>
                                </div>


                                <div class="row">
                                <div class="col-25">
                                    <label for="date">Date</label>
                                </div>
                                <div class="col-75">
                                <input type="date" id="date" name="date" >
                                </div>
                                </div>
                                <br>
                                <div class="row">
                                <a href="<?= ROOT ?>channeling"><input type="submit" value="Search"/></a>
                                <input type="reset" value="Reset">
                                </div>
                            </form>   
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
                                   <td>Options</td>
                               </tr>
                           </thead> 
                           <tbody>

                        
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
                                   <td><?=$row2[0]->arrivalTime?></td>
                                   <td><?=$row1[0]->hospital?></td>
                                   <td> <button class="viewMore">View</button></td>
                               </tr>
                            <?php endforeach;?>

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
                               <tr>
                                   <td>Dr.Sunil Perera</td>
                                   <td>05/11/2021</td>
                                   <td> He cured my leg pain. very good Doctor</td>
                               </tr>
                               
                                   <td>Dr.Keerthi Perera</td>
                                   <td>06/11/2021</td>
                                   <td>Very friendly doctor</td>
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
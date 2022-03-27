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
                       <h3>Appointments</h3>
                   </div>

                   <div class="topbar_side heading">
                   <i class="far fa-calendar-alt">  2021/04/01 - 2021/06/30</i>
                   </div>

                </div>
                <div class="detailsA">
                   
                <div class="upcomingChanneling">
                        <div class="cardHeader">
                            <h3>Upcoming Appointments</h3>
                        </div><br>
                        <table>
                           <thead>
                               <tr>
                                   <td>Name of the Doctor</td>
                                   <td>Patient Name</td>
                                   <td>Date</td>
                                   <td>Time</td>
                                   <td>Line Number</td>
                                   <td>Location</td>
                                   <td>Special Note from the Doctor</td>
                               </tr>
                           </thead> 
                           <tbody>
                           <?php foreach ($row as $row):?>

                                <?php $doctorid=$row->doctorid;
                                $doctors = new doctors();
                                $row1=$doctors->where('userid',$doctorid);

                                if($row1)
                                {
                                $row1=$row1[0];
                                }

                                $scheduleid=$row->scheduleid;
                                $schedule = new schedule();
                                $row2=$schedule->where('scheduleid',$scheduleid);

                                if($row2)
                                {
                                $row2=$row2[0];
                                }
                                ?>
                               <tr>
                                   <td><?=$row1->nameWithInitials?></td>
                                   <td><?=$row->patientName?></td>
                                   <td><?=$row2->dateofSlot?></td>
                                   <td><?=$row2->arrivalTime?></td>
                                   <td><?=$row->patientCount?></td>
                                   <td><?=$row1->hospital?></td>
                                   <td> e<?=$row2->doctorNote?></td>
                               </tr>
                               <?php endforeach;?>
                               
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
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
                       <h3>Reports</h3>
                   </div>

                   <div class="topbar_side heading">
                   </div>

                </div>
                <div class="detailsA">
                   
                <div class="upcomingChanneling">
                        <div class="cardHeader">
                            <h3>Channeling</h3>
                            <div class="report"><i class="far fa-calendar-alt">  2021/04/01 - 2021/06/30</i></div>

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
                                   <td>Total Payment</td>
                                   <td>Commission</td>
                                   <td>Generate Pdf</td>

                               </tr>
                           </thead> 
                           <tbody>
                           <?php foreach ($row as $row):?>

                               <tr>
                                   <td><?= $row->doctorName ?></td>
                                   <td><?= $row->patientName ?></td>
                                   <td><?= $row->date ?></td>
                                   <?php
                                        $doctors = new doctors();
                                        $schedule = new schedule();
                                        $doctorid=$row->doctorid;
                                        $scheduleid=$row->scheduleid;
                                        $time=$schedule->where('scheduleid',$scheduleid);
                                        $location=$doctors->where('userid',$doctorid);
                                   ?>
                                   <td><?= $time[0]->arrivalTime ?></td>
                                   <td> <?= $row->patientCount ?></td>
                                   <td><?= $location[0]->hospital ?></td>
                                   <td> Rs. <?= $row->totalPayment ?></td>
                                   <td>Rs. <?= $row->commission ?></td>
                                   <td><a href="<?=ROOT?>channeling/generatepdf/<?= $row->appointmentid ?>" class="btn">Generate PDF</a></td>

                               </tr>
                               <?php endforeach ;?>

                                   
                               
                           </tbody>
                        </table>
                    </div>


                
            </div>

            <div class="detailsA">
                   
                   <div class="upcomingChanneling">
                           <div class="cardHeader">
                               <h3>Payments</h3>
                               <div class="report"><a class="btn">View Report</a><i class="far fa-calendar-alt">  2021/04/01 - 2021/06/30</i></div>
                           </div><br>
                           <table>
                              <thead>
                                  <tr>
                                      <td>Doctor Name</td>
                                      <td>Date</td>
                                      <td>Doctor Charges</td>
                                      <td>Commission</td>
                                      <td>Amount</td>
                                  </tr>
                              </thead> 
                              <tbody>
                                  <tr>
                                      <td>Dr.Sunil Perera</td>
                                      <td>05/11/2021</td>
                                      <td> LKR 2500</td>
                                      <td> LKR 200</td>
                                      <td> LKR 2700</td>

                                  </tr>
                                  
                                      <td>Dr.Keerthi Perera</td>
                                      <td>06/11/2021</td>
                                      <td> LKR 2800</td>
                                      <td> LKR 200</td>
                                      <td> LKR 3000</td>

                                  </tr>
                                  
                              </tbody>
                           </table>
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
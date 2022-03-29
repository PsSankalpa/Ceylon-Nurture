<!DOCTYPE html>
<html>
    <head>
        <title>Doctor Dashboard</title>
            <link rel="icon" href="<?= ASSETS ?>img/logo.png" type="image/x-icon" />
        <meta name="viewport" content="width=device-width; initial-scale=1.0;">
        <link rel="stylesheet" href="<?=ASSETS?>css/docDashboard.css">
    

   
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script>
      function openSlideMenue(){
        document.getElementById('mySidenav').style.width = '250px';
        document.getElementById('content').style.marginLeft = '250px';
      }
      function closeSlideMenue(){
        document.getElementById('mySidenav').style.width = '0';
        document.getElementById('content').style.marginLeft = '0';
      }
    </script>
    </head>

  <body>
    <div id="content">
   
        <span class="slide">
        <a href="<?=ROOT?>home/home" class="previous">&#8249;</a>
          <a href="#" onclick="openSlideMenue()">
            <i class="fa fa-fw fa-bars"></i></a>
          
          <span class="nav">Dashboard</span>
        
        </span>
                      
        <div id="mySidenav" class="sidenav">
          <a href="#" class="close" onclick="closeSlideMenue()">
            <i class="fa fa-fw fa-times"></i>
          </a>
      
        
        <!--<p class="logo"><span>Ceylon Nurture</span></p>-->
          <a  href="<?=ROOT?>home/home"><i class="fa fa-fw fa-home"></i>&nbsp;&nbsp;  Home</a>
          <a class="active" href="<?=ROOT?>doctor/docDashboard"><i class="fa fa-fw fa-dashboard"></i>&nbsp;&nbsp;  Dashboard</a>
          <a  href="<?=ROOT?>doctor/addschedule"><i class="fa fa-fw fa-book icons"></i>&nbsp;&nbsp; Schedule</a>
          <a  href="<?=ROOT?>doctor/feedback"><i class="fa fa-fw fa-comment icons"></i>&nbsp;&nbsp;  Feedback</a>
          <a   href="<?=ROOT?>appointments"><i class="fa fa-fw fa-calendar icons"></i>&nbsp;&nbsp;  Appointments</a>
          <a  href="<?=ROOT?>header/viewArticles"><i class="fa fa-fw fa-list icons"></i>&nbsp;&nbsp;  Articles</a>
          <a  href="<?=ROOT?>forum"><i class="fa fa-fw fa-list icons"></i>&nbsp;&nbsp;  Forums</a>
          <a  href="<?=ROOT?>doctor/patientReports"><i class="fa fa-fw fa-book icons"></i>&nbsp;&nbsp;  Reports</a>
          <a href="<?=ROOT?>logout"><i class="fa fa-fw fa-sign-out icons"></i>&nbsp;&nbsp;  Sign Out</a>
       
        </div>
            <div class="head">
              <div class="col-div-6"></div>
                <div class="profile">
                  <img src="<?=ASSETS?>img/avatar.png" alt="Person" class="pro-pic" width="200" height="100">
                    <?php if($data):?>
                      <p><?=$data[0]->nameWithInitials?> </p>
                    <?php endif;?>
                  
                 <!--<div class="box-4">
                  <div class="content-box">
                    <p>Number of Patients<span>View All</span></p>
                      <img src="<?=ASSETS?>img/barchart.png" class="chart" width="100%" height="20%">
                  </div>
                  </div>-->
                </div>
              </div>
            </div>
              <div class="container1">
                <div class="inner_content">
                  <h1>Welcome,Dr.<?=Auth::username()?>  </h1> 
                  <h4>Have a nice day at work</h4>
                </div>
                <div class="inner_content_image">
                  <img src="<?=ASSETS?>img/d3.png"> 
                </div>
              </div>
            
            <div class="clearfix"></div>

            <div class="reports">
              <h3></h3>
            <div class="cardBox">
              <div class="col-div-3">
                <div class="box">
                  <p><?= $pCount?><br/><span>Patients</span></p>
                  <i class="fa fa-users box-icon"></i>
                </div>
              </div>

              <div class="col-div-3">
                <div class="box">
                  <p><?= $aCount?><br/><span>Appointments</span></p>
                  <i class="fa fa-calendar box-icon"></i>
                </div>
              </div>

              <div class="col-div-3">
                <div class="box">
                  <p>Rs.<?= $rcount?><br/><span>Revenue</span></p>
                  <i class="fa fa-money box-icon"></i>
                </div>
              </div>
            </div>
            </div>
              <div class="clearfix"></div>
                <div class="col-div-8">
                <h3>My Appointments</h3>
                <!--<div class="dash">
                  <input type="date" id="date" name="date">
                  <button class="filterbtn">Filter</button>
                    </div>-->
                  <div class="box-8">
                  <a href="<?=ROOT?>appointments"><button class="dashviewbtn">View</button></a></br>
           
                  <div class="content-box">
                   <div style="overflow-y:auto;">
                    <table>
                    <thead>
                            <tr>
                            <th>Date</th> 
                            <th>Name</th>
                            <th>NIC No</th>
                            <th>Telephone No</th>
                            <th>Symptoms</th>
                            <th>Payment</th>
                            </tr>
                          </thead>
                          <?php if($data):?>
                            <?php foreach ($data5 as $data5):?>
                              <?php
                             // $arrivalTime = strtotime($data1->arrivalTime);
                             // $departureTime = strtotime($data1->departureTime);
                             // $a_h = date("g:i a", $arrivalTime);
                             // $d_p = date("g:i a", $departureTime);
                             //
                              ?>
                            <tr>
                                <td><?= $data5->date?></td>
                              <!-- <td><?= $a_h ."-" . $d_p?></td>
                                <td><?= $data1->slotNumber?></td>-->

                                <td><?= $data5->patientName?></td>
                                <td><?= $data5->nic?></td>
                                <td><?= $data5->tpNumber ?></td>
                                <td><?= $data5->symptoms ?></td>
                                <td> Rs.<?= $data5->totalPayment ?></td>
                            </tr>
                            <?php endforeach;?>
                           <?php else :?> 
                            <h4>No appointments</h4>
                            <?php endif;?>  
                            </tbody>
                    </table>
                  </div>
                </div>
              </div>
            <div class="clearfix"></div>
    </div>
  </body>
</html> 

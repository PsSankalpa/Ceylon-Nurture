<html>
<head>
<title> Appointment Details</title>
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
</head>
<body class="bg">
    <div id="content">
        <span class="slide">
        <a href="<?=ROOT?>appointments" class="previous">&#8249;</a>
          <a href="#" onclick="openSlideMenue()">
        
            <i class="fa fa-fw fa-bars"></i>
          </a>
          <span class="nav">Appointment Slots</span></br>
        </span>
        </br>            
        <div id="mySidenav" class="sidenav">
          <a href="#" class="close" onclick="closeSlideMenue()">
            <i class="fa fa-fw fa-times"></i>
          </a>
          <a  href="<?=ROOT?>home/home"><i class="fa fa-fw fa-home"></i>&nbsp;&nbsp;  Home</a>
          <a class="active" href="<?=ROOT?>doctor/docDashboard"><i class="fa fa-fw fa-dashboard"></i>&nbsp;&nbsp;  Dashboard</a>
          <a  href="<?=ROOT?>doctor/addschedule"><i class="fa fa-fw fa-book icons"></i>&nbsp;&nbsp; Schedule</a>
          <a  href="<?=ROOT?>doctor/feedback"><i class="fa fa-fw fa-comment icons"></i>&nbsp;&nbsp;  Feedback</a>
          <a   href="<?=ROOT?>appointments"><i class="fa fa-fw fa-calendar icons"></i>&nbsp;&nbsp;  Appointments</a>
          <a  href="<?=ROOT?>articles/articleDetails"><i class="fa fa-fw fa-list icons"></i>&nbsp;&nbsp;  Articles</a>
          <a  href="<?=ROOT?>forum"><i class="fa fa-fw fa-list icons"></i>&nbsp;&nbsp;  Forums</a>
          <a  href="<?=ROOT?>doctor/patientReports"><i class="fa fa-fw fa-book icons"></i>&nbsp;&nbsp;  Reports</a>
          <a href="<?=ROOT?>logout"><i class="fa fa-fw fa-sign-out icons"></i>&nbsp;&nbsp;  Sign Out</a>
        </div>
        <div class="clearfix"></div>

        <!--<div class="appoint">
            <button class="filterbtn">Filter</button>
            <input type="text" id="slotNumber" name="slotNumber" placeholder="Slot No">
            <input type="date" id="date" name="date">
        </div>-->
            <div class="clearfix"></div>
            <div class="col-div-8"><br/>
                <div class="box-8">
                    <div class="content-box">   
                        <div style="overflow:auto;">
                        <table>
                        <thead>
                            <tr>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Slot No</th>
                            <th>Name</th>
                            <th>NIC No</th>
                            <th>Telephone No</th>
                            <th>Symptoms</th>
                            <th>Payment</th>
                            </tr>
                          </thead>
                            <?php foreach ($data5 as $data5):?>
                              <?php
                              $arrivalTime = strtotime($data1->arrivalTime);
                              $departureTime = strtotime($data1->departureTime);
                              $a_h = date("g:i a", $arrivalTime);
                              $d_p = date("g:i a", $departureTime);
                              ?>

                            <tr>
                                <td><?= $data1->dateofSlot?></td>
                                <td><?= $a_h ."-" . $d_p?></td>
                                <td><?= $data1->slotNumber?></td>

                                <td><?= $data5->patientName?></td>
                                <td><?= $data5->nic?></td>
                                <td><?= $data5->tpNumber ?></td>
                                <td><?= $data5->symptoms ?></td>
                                <td> Rs.<?= $data5->totalPayment ?></td>
                            </tr>
                            <?php endforeach;?>
                        </table>
                        </div>
                    </div>
                </div>
            </div>    
    </div>
</body>
</html>
    
<html>
<head>
<title>Doctor's View Schedule</title>
<meta name="viewport" content="width=device-width; initial-scale=1.0;">
<link rel="stylesheet" type="text/css" href="<?=ASSETS?>css/addSchedule.css">
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
<body class="bg">
    <div id="content">
        <span class="slide">
        <a href="<?=ROOT?>doctor/addSchedule" class="previous">&#8249;</a>
          <a href="#" onclick="openSlideMenue()">   
          <i class="fa fa-fw fa-bars"></i></a>
          
          <span class="nav">View Schedule</span></br>
        </span>
        </br>  
        <div id="mySidenav" class="sidenav">
          <a href="#" class="close" onclick="closeSlideMenue()">
            <i class="fa fa-fw fa-times"></i>
          </a>
          <a  href="<?=ROOT?>doctor/docDashboard"><i class="fa fa-fw fa-home"></i>&nbsp;&nbsp;Home</a>
          <a class="active" href="<?=ROOT?>doctor/docDashboard"><i class="fa fa-fw fa-dashboard"></i>&nbsp;&nbsp;Dashboard</a>
          <a  href="<?=ROOT?>doctor/addschedule"><i class="fa fa-fw fa-book icons"></i>&nbsp;&nbsp; Schedule</a>
          <a  href="<?=ROOT?>doctor/feedback"><i class="fa fa-fw fa-comment icons"></i>&nbsp;&nbsp;  Feedback</a>
          <a   href="<?=ROOT?>appointments"><i class="fa fa-fw fa-calendar icons"></i>&nbsp;&nbsp;  Appointments</a>
          <a  href="<?=ROOT?>articles/articleDetails"><i class="fa fa-fw fa-list icons"></i>&nbsp;&nbsp;  Articles</a>
          <a  href="<?=ROOT?>doctor/reports"><i class="fa fa-fw fa-book icons"></i>&nbsp;&nbsp;  Reports</a>
          <a href="<?=ROOT?>logout"><i class="fa fa-fw fa-sign-out icons"></i>&nbsp;&nbsp;  Sign Out</a>
        </div>
        <div class="clearfix"></div>
        <div class="container3">
                <div class="header">
                        <div class="header-container">
                          <div class="button-container">
                            <a href="<?=ROOT?>doctor/addSchedule"><button class="viewbtn">Add Slots</button></a>
                            <a href="<?=ROOT?>doctor/viewSchedule"><button class="viewbtn">View Slots</button></a>
                          </div>
                            <div class="date-container">
                              <input type="date" id="date" name="date">   
                              <button class="filterA">Filter</button>    
                            </div>
                          </div>
                        <div class="cardrow">
                            <?php if($row):?>
                            <?php foreach ($row as $row):?>
                                <div class="cardcolumn">
                                    <div class="card">
                                        <h4><?="Slot-".$row->slotNumber?> </h4>
                                        <h4><?= $row->dateofSlot?> </h4>
                                       <!-- <p><?="Patients-".$row->noOfPatient?> </p>-->
                                        <h4><?="Time-".$row->arrivalTime."-".$row->departureTime?> </h4>
                                        
                                        <div class="div">
                                            <a href="<?=ROOT?>/doctor/scheduleDetails/<?=$row->scheduleid?>">
                                                <button class="cardbutton">View More</button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach;?>
                            <?php else:?>
                            <h4>No Schedules Yet</h4>
                            <?php endif;?>
                        </div>
                </div>
                </div>
            </div> 
        </div>
    </div>
</body>
</html>
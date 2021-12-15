<!DOCTYPE html>
<html>
    <head>
        <title>Ceylon Nurture|Doctor|Schedule Details</title>
        <meta name="viewport" content="width=device-width; initial-scale=1.0;">
        <link rel="stylesheet" href="<?=ASSETS?>css/addSchedule.css">
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
        
            <i class="fa fa-fw fa-bars"></i>
          </a>
          <span class="nav">View Schedule Details</span></br>
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
                <form class="regi_form" enctype="multipart/form-data" method="POST">
                    <?php if($rows):?>
                    <?php foreach ($rows as $row):?>
                    <div class="row">
                        <div class="col-25">
                            <label for="Slot Number">Slot Number</label>
                        </div>
                        <div class="col-75">
                            <h5><?="Slot-".$row->slotNumber?> </h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="Date of the Slot">Date of the Slot</label>
                        </div>
                        <div class="col-75">
                            <h5><?=$row->dateofSlot?> </h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="Arrival Time">Arrival Time</label>
                        </div>
                        <div class="col-75">
                            <h5><?=$row->arrivalTime?> </h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="Departure Time">Departure Time</label>
                        </div>
                        <div class="col-75">
                            <h5><?=$row->departureTime?></h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="No of patients">No of patients</label>
                        </div>
                        <div class="col-75">
                            <h5><?=$row->noOfPatient." patients"?> </h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="Time per patient">Time per patient</label>
                        </div>
                        <div class="col-75">
                            <h5><?=$row->timePerPatient."mins"?> </h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="Doctor Charge">Doctor Charge</label>
                        </div>
                        <div class="col-75">
                            <h5><?="Rs.".$row->doctorCharge?> </h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="Doctor's Note">Doctor's Note</label>
                        </div>
                        <div class="col-75">
                            <h5><?=$row->doctorNote?> </h5>
                        </div>
                    </div>
                    <?php endforeach;?>
                    <?php endif;?>
                </form>
                <div class="row">
                    <a href="<?=ROOT?>doctor/viewSchedule/<?=$row->scheduleid?>">
                        <button class="btn">Back</button>
                    </a>
                    <a href="<?=ROOT?>doctor/editSchedule/<?=$row->scheduleid?>">
                        <button class="btn">Edit Slot</button>
                    </a>
                    <a href="<?=ROOT?>doctor/deleteSchedule/<?=$row->scheduleid?>">
                        <button class="btn">Delete Slot</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
    </body>
</html>
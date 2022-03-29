<html>
<head>
<title>Edit Schedule</title>
<link rel="icon" href="<?= ASSETS ?>img/logo.png" type="image/x-icon" />
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
        <a href="<?=ROOT?>doctor/viewSchedule" class="previous">&#8249;</a>
          <a href="#" onclick="openSlideMenue()">
        
            <i class="fa fa-fw fa-bars"></i>
          </a>
          <!-- <span class="nav">Edit Schedule</span></br>-->
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
        <div class="container3">
                <?php if($row):?>
                    <form class="regi_form" enctype="multipart/form-data" method="POST">
                        <h2>Edit the Schedule</h2><br>
                        <hr>
                        
                        <!--for the errors-->
                        <?php if(count($errors) > 0 ):?>
                        <div class="alertwarning">
                        <button class="closebtn" onclick="closebutton()">&times;</button>   
                            <strong>Error!</strong> 
                            <?php foreach($errors as $error ):?>
                                <br /><?=$error?>
                            <?php endforeach;?>
                        </div>
                        <?php endif;?>   
                    

                        <div class="row">
                            <div class="col-25">
                                <label for="Slot Number">Slot Number</label>
                            </div>
                            <div class="col-75">
                                <input type="text" value="<?=get_var('slotNumber',$row->slotNumber)?>" id="slotNumber" name="slotNumber" placeholder="Slot Number">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-25">
                                <label for="Date of the Slot">Date of the Slot</label>
                            </div>
                            <div class="col-75">
                                <input type="date" value="<?=get_var('dateofSlot',$row->dateofSlot)?>" id="dateofSlot" name="dateofSlot" placeholder="Date of the Slot">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-25">
                                <label for="Arrival Time">Arrival Time</label>
                            </div>
                            <div class="col-75">
                            <input type="time" value="<?=get_var('arrivalTime',$row->arrivalTime)?>" id="arrivalTime" name="arrivalTime" placeholder="Arrival Time">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-25">
                                <label for="Departure Time">Departure Time</label>
                            </div>
                            <div class="col-75">
                            <input type="time" value="<?=get_var('departureTime',$row->departureTime)?>" id="departureTime" name="departureTime" placeholder="Departure Time">
                            </div>
                        </div>
                        <?php

                        //format the time using strtotime
                        $timePerPatient = strtotime($row->timePerPatient);
                        //$departureTime = date_create($row->departureTime);

                        $t_p = date("g", $timePerPatient);
                        ?>
                        <div class="row">
                            <div class="col-25">
                                <label for="Time per patient">Time per patient</label>
                            </div>
                            <div class="col-75">
                            <input type="text" value="<?=get_var('timePerPatient',$t_p)?>" id="timePerPatient" name="timePerPatient" placeholder="Time per patient">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-25">
                                <label for="Doctor Charge">Doctor Charge</label>
                            </div>
                            <div class="col-75">
                            <input type="text" value="<?=get_var('doctorCharge',$row->doctorCharge)?>" id="doctorCharge" name="doctorCharge" placeholder="Doctor Charge">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-25">
                                <label for="Doctor's Note">Doctor's Note</label>
                            </div>
                            <div class="col-75">
                            <input type="text" value="<?=get_var('doctorNote',$row->doctorNote)?>" id="doctorNote" name="doctorNote" placeholder="Doctor's Note">
                            </div>
                        </div>
                        <div class="row">
                            <a href="<?=ROOT?>doctor/viewSchedule/<?=$row->scheduleid?>"> 
                            </a>
                            <input type="submit" value="Update">
                        </div>
                    </form>
                <?php endif;?>
            </div>
            <script type="text/javascript" src="<?=ASSETS?>js/sellerJs"></script>
        </div>
    </div>
</body>
</html>

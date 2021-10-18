<html>
<head>
<title>Doctor's View Appointments</title>
<?php $this -> view ("header",$data)?>
<meta name="viewport" content="width=device-width; initial-scale=1.0;">
<link rel="stylesheet" type="text/css" href="<?=ASSETS?>css/appointments.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="background">
        <div class="container1">
            <div class="sidebar">
                <img src="<?=ASSETS?>img/avatar.png" alt="Person" class="pro-pic" width="200" height="100">
                <h4><b>Dr.W.M.S.Perera</b></h4>
                <a href="<?=ROOT?>doctor/viewAccount"><i class="fa fa-fw fa-home"></i>  My Account</a>
                <a  href="<?=ROOT?>doctor/addschedule"><i class="fa fa-fw fa-book"></i>  Schedule</a>
                <a href="<?=ROOT?>doctor/feedback"><i class="fa fa-fw fa-comment"></i>  Feedback</a>
                <a  class="active" href="<?=ROOT?>appointments"><i class="fa fa-fw fa-calendar"></i>  Appointments</a>
                <a href="<?=ROOT?>doctor/reports"><i class="fa fa-fw fa-book"></i>  Reports</a>
            </div>
                <div class="container3">
                   <div class="header">
                        <div>
                            <input type="date" id="date" name="date">
                            <button class="filter">Filter</button>
                        </div> 
                        <div class="slot">Time Slot 01</div>
                        
                        <div class="slot-container">
                            <div class="time">8.00am</div>
                            <div class="patients">Natasha Perera</div> <br>  
                            <a href="<?= ROOT ?>doctor/appointmentDetails"><button class="cardbutton">View More</button></a>
                        </div>

                        <div class="slot-container">
                            <div class="time">8.15 am</div>
                            <div class="patients">Sisiliya Kumari</div>  <br>
                            <a href="<?=ROOT?>doctor/appointmentDetails"><button class="cardbutton">View More</button></a>
                        </div>

                        <div class="slot-container">
                            <div class="time">8.30 am</div>
                            <div class="patients">Nanda Kumara</div>   <br>
                            <a href="<?=ROOT?>doctor/appointmentDetails"><button class="cardbutton">View More</button></a>
                        </div>

                        <div class="slot-container">
                            <div class="time">8.45 am</div>
                            <div class="patients">Sunil Gunawardhana </div>  <br> 
                            <a href="<?=ROOT?>doctor/appointmentDetails"><button class="cardbutton">View More</button></a>
                        </div>
                        
                        <div class="slot-container">
                            <div class="time">9.00 am</div>
                            <div class="patients">Nimmi Fernando</div>  <br> 
                            <a href="<?=ROOT?>doctor/appointmentDetails"><button class="cardbutton">View More</button></a>
                        </div>

                        <div class="slot-container">
                            <div class="time">9.15 am</div>
                            <div class="patients">Kumarika Siriwardhana</div> <br> 
                            <a href="<?=ROOT?>doctor/appointmentDetails"><button class="cardbutton">View More</button></a>
                        </div>
                    </div>    
                </div> 
        </div>
    </div>
</body>
</html>
    
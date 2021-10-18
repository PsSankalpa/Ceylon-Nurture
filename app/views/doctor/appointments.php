<html>
<head>
<title>Doctor's Appointments</title>
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
                <a href="<?=ROOT?>doctor/addschedule"><i class="fa fa-fw fa-book"></i>  Schedule</a>
                <a href="<?=ROOT?>doctor/feedback"><i class="fa fa-fw fa-comment"></i>  Feedback</a>
                <a class="active"  href="<?=ROOT?>appointments"><i class="fa fa-fw fa-calendar"></i>  Appointments</a>
                <a href="<?=ROOT?>doctor/reports"><i class="fa fa-fw fa-book"></i>  Reports</a>
            </div>
                <div class="container3">
                    <div class="header">
                        <div>
                            <input type="date" id="date" name="date">
                            <button class="filter">Filter</button>
                        </div> 

                        <div class="slot-container">
                            <div class="slot">Time Slot 01</div>
                            <div class="time">8.00am - 12.00pm</div>
                            <div class="patients">16 patients</div>  
                            <a href="<?=ROOT?>doctor/viewAppointments"><button class="cardbutton">View Information</button></a>
                        </div>

                        <div class="slot-container">
                            <div class="slot">Time Slot 02</div>
                            <div class="time">4.00am - 7.00pm</div>
                            <div class="patients">12 patients</div>  
                            <a href="<?=ROOT?>doctor/viewAppointments"><button class="cardbutton">View Information</button></a>
                        </div>
                    </div>    
                </div> 
        </div>
    </div>
</body>
</html>
    
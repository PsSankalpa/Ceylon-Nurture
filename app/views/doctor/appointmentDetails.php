<html>
<head>
<title>Doctor's Appointments Details</title>
<?php $this -> view ("header",$data)?>
<link rel="stylesheet" type="text/css" href="<?=ASSETS?>css/appointments.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="background">
        <div class="container1">
            <div class="container2">
                
                    <img src="<?=ASSETS?>img/avatar.png" alt="Person" style="width:100%">
                        <h4><b>Dr.W.M.S.Perera</b></h4>
            
                <ul>
                    <li><a  href="<?=ROOT?>doctor/viewAccount/$row->userid"><i class="fa fa-fw fa-home"></i>My Account</a></li>
                    <li><a href="<?=ROOT?>doctor/addschedule"><i class="fa fa-fw fa-book"></i>Schedule</a></li>
                    <li><a href="<?=ROOT?>doctor/feedback"><i class="fa fa-fw fa-comment"></i>Feedback</a></li>
                    <li><a class="active" href="<?=ROOT?>appointments"><i class="fa fa-fw fa-calendar"></i>Appointments</a></li>
                    <li><a href="<?=ROOT?>doctor/reports"><i class="fa fa-fw fa-book"></i>Reports</a></li>
                </ul>
            </div>
                <div class="container3">
                    <div class="box">
                        <div class="date">15/11/2021</div>
                        <div class="time">8.00 am</div>
                        <div class="patients">Natasha Perera</div>
                            <h3>Diagonsis for Arthritis</h3>
                    </div>
                    <div class="box2">
                        <div class="date">15/11/2021</div>
                        <h3>Doctor Name - Sanath Perera</h3>
                        <p>Speciality - Internal Medicine</p> 
                        <p>Hospital - Osu Sewana Hospital</p>
                        <hr><br>
                        <h3>Name of the Patient - Natasha Perera</h3>
                        <p>Telephone - 0761234567</p> 
                        <p>DOB - 20/10/1990</p> 
                        <p>Symptoms - Arthritis</p> 
                        <hr><br>
                        <p>Invoice No - 003442543656</p> 
                        <p>Total Payment - Rs.3200</p> 
                    </div>
                </div>
        </div>
    </div>
</body>
</html>
    
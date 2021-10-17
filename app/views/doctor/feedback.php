<html>
<head>
<title>Doctor Feedback</title>
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
                            <li><a href="<?=ROOT?>doctor/viewAccount"><i class="fa fa-fw fa-home"></i>My Account</a></li>
                            <li><a href="<?=ROOT?>doctor/addschedule"><i class="fa fa-fw fa-book"></i>Schedule</a></li>
                            <li><a class="active"href="<?=ROOT?>doctor/feedback"><i class="fa fa-fw fa-comment"></i>Feedback</a></li>
                            <li><a href="<?=ROOT?>appointments"><i class="fa fa-fw fa-calendar"></i>Appointments</a></li>
                            <li><a href="<?=ROOT?>doctor/reports"><i class="fa fa-fw fa-book"></i>Reports</a></li>
                        </ul>
            </div>
                <div class="container3">
                    <div style="height:500px;width:700px;border:solid 2px orange;overflow:scroll;overflow-x:hidden;overflow-y:scroll;">
                        <div>
                            <input type="date" id="date" name="date">
                            <button class="filter">Filter</button>
                            <h2>Feed Backs from Patients</h2>
                        </div> 
                        <div class="slot-container">
                            <div class="patients">Natasha Perera</div><br> 
                            <p>He is a good doctor who has lot of skills.I got my treatments for arthritis from him and now i am recovering</p>
                            <div class="time">10.30am</div> 
                        </div>

                        <div class="slot-container">
                            <div class="patients">Sisiliya Kumari</div><br>
                            <p>I got treatment for asthma from Dr.Sanath Perera.Started my treatmentsa few months ago and now i am feeling better.</p>
                            <div class="time">2.00 pm</div>
                        </div>

                        <div class="slot-container">
                            <div class="patients">Nanda Kumara</div>
                            <p> <p>I got treatment for asthma from Dr.Sanath Perera.Started my treatmentsa few months ago and now i am feeling better.</p>
                            <div class="time">5.00 pm</div>
                        </div>

                        <div class="slot-container">
                            <div class="patients">Sunil Gunawardhana </div>  <br> 
                            <p>I was not able to get a good result from the treatments which he does.</p>
                            <div class="time">8.45 pm</div>
                        </div>
                        
                        <div class="slot-container">
                            <div class="patients">Nimmi Fernando</div>  <br> 
                            <p>I highly recommend this doctor.My son was able to recover from a severe digestive problem </p>
                            <div class="time">9.00 am</div>
                        </div>

                        <div class="slot-container">
                            <div class="patients">Kumarika Siriwardhana</div> <br>
                            <p>Thank you so much doctor for your treatments.So happy to say that i was able to walk like earlier after your treatments.</p> 
                            <div class="time">11.15 pm</div>
                        </div>
                
            </div>
        </div>
    </div>
</body>
</html>
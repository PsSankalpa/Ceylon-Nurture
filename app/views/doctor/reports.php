<html>
<head>
<title>Doctor's Reports</title>
<?php $this -> view ("header",$data)?>
<meta name="viewport" content="width=device-width; initial-scale=1.0;">
<link rel="stylesheet" type="text/css" href="<?=ASSETS?>css/reports.css">
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
                <a  href="<?=ROOT?>appointments"><i class="fa fa-fw fa-calendar"></i>  Appointments</a>
                <a class="active" href="<?=ROOT?>doctor/reports"><i class="fa fa-fw fa-book"></i>  Reports</a>
            </div>
                <div class="container3">
                    <div class="header">    
                        <label>From</label><input type="date" id="date" name="date">
                        <label>To</label><input type="date" id="date" name="date">
                        <div class="report-container">
                            <div>Date</div>
                            <div>Patient's Name</div>
                            <div>Symptoms</div>  
                            <div>Total Payment</div>
                            <div></div>
                            <div>16/11/2021</div>
                            <div>Natasha Perera</div>
                            <div>Arthritis</div>
                            <div>Rs.3200</div>
                            <a href="<?=ROOT?>doctor/reportDetails"><button class="cardbutton">View Information</button></a>
                            <div>17/11/2021</div>
                            <div>Sisiliya Kumari</div>
                            <div>Leg Pain</div>
                            <div>Rs.2500</div>
                            <a href="<?=ROOT?>doctor/reportDetails"><button class="cardbutton">View Information</button></a>
                            <div>18/11/2021</div>
                            <div>Nanda Kumara</div>
                            <div>Severe Headache</div>
                            <div>Rs.2100</div>
                            <a href="<?=ROOT?>doctor/reportDetails"><button class="cardbutton">View Information</button></a>
                            <div>19/11/2021</div>
                            <div>Sunil Gunawardhana</div>
                            <div>Severe Gastritis</div>
                            <div>Rs.3000</div>
                            <a href="<?=ROOT?>doctor/reportDetails"><button class="cardbutton">View Information</button></a>
                            <div>20/11/2021</div>
                            <div>Nimmi Fernando</div>
                            <div>Asthma</div>
                            <div>Rs.2300</div>
                            <a href="<?=ROOT?>doctor/reportDetails"><button class="cardbutton">View Information</button></a>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</body>
</html>
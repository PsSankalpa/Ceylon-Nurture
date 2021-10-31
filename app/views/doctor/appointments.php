<html>
<head>
<title>Doctor's Appointments</title>
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
        <a href="<?=ROOT?>doctor/docDashboard" class="previous">&#8249;</a>
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
          <a  href="<?=ROOT?>doctor/docDashboard"><i class="fa fa-fw fa-home"></i>&nbsp;&nbsp;  Home</a>
          <a class="active" href="<?=ROOT?>doctor/docDashboard"><i class="fa fa-fw fa-dashboard"></i>&nbsp;&nbsp;  Dashboard</a>
          <a  href="<?=ROOT?>doctor/addschedule"><i class="fa fa-fw fa-book icons"></i>&nbsp;&nbsp; Schedule</a>
          <a  href="<?=ROOT?>doctor/feedback"><i class="fa fa-fw fa-comment icons"></i>&nbsp;&nbsp;  Feedback</a>
          <a   href="<?=ROOT?>appointments"><i class="fa fa-fw fa-calendar icons"></i>&nbsp;&nbsp;  Appointments</a>
          <a  href="<?=ROOT?>articles/articleDetails"><i class="fa fa-fw fa-list icons"></i>&nbsp;&nbsp;  Articles</a>
          <a  href="<?=ROOT?>doctor/reports"><i class="fa fa-fw fa-book icons"></i>&nbsp;&nbsp;  Reports</a>
          <a href="<?=ROOT?>logout"><i class="fa fa-fw fa-sign-out icons"></i>&nbsp;&nbsp;  Sign Out</a>
        </div>
        <div class="clearfix"></div>

        <div class="appoint">
            <button class="filterbtn">Filter</button>
            <input type="date" id="date" name="date">
        </div>
            <div class="clearfix"></div>
            <div class="col-div-8"><br/>
                <div class="box-8">
                    <div class="content-box">   
                        <div style="overflow-y:auto;">
                        <table>
                            <tr>
                                <th>Date</th>
                                <th>Slot No</th>
                                <th>Time</th>
                                <th>No of Patients</th>
                                <th></th>
                            </tr>
                            <tr>
                                <td class="data">16/11/2021</td>
                                <td class="data">Slot 01</td>
                                <td class="data">8.00am - 12.00pm</td>
                                <td class="data">16</th>
                                <td class="data"><a href="<?=ROOT?>doctor/appointmentDetails"><button class="appviewbtn">View Information</button></a></td>
                            </tr>
                            <tr>
                                <td class="data">16/11/2021</td>
                                <td class="data">Slot 02</td>
                                <td class="data">4.00pm - 7.00pm</td>
                                <td class="data">12</th>
                                <td class="data"><a href="<?=ROOT?>doctor/appointmentDetails"><button class="appviewbtn">View Information</button></a></td>
                            </tr>
                        </table>
                        </div>
                    </div>
                </div>
            </div>    
    </div>
</body>
</html>
    
<html>
<head>
<title>Doctor's Reports</title>
<meta name="viewport" content="width=device-width; initial-scale=1.0;">
<link rel="stylesheet" href="<?=ASSETS?>css/reportsview.css">
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
<body>
<body class="bg">
    <div id="content">
        <span class="slide">
        <a href="<?=ROOT?>doctor/docDashboard" class="previous">&#8249;</a>
          <a href="#" onclick="openSlideMenue()">
        
            <i class="fa fa-fw fa-bars"></i>
          </a>
          <span class="nav">Reports</span></br>
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
            <div class="col-div-8"><br/>
                <div class="box-8">
                    <div class="content-box">   
                        <div style="overflow-y:hidden;">
                        <div class="cardBox">
                            <div class="col-div-3">
                            <a href="<?=ROOT?>doctor/reports">
                                <div class="box">
                                <h2>Patients Reports</h2>
                                <i class="fa fa-users box-icon"></i>
                            </a>
                                </div>
                            </div>


                            <div class="col-div-3">
                                <div class="box">
                                <h2>Payments Reports</h2>
                                <i class="fa fa-calendar box-icon"></i>
                                </div>
                            </div>
                        </div>     
                        </div>
                    </div>
                </div>
            </div>    
    </div>
</body>
</html>
    
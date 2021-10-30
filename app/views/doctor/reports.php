<html>
<head>
<title>Doctor's Reports</title>
<?php $this -> view ("header",$data)?>
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
          <a class="active" href="<?=ROOT?>doctor/docDashboard"><i class="fa fa-fw fa-dashboard"></i>&nbsp;&nbsp;  Dashboard</a>
          <a  href="<?=ROOT?>doctor/addschedule"><i class="fa fa-fw fa-book icons"></i>&nbsp;&nbsp; Schedule</a>
          <a  href="<?=ROOT?>doctor/feedback"><i class="fa fa-fw fa-comment icons"></i>&nbsp;&nbsp;  Feedback</a>
          <a   href="<?=ROOT?>appointments"><i class="fa fa-fw fa-calendar icons"></i>&nbsp;&nbsp;  Appointments</a>
          <a  href="<?=ROOT?>appointments"><i class="fa fa-fw fa-list icons"></i>&nbsp;&nbsp;  Articles</a>
          <a  href="<?=ROOT?>doctor/reports"><i class="fa fa-fw fa-book icons"></i>&nbsp;&nbsp;  Reports</a>
        </div>
        <div class="clearfix"></div>

                  <div class="appoint">
            <button class="filterbtn">Filter</button>
            <label>From<input type="date" id="date" name="date"></label>
            <label>To<input type="date" id="date" name="date"></label>
        </div>
            <div class="clearfix"></div>
            <div class="col-div-8"><br/>
                <div class="box-8">
                    <div class="content-box">   
                        <div style="overflow-y:auto;">
                        <table>
                        <tr>
                            <th>Date</th>
                            <th>Patient's Name</th>
                            <th>Symptoms</th>
                            <th>Total Payment</th>
                            <th></th>
                        </tr>
                        <tr>
                            <td class="data">16/11/2021</td>
                            <td class="data">Natasha Perera</td>
                            <td class="data">Arthritis</td>
                            <td class="data">Rs.3200</th>
                            <td class="data"><a href="<?=ROOT?>doctor/reportDetails"><button class="appviewbtn">View Information</button></a></td>
                            </tr>
                            <tr>
                            <td class="data">17/11/2021</td>
                            <td class="data">Sisiliya Kumari</td>
                            <td class="data">Leg Pain</th>
                            <td class="data">Rs.2500</td>
                            <td class="data"><a href="<?=ROOT?>doctor/reportDetails"><button class="appviewbtn">View Information</button></a></td>
                            </tr>
                            <tr>
                            <td class="data">18/11/2021</td>
                            <td class="data">Nanda Kumara</td>
                            <td class="data">Severe Headache</th>
                            <td class="data">Rs.2100</td>
                            <td class="data"><a href="<?=ROOT?>doctor/reportDetails"><button class="appviewbtn">View Information</button></a></td>
                            </tr>
                            <tr>
                            <td class="data">18/11/2021</td>
                            <td class="data">Sunil Gunawardhana</td>
                            <td class="data">Severe Gastritis</th>
                            <td class="data">Rs.3000</td>
                            <td class="data"><a href="<?=ROOT?>doctor/reportDetails"><button class="appviewbtn">View Information</button></a></td>
                            </tr>
                            <tr>
                            <td class="data">20/11/2021</td>
                            <td class="data">Nimmi Fernando</td>
                            <td class="data">Asthma</th>
                            <td class="data">Rs.2300</td>
                            <td class="data"><a href="<?=ROOT?>doctor/reportDetails"><button class="appviewbtn">View Information</button></a></td>
                            </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>    
    </div>
</body>
</html>
    
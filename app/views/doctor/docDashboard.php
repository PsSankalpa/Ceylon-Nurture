<!DOCTYPE html>
<html>
    <head>
        <title>Ceylon Nurture|Doctor Dashboard</title>
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
    <div id="content">
   
        <span class="slide">
        <a href="<?=ROOT?>home/home" class="previous">&#8249;</a>
          <a href="#" onclick="openSlideMenue()">
        
            <i class="fa fa-fw fa-bars"></i>
          </a>
          <span class="nav">Dashboard</span>
        
        </span>
                      
        <div id="mySidenav" class="sidenav">
          <a href="#" class="close" onclick="closeSlideMenue()">
            <i class="fa fa-fw fa-times"></i>
          </a>
      
        
        <!--<p class="logo"><span>Ceylon Nurture</span></p>-->
         
          <a class="active" href="<?=ROOT?>doctor/docDashboard"><i class="fa fa-fw fa-dashboard"></i>&nbsp;&nbsp;  Dashboard</a>
          <a  href="<?=ROOT?>doctor/viewAccount"><i class="fa fa-fw fa-user icons"></i> &nbsp;&nbsp; My Account</a>
          <a  href="<?=ROOT?>doctor/addschedule"><i class="fa fa-fw fa-book icons"></i>&nbsp;&nbsp; Schedule</a>
          <a  href="<?=ROOT?>doctor/feedback"><i class="fa fa-fw fa-comment icons"></i>&nbsp;&nbsp;  Feedback</a>
          <a   href="<?=ROOT?>appointments"><i class="fa fa-fw fa-calendar icons"></i>&nbsp;&nbsp;  Appointments</a>
          <a  href="<?=ROOT?>appointments"><i class="fa fa-fw fa-list icons"></i>&nbsp;&nbsp;  Articles</a>
          <a  href="<?=ROOT?>doctor/reports"><i class="fa fa-fw fa-book icons"></i>&nbsp;&nbsp;  Reports</a>
        </div>
            <div class="head">
              <div class="col-div-6"></div>
                <div class="profile">
                  <img src="<?=ASSETS?>img/avatar.png" alt="Person" class="pro-pic" width="200" height="100">
                    <?php if($data):?>
                      <p><?=$data[0]->nameWithInitials?> </p>
                    <?php endif;?>
                  
                 <!--<div class="box-4">
                  <div class="content-box">
                    <p>Number of Patients<span>View All</span></p>
                      <img src="<?=ASSETS?>img/barchart.png" class="chart" width="100%" height="20%">
                  </div>
                  </div>-->
                </div>
              </div>
            </div>
              <div class="container1">
                  <h1>Welcome,Dr.<?=Auth::fname()?>  </h1> 
                  <h4>Have a nice day at work</h4>
                  <img src="<?=ASSETS?>img/d3.png"> 
              </div>
            
            <div class="clearfix"></div>

            <div class="reports">
              <h3>Weekly Reports</h3>
              <div class="col-div-3">
              <div class="box">
                  <p>67<br/><span>Patients</span></p>
                  <i class="fa fa-users box-icon"></i>
                </div>
              </div>

              <div class="col-div-3">
                <div class="box">
                  <p>20<br/><span>Appointments</span></p>
                  <i class="fa fa-calendar box-icon"></i>
                </div>
              </div>

              <div class="col-div-3">
                <div class="box">
                  <p>58,500<br/><span>Revenue</span></p>
                  <i class="fa fa-money box-icon"></i>
                </div>
              </div>
            </div>
              <div class="clearfix"></div>
              
                <div class="col-div-8">
                  <h3>My Appointments</h3>
                  <div class="box-8">
                  <div class="content-box">
                    <div>
                      <input type="date" id="date" name="date">
                      <button class="filterbtn">Filter</button>
                    <button class="viewbtn">View</button>
                    </div>
                    <div style="overflow-x:auto;,overflow-y:auto;">
                    <table>
                      <tr>
                        <th>Name</th>
                        <th>NIC No</th>
                        <th>Slot No</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Telephone No</th>
                        <th>Symptoms</th>
                        <th>Payment</th>
                      </tr>
                      <tr>
                        <td>Natasha Perera</td>
                        <td>971234567V</td>
                        <td>Slot 01</td>
                        <td>16/11/2021</td>
                        <td>8.00am</td>
                        <td>0711234567</td>
                        <td>Arthritis</td>
                        <td>Rs.3200</td>
                      </tr>
                      <tr>
                        <td>Sisiliya Kumari</td>
                        <td>871234127V</td>
                        <td>Slot 01</td>
                        <td>16/11/2021</td>
                        <td>8.15am</td>
                        <td>0711234567</td>
                        <td>Gastritis</td>
                        <td>Rs.2200</td>
                      </tr>
                    </table>
                  </div>
                </div>
              </div>
            <div class="clearfix"></div>
    </div>
  </body>
</html> 

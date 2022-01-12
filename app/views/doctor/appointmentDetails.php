<html>
<head>
<title> Appointment Details</title>

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
        <a href="<?=ROOT?>appointments" class="previous">&#8249;</a>
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
          <a class="active" href="<?=ROOT?>doctor/docDashboard"><i class="fa fa-fw fa-home"></i>&nbsp;&nbsp;  Home</a>
          <a class="active" href="<?=ROOT?>doctor/docDashboard"><i class="fa fa-fw fa-dashboard"></i>&nbsp;&nbsp;  Dashboard</a>
          <a  href="<?=ROOT?>doctor/addschedule"><i class="fa fa-fw fa-book icons"></i>&nbsp;&nbsp; Schedule</a>
          <a  href="<?=ROOT?>doctor/feedback"><i class="fa fa-fw fa-comment icons"></i>&nbsp;&nbsp;  Feedback</a>
          <a   href="<?=ROOT?>appointments"><i class="fa fa-fw fa-calendar icons"></i>&nbsp;&nbsp;  Appointments</a>
          <a  href="<?=ROOT?>articles/articleDetails"><i class="fa fa-fw fa-list icons"></i>&nbsp;&nbsp;  Articles</a>
          <a  href="<?=ROOT?>doctor/reports"><i class="fa fa-fw fa-book icons"></i>&nbsp;&nbsp;  Reports</a>
          <a href="<?=ROOT?>logout"><i class="fa fa-fw fa-sign-out icons"></i>&nbsp;&nbsp;  Sign Out</a>
        </div>
        <div class="clearfix"></div>

        <!--<div class="appoint">
            <button class="filterbtn">Filter</button>
            <input type="text" id="slotNumber" name="slotNumber" placeholder="Slot No">
            <input type="date" id="date" name="date">
        </div>-->

        <!--Search Bar-->
        <div class="search-container">
            <div class="search_bar">
                <form action="" class="search">
                    <input type="text" value="<?=isset($_GET['search'])?$_GET['search']:'';?>" placeholder="Find the Slot No.." name="search"><!--ternary operator use in the value-->
                    <button type="submit"><i class="fa fa-search"></i></button>
                </form>
            </div>
        </div>
            <div class="clearfix"></div>
            <div class="col-div-8"><br/>
                <div class="box-8">
                    <div class="content-box">   
                        <div style="overflow:auto;">
                        <table>
                            <tr>
                            <th>PatientNo</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Slot No</th>
                            <th>Name</th>
                            <th>NIC No</th>
                            <th>Telephone No</th>
                            <th>Symptoms</th>
                            <th>Payment</th>
                            </tr>
                            <tr>
                                <td class="data">01</td>
                                <td class="data">16/11/2021</td>
                                <td class="data">8.00am</td>
                                <td class="data">Slot 01</td>
                                <td class="data">Natasha Perera</td>
                                <td class="data">971234567V</td>
                                <td class="data">0711234567</td>
                                <td class="data">Arthritis</td>
                                <td class="data">Rs.3200</td>
                            </tr>
                            <tr>
                                <td class="data">02</td>
                                <td class="data">16/11/2021</td>
                                <td class="data">8.15am</td>
                                <td class="data">Slot 01</td>
                                <td class="data">Nanda Kumari</td>
                                <td class="data">871234127V</td>
                                <td class="data">0711234567</td>
                                <td class="data">Gastritis</td>
                                <td class="data">Rs.2700</td>
                            </tr>
                            <tr>
                                <td class="data">03</td>
                                <td class="data">16/11/2021</td>
                                <td class="data">8.30am</td>
                                <td class="data">Slot 01</td>
                                <td class="data">Sunil Gunawardhana</td>
                                <td class="data">871234127V</td>
                                <td class="data">0711234567</td>
                                <td class="data">Leg Pain</td>
                                <td class="data">Rs.2150</td>
                            </tr>
                            <tr>
                                <td class="data">04</td>
                                <td class="data">16/11/2021</td>
                                <td class="data">8.45am</td>
                                <td class="data">Slot 01</td>
                                <td class="data">Nimmi Fernando</td>
                                <td class="data">871234127V</td>
                                <td class="data">0711234567</td>
                                <td class="data">Severe Headache</td>
                                <td class="data">Rs.2450</td>
                            </tr>
                            <tr>
                            <td class="data">05</td>
                                <td class="data">16/11/2021</td>
                                <td class="data">9.00am</td>
                                <td class="data">Slot 01</td>
                                <td class="data">Kumarika Siriwardhana</td>
                                <td class="data">8732525327V</td>
                                <td class="data">0711232453</td>
                                <td class="data">Neck Pain</td>
                                <td class="data">Rs.2860</td>
                            </tr>
                            <tr>
                            <td class="data">06</td>
                                <td class="data">16/11/2021</td>
                                <td class="data">9.15am</td>
                                <td class="data">Slot 01</td>
                                <td class="data">Manel Perera</td>
                                <td class="data">871234127V</td>
                                <td class="data">0711234243</td>
                                <td class="data">Hair Fall</td>
                                <td class="data">Rs.3200</td>
                            </tr>
                            <tr>
                            <td class="data">07</td>
                                <td class="data">16/11/2021</td>
                                <td class="data">9.30am</td>
                                <td class="data">Slot 01</td>
                                <td class="data">Santha Kumara</td>
                                <td class="data">9823647623V</td>
                                <td class="data">0711234567</td>
                                <td class="data">Low Presure</td>
                                <td class="data">Rs.2200</td>
                            </tr>
                            <tr>
                            <td class="data">08</td>
                                <td class="data">16/11/2021</td>
                                <td class="data">9.45am</td>
                                <td class="data">Slot 01</td>
                                <td class="data">Senaka Mendis</td>
                                <td class="data">8974546723V</td>
                                <td class="data">0711234567</td>
                                <td class="data">Back Pain</td>
                                <td class="data">Rs.2100</td>
                            </tr>
                            <tr>
                            <td class="data">09</td>
                                <td class="data">16/11/2021</td>
                                <td class="data">10.00am</td>
                                <td class="data">Slot 01</td>
                                <td class="data">Nimal Peiris</td>
                                <td class="data">812344154V</td>
                                <td class="data">0711234567</td>
                                <td class="data">Gastritis</td>
                                <td class="data">Rs.1200</td>
                            </tr>
                            <tr>
                            <td class="data">10</td>
                                <td class="data">16/11/2021</td>
                                <td class="data">10.15am</td>
                                <td class="data">Slot 01</td>
                                <td class="data">Sumana Kanthi</td>
                                <td class="data">871234454V</td>
                                <td class="data">0711234567</td>
                                <td class="data">Headache</td>
                                <td class="data">Rs.1500</td>
                            </tr>
                            <tr>
                           <!-- <td class="data">11</td>
                                <td class="data">16/11/2021</td>
                                <td class="data">10.30am</td>
                                <td class="data">Slot 01</td>
                                <td class="data">Sisiliya Kumari</td>
                                <td class="data">871234127V</td>
                                <td class="data">0711234567</td>
                                <td class="data">Gastritis</td>
                                <td class="data">Rs.2200</td>
                            </tr>
                            <tr>
                            <td class="data">12</td>
                                <td class="data">16/11/2021</td>
                                <td class="data">10.45am</td>
                                <td class="data">Slot 01</td>
                                <td class="data">Sisiliya Kumari</td>
                                <td class="data">871234127V</td>
                                <td class="data">0711234567</td>
                                <td class="data">Gastritis</td>
                                <td class="data">Rs.2200</td>
                            <tr>
                            <td class="data">13</td>
                                <td class="data">16/11/2021</td>
                                <td class="data">11.00am</td>
                                <td class="data">Slot 01</td>
                                <td class="data">Sisiliya Kumari</td>
                                <td class="data">871234127V</td>
                                <td class="data">0711234567</td>
                                <td class="data">Gastritis</td>
                                <td class="data">Rs.2200</td>
                            </tr>
                            <tr>
                            <td class="data">14</td>
                                <td class="data">16/11/2021</td>
                                <td class="data">11.15am</td>
                                <td class="data">Slot 01</td>
                                <td class="data">Sisiliya Kumari</td>
                                <td class="data">871234127V</td>
                                <td class="data">0711234567</td>
                                <td class="data">Gastritis</td>
                                <td class="data">Rs.2200</td>
                            </tr>
                            <tr>
                            <td class="data">15</td>
                                <td class="data">16/11/2021</td>
                                <td class="data">11.30am</td>
                                <td class="data">Slot 01</td>
                                <td class="data">Sisiliya Kumari</td>
                                <td class="data">871234127V</td>
                                <td class="data">0711234567</td>
                                <td class="data">Gastritis</td>
                                <td class="data">Rs.2200</td>
                            </tr>

                            <tr>
                            <td class="data">16</td>
                                <td class="data">16/11/2021</td>
                                <td class="data">11.45am</td>
                                <td class="data">Slot 01</td>
                                <td class="data">Sisiliya Kumari</td>
                                <td class="data">871234127V</td>
                                <td class="data">0711234567</td>
                                <td class="data">Gastritis</td>
                                <td class="data">Rs.2200</td>
                            </tr>-->
                        </table>
                        </div>
                    </div>
                </div>
            </div>    
    </div>
</body>
</html>
    
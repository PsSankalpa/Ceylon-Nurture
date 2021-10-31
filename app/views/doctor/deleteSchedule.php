<html>
<head>
<title>Ceylon Nurture|Doctor|Delete Schedule</title>
<meta name="viewport" content="width=device-width; initial-scale=1.0;">
<link rel="stylesheet" type="text/css" href="<?=ASSETS?>css/addSchedule.css">
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
<body class="bg">
    <div id="content">
        <span class="slide">
        <a href="<?=ROOT?>doctor/docDashboard" class="previous">&#8249;</a>
          <a href="#" onclick="openSlideMenue()">
        
            <i class="fa fa-fw fa-bars"></i>
          </a>
          <span class="nav">Delete Schedule</span></br>
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
        </div>
        <div class="clearfix"></div>
        <div class="container4">
                    <?php if($row):?>
                        <form class="delete_form" enctype="multipart/form-data" method="POST">
                            <h2>Do you want to delete the Slot <?=get_var('slotNumber',$row->slotNumber)?> of the schedule?</h2>
                            <input type="hidden" name="id">
                            <hr>
                            <br>
                            <p>Deleting your slot will remove all your information of your schedule from our database.</p>
                            <h3><b>This cannot be undone</b></h3>
                            <br/>
                            <hr>
                            <br/>
                            <!-- <div class="buttons"> -->
                              <div class="deletebtn">
                                  <input type="submit" value="Delete">
                              </div>  
                              <!--<div> 
                                  <a href="<?=ROOT?>doctor/viewSchedule/<?=$row->scheduleid?>">
                                      <button class="nobtn">Reset</button>
                                  </a>
                              </div> 
                            </div>-->
                          
                        </form>
                    <?php else:?>
                        Schhedule was not found
                    <?php endif;?>
            <script type="text/javascript" src="<?=ASSETS?>js/sellerJs"></script>
        </div>
    </div>
</body>
</html>

    
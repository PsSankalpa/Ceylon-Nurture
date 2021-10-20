<html>
<head>
<title>View Schedule</title>
<?php $this -> view ("header",$data)?>
<meta name="viewport" content="width=device-width; initial-scale=1.0;">
<link rel="stylesheet" type="text/css" href="<?=ASSETS?>css/viewSchedule.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="background">
        <div class="container1">
            <div class="sidebar">
                <img src="<?=ASSETS?>img/avatar.png" alt="Person" class="pro-pic" width="200" height="100">
                <h4><b>Dr.W.M.S.Perera</b></h4>
                
                <a href="<?=ROOT?>profile/myAccount"><i class="fa fa-fw fa-home"></i>  My Account</a>
                <a class="active" href="<?=ROOT?>doctor/addschedule"><i class="fa fa-fw fa-book"></i>  Schedule</a>
                <a href="<?=ROOT?>doctor/feedback"><i class="fa fa-fw fa-comment"></i>  Feedback</a>
                <a  href="<?=ROOT?>appointments"><i class="fa fa-fw fa-calendar"></i>  Appointments</a>
                <a href="<?=ROOT?>doctor/reports"><i class="fa fa-fw fa-book"></i>  Reports</a>
            </div>

            <div class="container3">
                <div class="header">
                        <div>
                            <a href="<?=ROOT?>doctor/viewSchedule"><button class="viewbtn">View Slots</button></a>
                            <a href="<?=ROOT?>doctor/addSchedule"><button class="addbtn">Add Slots</button></a>
                            <input type="date" id="date" name="date">
                            <button class="filter">Filter</button>
                        </div>                   
                        <div class="cardrow">
                            <?php if($rows):?>
                            <?php foreach ($rows as $row):?>
                                <div class="cardcolumn">
                                    <div class="card">
                                        <h3><?="Slot-".$row->slotNumber?> </h3>
                                        <h4><?= $row->dateofSlot?> </h4>
                                        <p><?="Patients-".$row->noOfPatient?> </p>
                                        <div class="div">
                                            <a href="<?=ROOT?>/doctor/scheduleDetails/<?=$row->scheduleid?>">
                                                <button class="cardbutton">View More</button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach;?>
                            <?php else:?>
                            <h4>No Schedules Yet</h4>
                            <?php endif;?>
                        </div>
                </div>
                </div>
            </div> 
        </div>
    </div>
</body>
</html>
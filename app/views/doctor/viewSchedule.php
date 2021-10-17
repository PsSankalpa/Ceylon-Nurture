<html>
<head>
<title>View Schedule</title>
<?php $this -> view ("header",$data)?>
<link rel="stylesheet" type="text/css" href="<?=ASSETS?>css/viewSchedule.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="background">
        <div class="container1">
            <div class="container2">

                    <img src="<?=ASSETS?>img/avatar.png" alt="Person" style="width:100%">
                        <h4><b>Dr.W.M.S.Perera</b></h4>

                        <!--<?php if($row):?>
                            <h4><?=$row->nameWithInitials?> </h4>
                        <?php endif;?>-->
            
                <ul>
                    <li><a href="<?=ROOT?>doctor/viewAccount"><i class="fa fa-fw fa-home"></i>My Account</a></li>
                    <li><a class="active" href="<?=ROOT?>doctor/addschedule"><i class="fa fa-fw fa-book"></i>Schedule</a></li>
                    <li><a href="<?=ROOT?>doctor/feedback"><i class="fa fa-fw fa-comment"></i>Feedback</a></li>
                    <li><a href="<?=ROOT?>appointments"><i class="fa fa-fw fa-calendar"></i>Appointments</a></li>
                    <li><a href="<?=ROOT?>doctor/reports"><i class="fa fa-fw fa-book"></i>Reports</a></li>
                </ul>
            </div>
            <div class="container3">
                <div style="height:500px;width:700px;border:solid 2px orange;overflow:scroll;overflow-x:hidden;overflow-y:scroll;">
                    <div class="header"></div>
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
</body>
</html>
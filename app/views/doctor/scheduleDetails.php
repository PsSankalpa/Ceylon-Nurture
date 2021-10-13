<!DOCTYPE html>
<html>
    <head>
        <title>Ceylon Nurture|Doctor|Schedule Details</title>
        <?php $this -> view ("header",$data)?>
        <link rel="stylesheet" href="<?=ASSETS?>css/scheduleDetails.css">
    </head>

    <body>
    <div class="background">
        <div class="container1">
        <div class="container2">

                <img src="<?=ASSETS?>img/avatar.png" alt="Person" style="width:100%">
                    <h4><b>Dr.W.M.S.Perera</b></h4>
          
            <ul>
                <li><a href="#account"><i class="fa fa-fw fa-home"></i>My Account</a></li>
                <li><a class="active" href="<?=ROOT?>doctor/addschedule"><i class="fa fa-fw fa-book"></i>Schedule</a></li>
                <li><a href="#feedback"><i class="fa fa-fw fa-comment"></i>Feedback</a></li>
                <li><a href="<?=ROOT?>appointments"><i class="fa fa-fw fa-calendar"></i>Appointments</a></li>
                <li><a href="#book"><i class="fa fa-fw fa-book"></i>Reports</a></li>
            </ul>
        </div>
            <div class="container3">
        <form class="regi_form" enctype="multipart/form-data" method="POST">
        
        <?php if($rows):?>
        <?php foreach ($rows as $row):?>
        <div class="row">
            <div class="col-25">
                <label for="Slot Number">Slot Number</label>
            </div>
            <div class="col-75">
                <h3><?="Slot-".$row->slotNumber?> </h3>
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="Date of the Slot">Date of the Slot</label>
            </div>
            <div class="col-75">
                <h3><?=$row->dateofSlot?> </h3>
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="Arrival Time">Arrival Time</label>
            </div>
            <div class="col-75">
                <h3><?=$row->arrivalTime?> </h3>
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="Departure Time">Departure Time</label>
            </div>
            <div class="col-75">
                <h3><?=$row->departureTime?> </h3>
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="No of patients">No of patients</label>
            </div>
            <div class="col-75">
                <h3><?=$row->noOfPatient." patients"?> </h3>
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="Time per patient">Time per patient</label>
            </div>
            <div class="col-75">
                <h3><?=$row->timePerPatient."mins"?> </h3>
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="Doctor Charge">Doctor Charge</label>
            </div>
            <div class="col-75">
                <h3><?="Rs.".$row->doctorCharge?> </h3>
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="Doctor's Note">Doctor's Note</label>
            </div>
            <div class="col-75">
                <h3><?=$row->doctorNote?> </h3>
            </div>
        </div>
        <?php endforeach;?>
        <?php endif;?>
       </form>
       <div class="row">
            <a href="<?=ROOT?>doctor/viewSchedule/<?=$row->scheduleid?>">
                <button class="backbtn">Back</button>
            </a>
            <a href="<?=ROOT?>doctor/editSchedule/<?=$row->scheduleid?>">
                <button class="editbtn">Edit Slot</button>
            </a>
            <a href="<?=ROOT?>doctor/deleteSchedule/<?=$row->scheduleid?>">
                <button class="deletebtn">Delete Slot</button>
            </a>
        </div>
    </body>
</html>
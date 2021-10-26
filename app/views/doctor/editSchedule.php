<html>
<head>
<title>Edit Schedule</title>
<?php $this -> view ("header",$data)?>
<meta name="viewport" content="width=device-width; initial-scale=1.0;">
<link rel="stylesheet" type="text/css" href="<?=ASSETS?>css/editSchedule.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="background">
        <div class="container1">
            <div class="sidebar">
            <img src="<?=ASSETS?>img/avatar.png" alt="Person" class="pro-pic" width="200" height="100">
            <?php if($data):?>
                    <h4><?=$data[0]->nameWithInitials?> </h4>
            <?php endif;?>
      
            <a href="<?=ROOT?>doctor/viewAccount"><i class="fa fa-fw fa-home"></i>  My Account</a>
            <a class="active" href="<?=ROOT?>doctor/addschedule"><i class="fa fa-fw fa-book"></i>  Schedule</a>
            <a href="<?=ROOT?>doctor/feedback"><i class="fa fa-fw fa-comment"></i>  Feedback</a>
            <a  href="<?=ROOT?>appointments"><i class="fa fa-fw fa-calendar"></i>  Appointments</a>
            <a href="<?=ROOT?>doctor/reports"><i class="fa fa-fw fa-book"></i>  Reports</a>
            </div>
            <div class="container3">
                <?php if($row):?>
                    <form class="regi_form" enctype="multipart/form-data" method="POST">
                        <h2>Edit the Schedule</h2><br>
                        <hr>
                        
                        <!--for the errors-->
                        <?php if(count($errors) > 0 ):?>
                        <div class="alertwarning">
                        <button class="closebtn" onclick="closebutton()">&times;</button>   
                            <strong>Error!</strong> 
                            <?php foreach($errors as $error ):?>
                                <br /><?=$error?>
                            <?php endforeach;?>
                        </div>
                        <?php endif;?>   
                    

                        <div class="row">
                            <div class="col-25">
                                <label for="Slot Number">Slot Number</label>
                            </div>
                            <div class="col-75">
                                <input type="text" value="<?=get_var('slotNumber',$row->slotNumber)?>" id="slotNumber" name="slotNumber" placeholder="Slot Number">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-25">
                                <label for="Date of the Slot">Date of the Slot</label>
                            </div>
                            <div class="col-75">
                                <input type="date" value="<?=get_var('dateofSlot',$row->dateofSlot)?>" id="dateofSlot" name="dateofSlot" placeholder="Date of the Slot">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-25">
                                <label for="Arrival Time">Arrival Time</label>
                            </div>
                            <div class="col-75">
                            <input type="text" value="<?=get_var('arrivalTime',$row->arrivalTime)?>" id="arrivalTime" name="arrivalTime" placeholder="Arrival Time">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-25">
                                <label for="Departure Time">Departure Time</label>
                            </div>
                            <div class="col-75">
                            <input type="text" value="<?=get_var('departureTime',$row->departureTime)?>" id="departureTime" name="departureTime" placeholder="Departure Time">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-25">
                                <label for="No of patients">No of patients</label>
                            </div>
                            <div class="col-75">
                            <input type="text" value="<?=get_var('noOfPatient',$row->noOfPatient)?>" id="noOfPatient" name="noOfPatient" placeholder="No of patients">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-25">
                                <label for="Time per patient">Time per patient</label>
                            </div>
                            <div class="col-75">
                            <input type="text" value="<?=get_var('timePerPatient',$row->timePerPatient)?>" id="timePerPatient" name="timePerPatient" placeholder="Time per patient">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-25">
                                <label for="Doctor Charge">Doctor Charge</label>
                            </div>
                            <div class="col-75">
                            <input type="text" value="<?=get_var('doctorCharge',$row->doctorCharge)?>" id="doctorCharge" name="doctorCharge" placeholder="Doctor Charge">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-25">
                                <label for="Doctor's Note">Doctor's Note</label>
                            </div>
                            <div class="col-75">
                            <input type="text" value="<?=get_var('doctorNote',$row->doctorNote)?>" id="doctorNote" name="doctorNote" placeholder="Doctor's Note">
                            </div>
                        </div>
                        <div class="row">
                            <a href="<?=ROOT?>doctor/viewSchedule/<?=$row->scheduleid?>"> 
                            <input type="reset" value="Cancel" right:30px>
                            </a>
                            <input type="submit" value="Update">
                        </div>
                    </form>
                <?php endif;?>
            </div>
            <script type="text/javascript" src="<?=ASSETS?>js/sellerJs"></script>
        </div>
    </div>
</body>
</html>

<html>
<head>
<title>Doctor's Appointments</title>
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
         
            <ul>
                <li><a  href="<?=ROOT?>doctor/viewAccount/$row->userid"><i class="fa fa-fw fa-home"></i>My Account</a></li>
                <li><a href="<?=ROOT?>doctor/addschedule"><i class="fa fa-fw fa-book"></i>Schedule</a></li>
                <li><a href="#feedback"><i class="fa fa-fw fa-comment"></i>Feedback</a></li>
                <li><a class="active" href="#calendar"><i class="fa fa-fw fa-calendar"></i>Appointments</a></li>
                <li><a href="<?=ROOT?>doctor/reports"><i class="fa fa-fw fa-book"></i>Reports</a></li>
            </ul>
        </div>
                <div class="container3">
                <div style="height:500px;width:700px;border:solid 2px orange;overflow:scroll;overflow-x:hidden;overflow-y:scroll;">
                    <div class="header">
                    </div>
                    
                    <input type="text" name="from_date" id="from_date" class="form-control">
                    <input type="text" name="to_date" id="to_date" class="form-control">
                    <input type="button" name="filter" id="filter" value="filter" class="btn">

                    <div class="cardrow">
                   <?php if($data2):?>
                   <?php foreach ($data2 as $data):?>
                        <div class="cardcolumn">
                            <div class="card">
                            <h3><?="Date-".$data->dateofSlot?> </h3> 
                            <h3><?="Slot-".$data->slotNumber?> </h3>
                            <p><?="Patients-".$data->noOfPatient?> </p>
                                <div class="div">
                                    <a href="<?=ROOT?>/doctor/appointmentDetails/<?=$data->scheduleid?>">
                                        <button class="cardbutton">View More Information</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <?php endforeach;?>
                <?php else:?>
                    <h4>No Appointments</h4>
 			    <?php endif;?>-
            </div>          
        </div>
        </form>
    </div>  
</div>    
</div> 
</div>
</body>
</html>
    
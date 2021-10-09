<html>
<head>
<title>Doctor's Schedule</title>

<link rel="stylesheet" type="text/css" href="<?=ASSETS?>css/addSchedule.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="background">
        <div class="container1">
        <div class="container2">

                <img src="<?=ASSETS?>img/avatar.png" alt="Person" style="width:100%">
                    <h4><b>Dr.W.M.S.Perera</b></h4>
          
            <ul>
                <li><a href="#account"><i class="fa fa-fw fa-home"></i>My Account</a></li>
                <li><a class="active" href="#schedule"><i class="fa fa-fw fa-book"></i>Schedule</a></li>
                <li><a href="#feedback"><i class="fa fa-fw fa-comment"></i>Feedback</a></li>
                <li><a  href="<?=ROOT?>appointments"><i class="fa fa-fw fa-calendar"></i>Appointments</a></li>
                <li><a href="#book"><i class="fa fa-fw fa-book"></i>Reports</a></li>
            </ul>
        </div>
            <div class="container3">
                    <div class="row">
                        <input type="view" value="View Slots">
                        <input type="add" value="Add a New Slot">
                    </div>
                <form class="regi_form" enctype="multipart/form-data" method="POST">

                    <div class="row">
                        <div class="col-25">
                            <label for="Slot Number">Slot Number</label>
                        </div>
                        <div class="col-75">
                            <input type="text" value="" id="slotNumber" name="slotNumber" placeholder="Slot 01">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-25">
                            <label for="Date of the slot">Date of the Slot</label>
                        </div>
                        <div class="col-75">
                            <input type="date" value="" id="dateofSlot" name="dateofSlot" placeholder="15/12/2021">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-25">
                            <label for="Arrival Time">Arrival Time</label>
                        </div>
                        <div class="col-75">
                        <input type="text" value="" id="arrivalTime" name="arrivalTime" placeholder="8.00 am">
                        </div>
                    </div>

                        <div class="row">
                        <div class="col-25">
                            <label for="Departure Time">Departure Time</label>
                        </div>
                        <div class="col-75">
                            <input type="text" value="" id="departureTime" name="departureTime" placeholder="12.00 pm">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-25">
                            <label for="No of patients">No of patients</label>
                        </div>
                        <div class="col-75">
                            <input type="text" value="" id="noOfPatient" name="noOfPatient" placeholder="16">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-25">
                            <label for="Time per patient" >Time per patient</label>
                        </div>
                        <div class="col-75">
                            <input type="text" id="timePerientPat" value="" name="timePerPatient" placeholder="15 ">
                        </div>
                    </div>

                     <div class="row">
                        <div class="col-25">
                            <label for="Doctor Charge" >Doctor Charge</label>
                        </div>
                        <div class="col-75">
                            <input type="text" id="doctorCharge" value="" name="doctorCharge" placeholder="2500">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-25">
                            <label for="Doctor's Note" >Doctor's Note</label>
                        </div>
                        <div class="col-75">
                            <input type="text" id="doctorNote" value="" name="doctorNote" placeholder="Note">
                        </div>
                    </div>

                    <div class="row">
                        <input type="submit" value="Schedule" button onclick="myFunction()">

 
                    </div>
                </form>
            </div>    
    </div> 
</body>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>  Channeling </title>

            <?php $this -> view ("header")?>
            <link rel="stylesheet" href="<?=ASSETS?>css/channelingStyle.css">
            <link rel="stylesheet" href="<?=ASSETS?>css/channelingDoctorStyle.css">
            <link rel="stylesheet" href="<?=ASSETS?>css/commonStyle.css">



</head>
<body id="body">
    <div class="button_top"><a href="<?=ROOT?>channeling/patient"><button class="topButton">Patient Dashboard</button></div></a>

        <div class="booking">

            <div class="search">
                <div class="search_container">

                <?php if($row):?>

                <h2><?=$row->nameWithInitials?></h2><br>
                <div class="doc_image_container"><img class="doctor_image" src="<?=ASSETS?>img/doctor.jpg"></div>

                    <form class="regi_form" enctype="multipart/form-data" method="POST">


                        <div class="row">
                        <div class="col-25">
                            <label for="speciality">Speciality</label>
                        </div>

                        <div class="col-75">
                            <?=$row->specialities?>
                        
                        </div>
                        </div>

                        <div class="row">
                        <div class="col-25">
                            <label for="hospital">Hospital</label>
                        </div>

                        <div class="col-75">
                            <?=$row->hospital?>
                        </div>
                        </div>

                        <div class="row">
                        <div class="col-25">
                            <label for="hospital">City</label>
                        </div>

                        <div class="col-75">
                            <?=$row->city?>
                        </div>
                        </div>

                        <div class="row">
                        <div class="col-25">
                            <label for="hospital">Address</label>
                        </div>

                        <div class="col-75">
                            <?=$row->address?>
                        </div>
                        </div>

                        <!--<div class="row">
                        <div class="col-25">
                            <label for="hospital">Special Note from the Doctor</label>
                        </div>

                        <div class="col-75">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                        </div>
                        </div>-->

                    </form> 
                    <?php else:?>
                        The User is not Found!
                    <?php endif;?>
                </div>  
            </div>            
          

            <div class="schedule">
                <div class="slots">
                <?php if($rows):?>
                    <?php foreach ($rows as $row1):?>

                    <div class="slot">
                        
                        <div class="slotHead">
                            <div class="iconBox"><i class="far fa-calendar-alt"></i></div>
                            <div class="date"> <?=$row1->dateofSlot?></div>
                            <div class="patientNo">Number of Patients: 39</div>
                        </div>

                        <div class="slotBody">
                            <div class="card">
                                <div class="time"><?=$row1->arrivalTime?> - <?=$row1->departureTime?></div>
                                <div class = "availability"> 
                                <ol class="switches">
                                        <input type="checkbox" id="1" checked>
                                        <label for="1">
                                        <span>Availability </span>
                                        <span></span>
                                        </label>
                                </ol>
                                </div><br>
                                <div class="patientNoA" style="font-weight:lighter;">Number of Patients: <?=$row1->noOfPatient?></div>
                                <div class="bookSlot"><a href="<?=ROOT?>channeling/payment/<?=$row->userid?>/<?=$row1->scheduleid?>"><button class="bookSlotButton">Book a Slot</button></a></div>                       
                            </div>

                            
                        </div>
                    </div>
                    <?php endforeach;?>
                    <?php else:?>
                        There are no slots available!
                        <?php endif;?>
                </div>
                
            </div>

   
        </div>

        <!--footer-->
        <?php $this->view("footer") ?>
        <!--end of footer-->


</body>
</html>
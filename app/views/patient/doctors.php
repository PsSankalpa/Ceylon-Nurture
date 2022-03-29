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
            <?php if($row1):?>


                <div class="slots">
                <div class="slotHead">
                            <div class="searchbox">
                                <form action="" method="POST">
                                    <div class="searchform">
                                    <div class="date">
                                    <i class="far fa-calendar-alt"> </i>
                                    </div>
                                    <div class="date">
                                        From
                                    <input type="date" id="fromdate" name="fromdate">
                                    </div>

                                    <div class="date">
                                        To
                                    <input type="date" id="todate" name="todate">
                                    </div>

                                    <div class="date">
                                    <button type="submit" class="filter">Filter</button>
                                    <!--<input type="submit" value="submit">-->
                                    </div>
                                    </div>
                                </form>
                             </div>
                            
                </div>

                    <div class="slot">
                        <div class="slotBody">
                            <?php if($row2):?>
                                
                                    <?php 
                                    //print_r($row2);
                                    $row1=$row2;
                                    ?>
                            <?php endif;?>

                        <?php foreach ($row1 as $row1):?>


                                <?php //format the time using strtotime
                                    $arrivalTime = strtotime($row1->arrivalTime);
                                    $departureTime = strtotime($row1->departureTime);
                                    //$departureTime = date_create($row->departureTime);

                                    $arrivalTime= date("g:i a", $arrivalTime);
                                    $departureTime = date("g:i a", $departureTime);

                                    $currentdate=date('y-m-d') ;
                                    $timestamp1=strtotime($currentdate);
                                    $timestamp2=strtotime($row1->dateofSlot);
                                    

                                ?>
                            
                            
                            <?php if($timestamp1<$timestamp2):?>
                                <div class="card">

                            <div class="date"> <?=$row1->dateofSlot?></div>
                                <div class="time"><?=$arrivalTime?> - <?=$departureTime?></div>
                                <div class = "availability"> 
                                        Availability: <br>
                                        <?php 
                                        $appointments = new appointments();

                                        $scheduleid=$row1->scheduleid;
                                
                                
                                        $appointmentidrow = "select * from appointments where scheduleid =:scheduleid order by appointmentid desc limit 1";
                                            $arr2['scheduleid']=$scheduleid;
                                
                                
                                            $appointmentidrow1 = $appointments->query($appointmentidrow,$arr2);

                                             if($appointmentidrow1):?>

                                                <?php
                                                    $availability = $appointmentidrow1[0]->availability;
                                                    //print_r($availability);
                                                ?>
                                                <?php if($availability==FALSE):?>
                                                    <p style="color:red;">Not Available</p>
                                                    <?php else:?>
                                                    <p style="color:green;">Available</p>
                                                    <?php endif;?>
                                        <?php else:?>
                                        <p style="color:green;">Available</p>
   
                                        <?php endif;?>
                                        <!--<span></span>-->
                                        
                                </div><br>
                                <div class="patientNoA" style="font-weight:lighter;">Number of Patients: <?=$row1->noOfPatient?></div>

                                <?php if($appointmentidrow1):?>

                                    <?php
                                        $availability = $appointmentidrow1[0]->availability;
                                        //print_r($availability);
                                    ?>
                                    <?php if($availability==FALSE):?>
                                        <?php else:?>
                                        <div class="bookSlot"><a href="<?=ROOT?>channeling/payment/<?=$row->userid?>/<?=$row1->scheduleid?>"><button class="bookSlotButton">Book a Slot</button></a></div>                       
                                        <?php endif;?>
                                    <?php else:?>
                                        <div class="bookSlot"><a href="<?=ROOT?>channeling/payment/<?=$row->userid?>/<?=$row1->scheduleid?>"><button class="bookSlotButton">Book a Slot</button></a></div>                       

                                    <?php endif;?>
                            </div>

                            <?php endif;?>

                            <?php endforeach;?>



                        </div>

                    </div>

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
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>     Channeling </title>

            
            <?php $this -> view ("header")?>
            <link rel="stylesheet" href="<?=ASSETS?>css/channelingStyle.css">
            <link rel="stylesheet" href="<?=ASSETS?>css/commonStyle.css">



</head>

<body class="regi">
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>

    <div class="errorpage">
                
         <?php if ($appointmentidrow1):?>   
            <?php //format the time using strtotime
                                    $slotTimeStart = strtotime($appointmentidrow1[0]->slotTimeStart);
                                    $slotTimeEnd = strtotime($appointmentidrow1[0]->slotTimeEnd);
                                    //$departureTime = date_create($row->departureTime);

                                    $slotTimeStart= date("g:i a", $slotTimeStart);
                                    $slotTimeEnd = date("g:i a", $slotTimeEnd);

                                    $scheduleid=$appointmentidrow1[0]->scheduleid;
                                    $schedule = new schedule();
                                    $daterow=$schedule->where('scheduleid',$scheduleid);
                                    $date=$daterow[0]->dateofSlot;

                                ?>
        <h2 class="errorpage_body"> Payment Succesful <br>Your Channeling is Confirmed<br>Your time slot is from <?= $slotTimeStart;?> to <?= $slotTimeEnd;?>  on  <?= $date;?><br>Your line number is <?=$appointmentidrow1[0]->patientCount;?> </h2>
        <a href="<?=ROOT?>channeling/appointments"><button class="button_typeB"> View Channelings </button></a>
        <?php endif; ?>
    </div>

    <!--footer-->
    <?php $this->view("footer") ?>
        <!--end of footer-->

</body>
</html>
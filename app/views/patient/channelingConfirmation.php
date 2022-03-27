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
        <h2 class="errorpage_body"> Payment Succesful <br>Your Channeling is Confirmed<br>Your time slot is from <?= $appointmentidrow1[0]->slotTimeStart;?> to <?= $appointmentidrow1[0]->slotTimeEnd;?>  on  <?= $appointmentidrow1[0]->date;?><br>Your line number is <?=$appointmentidrow1[0]->patientCount;?> </h2>
        <a href="<?=ROOT?>channeling/appointments"><button class="button_typeB"> View Channelings </button></a>
        <?php endif; ?>
    </div>

    <!--footer-->
    <?php $this->view("footer") ?>
        <!--end of footer-->

</body>
</html>
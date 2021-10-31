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
        <h2 class="errorpage_body"> Payment Succesful <br>Your Channeling is Confirmed<br>Your time slot is at 8.15am on 15/11/2021<br>Your line number is 2 </h2>
        <a href="<?=ROOT?>channeling/appointments"><button class="button_typeB"> View Channelings </button></a>
    </div>

    <!--footer-->
    <?php $this->view("footer") ?>
        <!--end of footer-->

</body>
</html>
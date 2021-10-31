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
        <h2 class="errorpage_body"> Please Update your account as a patient to Consult Doctors </h2>
        <a href="<?=ROOT?>patient/registration"><button class="button_typeB"> Update as a Patient </button></a>
    </div>

    <!--footer-->
    <?php $this->view("footer") ?>
        <!--end of footer-->

</body>
</html>
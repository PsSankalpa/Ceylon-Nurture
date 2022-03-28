<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>  Channeling </title>

            <?php $this -> view ("header")?>
            <link rel="stylesheet" href="<?=ASSETS?>css/channelingStyle.css">
            <link rel="stylesheet" href="<?=ASSETS?>css/commonStyle.css">



</head>
<body id="body">
    <div class="button_top"><a href="<?=ROOT?>channeling/patient"><button class="topButton">Patient Dashboard</button></div></a>

        <div class="booking">

            <div class="search">
            <h1>Channel a Doctor</h1>
            
                <form class="regi_form" enctype="multipart/form-data" method="GET" action="">

                    <div class="row">
                    <div class="col-25">
                        <label class="label" for="name">Name</label>
                    </div>

                    <div class="col-75">
                    <input type="text" value="<?= isset($_GET['nameWithInitials']) ? $_GET['nameWithInitials'] : ''; ?>" placeholder="Search.." name="nameWithInitials">
                    </div>
                
                    <div class="row">
                    <div class="col-25">
                        <label class="label" for="speciality">Speciality</label>
                    </div>

                    <div class="col-75">
                    <select name="specialities">
                        <option value="<?= isset($_GET['specialities']) ? $_GET['specialities'] : ''; ?>" >--Select Speciality--</option>
                        <?php foreach ($rows as $row):?>
                                <option><?=$row->specialities?></option>
                            <?php endforeach;?>
                        </select>
                    </div>
                    </div>

                    <div class="row">
                    <div class="col-25">
                        <label class="label" for="hospital">Hospital</label>
                    </div>

                    <div class="col-75">
                    <select name="hospital">
                        <option value="<?= isset($_GET['hospital']) ? $_GET['hospital'] : ''; ?>" >--Select Hospital--</option>
                            <?php foreach ($rows as $row):?>
                                <option><?=$row->hospital?></option>
                            <?php endforeach;?>

                        </select>
                    </div>
                    </div>


                    <div class="row">
                    <div class="col-25">
                        <label  class="label" for="date">Date</label>
                    </div>
                    <div class="col-75">
                    <input type="date" value="<?= isset($_GET['date']) ? $_GET['date'] : ''; ?>" placeholder="Search.." name="date">
                    </div>
                    </div>
                    <br>
                    <br>
                    <div class="row">
                    <input  value="Search"  type="submit"> 
                    </div>
                    </div>
                </form> 

            </div>            

            <div class="schedule">
            
                <?php if ($rows) : ?>
                    <?php foreach ($rows as $row):?>

                    <?php
                    
                    $doctorid=$row->userid;
                    $userid=Auth::userid();
                    

                    ?>
                <?php if($userid != $doctorid):?>
                      
                <form class=scheduling_form enctype="multipart/form-data" action="<?=ROOT?>channeling/doctors/<?=$row->userid?>">

        
                    <div class="item">
                    <div class="doc_image_container"><img class="doctor_image" src="<?=ASSETS?>img/doctor.jpg"></div>

                    <div class="doc_details_container"><h3><?=$row->nameWithInitials?> </h3><br>
                    Hospital:<?=$row->hospital?> <br>Speciality:<?=$row->specialities?></div>


                    <div class="button_container"><a href="<?=ROOT?>channeling/doctors/<?=$row->userid?>"><input type="submit" value="Book Now"></a></div>
                    </div>
                    </form>
                    <?php endif;?>

                    <?php endforeach;?>
                    
                    <?php endif;?>


            </div>

   
        </div>

        <!--footer-->
        <?php $this->view("footer") ?>
        <!--end of footer-->


</body>
</html>
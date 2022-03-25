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
            
                <form class="regi_form" enctype="multipart/form-data" method="POST" action="">

                    <div class="row">
                    <div class="col-25">
                        <label class="label" for="name">Name</label>
                    </div>

                    <div class="col-75">
                    <input type="text" value="<?= isset($_GET['search']) ? $_GET['search'] : ''; ?>" placeholder="Search.." name="search">
                    </div>
                
                    <div class="row">
                    <div class="col-25">
                        <label class="label" for="speciality">Speciality</label>
                    </div>

                    <div class="col-75">
                    <select name="speciality">
                        <option>--Select Speciality--</option>
                        <?php foreach ($rows as $row):?>
                                <option><?=$row->hospital?></option>
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
                        <option>--Select Hospital--</option>
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
                    <input type="date" id="date" name="date" >
                    </div>
                    </div>
                    <br>
                    <br>
                    <div class="row">
                    <button type="submit"><i class="fa fa-search"></i></button>
                    </div>
                    </div>
                </form> 

            </div>            

            <div class="schedule">
            <?php if ($rows1) : ?>
                <?php foreach ($rows1 as $row) : ?>

                    <form class=scheduling_form enctype="multipart/form-data" action="<?=ROOT?>channeling/doctors/<?=$row->userid?>">

        
                        <div class="item">
                        <div class="doc_image_container"><img class="doctor_image" src="<?=ASSETS?>img/doctor.jpg"></div>

                        <div class="doc_details_container"><h3><?=$row->nameWithInitials?> </h3><br>
                        Hospital:<?=$row->hospital?> <br>Speciality:<?=$row->specialities?></div>


                        <div class="button_container"><a href="<?=ROOT?>channeling/doctors/<?=$row->userid?>"><input type="submit" value="Book Now"></a></div>
                        </div>
                    </form>
                <?php endforeach;?>
            <?php endif;?>
                    
            <?php if (!$rows1) : ?>

                <?php foreach ($rows as $row):?>
                <form class=scheduling_form enctype="multipart/form-data" action="<?=ROOT?>channeling/doctors/<?=$row->userid?>">

        
                    <div class="item">
                    <div class="doc_image_container"><img class="doctor_image" src="<?=ASSETS?>img/doctor.jpg"></div>

                    <div class="doc_details_container"><h3><?=$row->nameWithInitials?> </h3><br>
                    Hospital:<?=$row->hospital?> <br>Speciality:<?=$row->specialities?></div>


                    <div class="button_container"><a href="<?=ROOT?>channeling/doctors/<?=$row->userid?>"><input type="submit" value="Book Now"></a></div>
                    </div>
                    </form>

                    <?php endforeach;?>
                    <?php endif;?>

            </div>

   
        </div>

        <!--footer-->
        <?php $this->view("footer") ?>
        <!--end of footer-->


</body>
</html>
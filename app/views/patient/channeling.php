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
           
                <div class="regi_form">

                    <div class="row">
                        <div class="col-25">
                            <label class="label" for="name">Search by Doctor Name</label>
                        </div>

                    <form method="POST">
                    <div class="row">

                        <div class="col-75">
                            <input type="text" value="<?=get_var('name')?>" id="name" name="name" placeholder="Doctor Name">
                         </div>
                    </div>
                    </div>

                    <div class="row">
                    <input type="submit" value="Submit">
                    </div>
                    </form>
                
                    <div class="row">
                        

                    <div class="row">
                        <div class="col-25">
                            <label class="label" for="hospital">Hospital</label>
                        </div>

                    <form method="POST">
                            
                        <div class="col-75">
                            <select name="hospital">
                                <option value="<?=get_var('hospital')?>" >--Select Hospital--</option>
                                <?php foreach ($rows as $row):?>
                                        <option><?=$row->hospital?></option>
                                    <?php endforeach;?>
                                </select>
                        </div>
                    </div>

                <div class="row">
                    <input type="submit" value="Submit">
                </div>
                </div>
            </form>


                    

                                </div> 

                

            </div>            

            <div class="schedule">
            
                <?php if ($rows) : ?>
                    <?php if ($rows1) : ?>
                        <?php 
                            $rows=$rows1;
                            //print_r($rows);
                        ?>
                        <?php endif;?>
                        <?php if ($rows2) : ?>
                        <?php 
                            $rows=$rows2;
                            //print_r($rows);
                        ?>
                        <?php endif;?>
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
                    <?php else:?>
                        No results Found
                    
                    <?php endif;?>


            </div>

   
        </div>

        <!--footer-->
        <?php $this->view("footer") ?>
        <!--end of footer-->


</body>
</html>
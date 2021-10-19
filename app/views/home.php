<!DOCTYPE html>
<html>
    <head>
        <title>
            Home   
        </title>
        <link rel="stylesheet" href="<?=ASSETS?>css/homeStyle.css">
        <?php $this -> view ("header")?>
    </head>

    <body>
        <header>
        <?php if(!empty($data)):?>
            <?php if($data == "seller"):?>
                <div class="home_buttons_top">
                        <div><a href="<?=ROOT?>doctor/registration"> <button class="home_button_top">Be a Doctor</button></a></div>
                        <div><a href="<?=ROOT?>patient/registration"> <button class="home_button_top">Be a Patient</button></a></div>
                </div>

            <?php elseif($data == "doctor"):?>
                <div class="home_buttons_top">
                        <div><a href="<?=ROOT?>patient/registration"> <button class="home_button_top">Be a Patient</button></a></div>
                        <div><a href="<?=ROOT?>seller/registration"><button class="home_button_top">Be a Seller</button></a></div>
                </div>

            <?php elseif($data == "patient"):?>
                <div class="home_buttons_top">
                        <div><a href="<?=ROOT?>doctor/registration"> <button class="home_button_top">Be a Doctor</button></a></div>
                        <div><a href="<?=ROOT?>seller/registration"><button class="home_button_top">Be a Seller</button></a></div>
                </div>

            <?php elseif($data == "doctorAndSeller"):?>
                <div class="home_buttons_top">
                        <div><a href="<?=ROOT?>patient/registration"> <button class="home_button_top">Be a Patient</button></a></div>
                </div>

            <?php elseif($data == "doctorAndPatient"):?>
                <div class="home_buttons_top">
                        <div><a href="<?=ROOT?>seller/registration"><button class="home_button_top">Be a Seller</button></a></div>
                </div>

            <?php elseif($data == "sellerAndPatient"):?>
                <div class="home_buttons_top">
                        <div><a href="<?=ROOT?>doctor/registration"> <button class="home_button_top">Be a Doctor</button></a></div>
                </div>

                <?php endif;?>
        <?php endif;?>
        </header>
        
    <div class="bg_image_container">
        <img class="bg_image" src="<?=ASSETS?>img/home.jpg">
    </div>
            <div class="body_container">
                
                <hr class="h">
                <h1 class="h1_home">CEYLON NURTURE</h1>
                <h5 class="h5_home">Ayurvedha Under One Roof</h5>
                <hr class="h">
            

        <?php if(!empty($data)):?>
            <?php if($data == "seller"):?>
                <div class="home_buttons">
                <button class="button_patient"> Add products </button>
                </div>

            <?php elseif($data == "doctor"):?>
                <div class="home_buttons">
                <a href="<?=ROOT?>appointments"><button class="button_patient"> Appointments </button>
                </div>

                <?php elseif($data == "patient"):?>

                <div class="home_buttons">
                <a href="<?=ROOT?>channeling"><button class="button_patient"> Channel a Doctor </button></a>
                </div>

            <?php elseif($data == "doctorAndSeller"):?>

                <div class="home_buttons">
                <a href="<?=ROOT?>appointments"><button class="button_patient"> Appointments </button>
                <button class="button_patient"> Add products </button>
                </div>

            <?php elseif($data == "doctorAndPatient"):?>

                <div class="home_buttons">

                <a href="<?=ROOT?>appointments"><button class="button_patient"> Appointments </button>
                <a href="<?=ROOT?>channeling"><button class="button_patient"> Channel a Doctor </button></a>

                </div>

            <?php elseif($data == "sellerAndPatient"):?>

                <div class="home_buttons">
                <a href="<?=ROOT?>channeling"><button class="button_patient"> Channel a Doctor </button></a>
                <button class="button_patient"> Add products </button>
                </div>

            <?php elseif($data == "allUser"):?>

                <div class="home_buttons">


                <a href="<?=ROOT?>appointments"><button class="button_patient"> Appointments </button>
                <a href="<?=ROOT?>channeling"><button class="button_patient"> Channel a Doctor </button></a>

                <button class="button_patient"> Add products </button>
                </div>


            <?php elseif($data == "none"):?>

                <div class="home_buttons">
                    <div class="itembox2">
                        <div><p>Are You a Doctor? </p></div>
                        <div><a href="<?=ROOT?>doctor/registration"><button class="home_button" >Register as a Doctor</button></a></div>
                    </div>
                    <div class="itembox2">
                        <div><p>Are You a Patient? </p></div>
                        <div><a href="<?=ROOT?>patient/registration"> <button class = "home_button">Register as a patient</button></a></div>
                    </div>
                    <div class="itembox2">
                        <div><p>Are You a Seller? </p></div>
                        <div><a href="<?=ROOT?>seller/registration"><button class="home_button">Register as a Seller</button></a></div>
                    </div>
                </div>
            <?php endif;?>

            <?php endif;?>
            </div>
    </body>
</html>


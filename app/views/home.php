<!DOCTYPE html>
<html>
    <head>
        <title>
            Home   
        </title>
        <link rel="stylesheet" href="<?=ASSETS?>css/commonStyle.css">
        <link rel="stylesheet" href="<?=ASSETS?>css/homeStyle.css">

        <?php $this -> view ("header")?>
    </head>

    <body id="body">
     <main>
         <div class="page_content">

<!----------------------------------------------------------------------------------------------> 
             <section id="showcase">
                <div class="contentA">

                    <div class="inner_content">
                        <h1 class="h1">Ayurvedha Under One Roof</h1><br>
                        <p>Online Ayurvedic Platform where you can,</p>
                        
                        <ul>
                            <li>Consult Ayurvedic Doctors</li>
                            <li>Share Knowledge about Ayrvedic Doctors,Herbs and Products</li>
                            <li>Find Ayurvedic Products</li>
                            <li>Read articles about Medicinal Herbs</li>
                        </ul>
                        <?php if (!Auth::logged_in()) : ?>

                            <div class="inner_content_button">
                                <a href="<?=ROOT?>signup"><button class="button">Sign Up</button></a>
                                <a href="<?= ROOT ?>login"> <button class="button_typeA" >Log In </button></a>
                            </div>

                        <?php elseif (Auth::logged_in()) : ?>

                            <div class="inner_contentA">
                                <h2 class=welcome_h2> Hi <?=ucfirst( Auth::fname()) ?>,</h2> <p class="welcome">Hope you would have an amazing experience with us </p>
                            </div>

                        <?php endif;?>

                    </div>

                    <div class="inner_content_image">
                        <img class="landing_image" src="<?=ASSETS?>img/home.jpg">
                    </div>
                </div>
            </section>

<!----------------------------------------------------------------------------------------------> 
            <?php if (Auth::logged_in()) : ?>
            <section id="registration">
                <div class="contentB">
                <?php if(!empty($data)):?>
                    <?php if($data == "doctor"):?>
                    <div class="inner_content_card">
                        <h2 class="h2">Welcome Doctor</h2><br>
                        <p>Check your Appointments</p><br>
                        <a href="<?=ROOT?>appointments"><button class="button_typeB">Appointments</button></a>
                    </div>

                    <?php elseif($data == "patient"):?>
                    <div class="inner_content_card">
                        <h2 class="h2">Welcome Patient</h2><br>
                        <p>Channel a Doctor with us</p><br>
                        <a href="<?=ROOT?>channeling"><button class="button_typeB">Channeling</button></a>
                    </div>

                    <?php elseif($data == "seller"):?>
                    <div class="inner_content_card">
                        <h2 class="h2">Welcome Seller</h2><br>
                        <p>You can add Products from here</p><br>
                        <a href="<?= ROOT ?>seller/uploadProduct"><button class="button_typeB">Add Products</button></a>
                    </div>

                    <?php elseif($data == "doctorAndPatient"):?>
                    <div class="inner_content_card">
                        <h2 class="h2">Welcome Doctor</h2><br>
                        <p>Check your Appointments</p><br>
                        <a href="<?=ROOT?>appointments"><button class="button_typeB">Appointments</button></a>
                    </div>
                    <div class="inner_content_card">
                        <h2 class="h2">Welcome Patient</h2><br>
                        <p>Channel a Doctor with us</p><br>
                        <a href="<?=ROOT?>channeling"><button class="button_typeB">Channeling</button></a>
                    </div>


                    <?php elseif($data == "doctorAndSeller"):?>
                    <div class="inner_content_card">
                        <h2 class="h2">Welcome Doctor</h2><br>
                        <p>Check your Appointments</p><br>
                        <a href="<?=ROOT?>appointments"><button class="button_typeB">Appointments</button></a>
                    </div>
                    <div class="inner_content_card">
                        <h2 class="h2">Welcome Seller</h2><br>
                        <p>You can add Products from here</p><br>
                        <a href="<?= ROOT ?>seller/uploadProduct"><button class="button_typeB">Add Products</button></a>
                    </div>


                    <?php elseif($data == "sellerAndPatient"):?>
                    <div class="inner_content_card">
                        <h2 class="h2">Welcome Patient</h2><br>
                        <p>Channel a Doctor with us</p><br>
                        <a href="<?=ROOT?>channeling"><button class="button_typeB">Channeling</button></a>
                    </div>
                    <div class="inner_content_card">
                        <h2 class="h2">Welcome Seller</h2><br>
                        <p>You can add Products from here</p><br>
                        <a href="<?= ROOT ?>seller/uploadProduct"><button class="button_typeB">Add Products</button></a>
                    </div>

                    <?php elseif($data == "allUser"):?>
                    <div class="inner_content_card">
                        <h2 class="h2">Welcome Doctor</h2><br>
                        <p>Check your Appointments</p><br>
                        <a href="<?=ROOT?>appointments"><button class="button_typeB">Appointments</button></a>
                    </div>
                    <div class="inner_content_card">
                        <h2 class="h2">Welcome Patient</h2><br>
                        <p>Channel a Doctor with us</p><br>
                        <a href="<?=ROOT?>channeling"><button class="button_typeB">Channeling</button></a>
                    </div>
                    <div class="inner_content_card">
                        <h2 class="h2">Welcome Seller</h2><br>
                        <p>You can add Products from here</p><br>
                        <a href="<?= ROOT ?>seller/uploadProduct"><button class="button_typeB">Add Products</button></a>
                    </div>
                    
                    <?php elseif($data == "none"):?>
                    <div class="inner_content_card">
                        <h2 class="h2">Are you a Doctor ?</h2><br>
                        <p>Your Patients are here with us.</p><br>
                        <a href="<?=ROOT?>doctor/registration"><button class="button_typeB">Register as a Doctor</button></a>
                    </div>


                    <div class="inner_content_card">
                        <h2 class="h2">Are you a Patient ?</h2><br>
                        <p>Every doctor you see on the platform is highly qualified to provide the best care possible.</p><br>
                        <a href="<?=ROOT?>patient/registration"><button class="button_typeB">Register as a Patient</button></a>
                    </div>

                    <div class="inner_content_card">
                        <h2 class="h2">Are you a Seller ?</h2><br>
                        <p>Expand your customer base with us.</p><br>
                        <a href="<?=ROOT?>seller/registration"><button class="button_typeB">Register as a Seller</button></a>
                    </div>
                    <?php endif;?>
                    <?php endif;?>


                </div>
            </section>
            <?php endif; ?>

<!---------------------------------------------------------------------------------------------->
            <section id="articles">
                <div class="contentC">





                </div>
            </section>      

<!---------------------------------------------------------------------------------------------->
            <section id="aboutUs">
                <div class="contentD">

                    <h2>About Us</h2><br>
                    <p>We provide our service as an online platform to enhance the Sri Lankan Ayurvedic treatments among people.</p>
                
                </div>
            </section>

<!---------------------------------------------------------------------------------------------->
         </div>

     </main> 
    </body>
</html>
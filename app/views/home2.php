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
        <div class="bg_image1"></div>
            <div class="body_container">
                
                <hr class="h">
                <h1 class="h1_home">CEYLON NURTURE</h1>
                <h5 class="h5_home">Ayurvedha Under One Roof</h5>
                <hr class="h">
            </div>

         <?php if(!empty($data)):?>
            <?php if($data = "seller"):?>
                <div class="choice">
                    <div class="itembox1">
                        <button>Register as a Doctor</button>
                    </div>
                    <div class="itembox1">
                        <button>Register as a Patient</button>
                    </div>
                </div>
            <?php elseif($data = "doctor"):?>
                <div class="choice">
                    <div class="itembox1">
                        <button>Register as a Patient</button>
                    </div>
                    <div class="itembox1">
                        <button>Register as a Seller</button>
                    </div>
                </div>
            <?php elseif($data = "patient"):?>
                <div class="choice">
                    <div class="itembox1">
                        <button>Register as a Doctor</button>
                    </div>
                    <div class="itembox1">
                        <button>Register as a Seller</button>
                    </div>
                </div>
            <?php elseif($data = "doctorAndSeller"):?>
                <div class="choice">
                    <div class="itembox1">
                        <button>Register as a patient</button>
                    </div>
                </div>
            <?php elseif($data = "doctorAndPatient"):?>
                <div class="choice">
                    <div class="itembox1">
                        <button>Register as a Seller</button>
                    </div>
                </div>
            <?php elseif($data = "sellerAndPatient"):?>
                <div class="choice">
                <div class="itembox1">
                        <button>Register as a Doctor</button>
                    </div>
                </div>
            <?php else:?>
                <div class="choice">
                    <div class="itembox2">
                        <button>Register as a Doctor</button>
                    </div>
                    <div class="itembox2">
                        <button>Register as a patient</button>
                    </div>
                    <div class="itembox2">
                        <button>Register as a Seller</button>
                    </div>
                </div>
            <?php endif;?>

            <?php endif;?>

    </body>
</html>


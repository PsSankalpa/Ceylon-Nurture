<!DOCTYPE html>
<html>
    <head>
        <title>
            Landing
            <?php $this -> view ("header")?>
            <link rel="stylesheet" href="<?=ASSETS?>css/homeStyle.css">
        </title>

    </head>

    <body>
        
    <?php if($data == "patient"):?>
                <div class="choice">
                    <div class="itembox1">
                        <button>Register as a Doctor</button>
                    </div>
                    <div class="itembox1">
                        <button>Register as a Seller</button>
                    </div>
                </div>
    <?php endif;?>

        <div class="bg_image_container">
        <img class="bg_image" src="<?=ASSETS?>img/home.jpg">
        </div>

        <main>
            <div class="body_container">
                <hr class="h">
                <h1 class="h1_home">CEYLON NURTURE</h1>
                <h5 class="h5_home">Ayurvedha Under One Roof</h5>
                <hr class="h">

                <div class="home_buttons">
                <a href="<?=ROOT?>channeling"><button class="button_patient"> Channel a Doctor </button>
                </div>
            </div>
        </main>      
    </body>
</html>
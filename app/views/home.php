<!DOCTYPE html>
<html>
    <head>
        <title>
            <?php echo $data['page_title'] ?>
        </title>

        <link rel="stylesheet" href="<?=ASSETS?>css/homeStyle.css">

    </head>

    <body>
        <?php $this -> view ("header",$data)?>
        
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
                <a href="<?=ROOT?>signup"><button class="button"> Sign Up </button>
                <a href="<?=ROOT?>login"><button class="button"> Sign In </button>
                </div>
            </div>
        </main>



    </body>
</html>


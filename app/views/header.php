<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>
            <?php echo $data['page_title'] ?>
        </title>
        <link rel="stylesheet" href="<?ASSETS?>css/headerStyle.css">

        <!adding user logo!>
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

        <!adding google fonts in navbar!>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Source+Serif+Pro&display=swap" rel="stylesheet">

        <script type="text/javascript" src="<?ASSETS?>js/sellerJs.js"></script>
    </head>

    <body>
        <header>
        <nav class="top_nav">
            <div class="nav_item1">
                <img class="logo" src="logo.png">               
            </div>
            <div class="nav_item2">
                <a class="a_navitem2" href="<?=ROOT?>home">HOME</a>
                <div class="v"></div>
                <a class="a_navitem2" href="<?=ROOT?>about">ABOUT</a>
                <div class="v"></div>
                <a class="a_navitem2" href="<?=ROOT?>channeling">CHANNELING</a>
                <div class="v"></div>
                <a class="a_navitem2" href="<?=ROOT?>products">PRODUCTS</a>
                <div class="v"></div>
                <a class="a_navitem2" href="<?=ROOT?>articles">ARTICLES</a>
                <div class="v"></div>
                <a class="a_navitem2" href="<?=ROOT?>forums">FORUMS</a>
            </div>
            <div class="nav_item3">
                <i class="fas fa-user-circle fa-10x" id="login_logo"></i>
                <a class="a_navitem3" href="<?=ROOT?>login"> Log In</a>  
            </div>
        </nav>
        </header>
        
    </body>
</html>
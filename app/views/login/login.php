<!DOCTYPE html>
<html>
    <head>
        <title>Login Page</title>
        <link rel="icon" href="<?= ASSETS ?>img/logo.png" type="image/x-icon" />
        <link rel="stylesheet" href="<?=ASSETS?>css/loginStyle.css">
        <meta name="viewport" content="width=device-width; initial-scale=1.0;">

    </head>
    <body>
        <div class ="Login-form">
            <div class="container">
                <div class="main">
                   <div class="content">
                   <h2>Log In</h2>

                   <?php if(count($errors) > 0):?>
                    <div class="alertwarning">
                    <button class="closebtn" onclick="closebutton()">&times;</button>
                        <strong>Errors!</strong>
                        <?php foreach($errors as $error):?>
                          <br><?=$error?>
                        <?php endforeach;?>
                    </div>
                    <?php endif;?>

                   <form action="" method="post">

                        <input type="email" name="email" value="<?=get_var('email')?>" placeholder="Email-Address"> 
                        <input type="password" name="password" value="<?=get_var('password')?>" placeholder="Password">

                        <button class="btn" type="submit">Log In</button>

                    </form>
                    <p class="account"><a href="<?=ROOT?>password_reset">Forgot password?</a></p>    
                    </br>
                    <p class="account"><b>Don't have an account?</b> <a href="<?=ROOT?>signup">Sign Up</a></p>
                    </div>
                        <div class="form-img">
                        <button class="backbtn"><a href="<?=ROOT?>home">&times;</a></button>
                            <img src="<?=ASSETS?>img/8.png">
                        </div>
                </div>
            </div>
        </div>
     <script type="text/javascript" src="<?=ASSETS?>js/sellerJs"></script>  
    </body>
</html>
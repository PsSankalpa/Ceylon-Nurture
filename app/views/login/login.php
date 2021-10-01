<!DOCTYPE html>
<html>
    <head>
        <title>
        Ceylon Nurture|Login Page</title>

        <link rel="stylesheet" href="<?=ASSETS?>css/loginStyle.css">

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
                        <input type="email" name="email" placeholder="Email-Address" required > 
                        <input type="password" name="password" placeholder="Password" required > 
                        <button class="btn" type="submit">Log In</button>
                    </form>
                    <p class="account"><a href="<?=ROOT?>forgotPassword">Forgot password?</a></p>    
                    </br>
                    <p class="account">Don't have an account? <a href="<?=ROOT?>signup">Sign Up</a></p>
                    </div>
                        <div class="form-img">
                        <button class="backbtn"><a href="<?=ROOT?>home">&times;</button>
                            <img src="<?=ASSETS?>img/logo.png">
                        </div>
                </div>
            </div>
        </div>
     <script type="text/javascript" src="<?=ASSETS?>js/sellerJs"></script>  
    </body>
</html>
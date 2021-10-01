<!DOCTYPE html>
<html>
    <head>
        <title>Ceylon Nurture|SignUp Page</title>
        
        <link rel="stylesheet" href="<?=ASSETS?>css/signupStyle.css">
    </head>
    
   <!-- <?php
    print_r($errors)
    ?>-->

    <body>
        <div class ="Signup-form">
            <div class="container">
                <div class="main">
                    <div class="content">
                    <h2>Sign Up</h2>
                    <?php if(count($errors) > 0):?>
                    <div class="alertwarning">
                    <button class="closebtn" onclick="closebutton()">&times;</button>
                        <strong>Errors!</strong>
                        <?php foreach($errors as $error):?>
                          <br><?=$error?>
                        <?php endforeach;?>
                    </div>
                    <?php endif;?>

                    <form method="post">
                    <input  type="text" value="<?=get_var('fname')?>" name="fname" placeholder="First Name"  > 
                    <input  type="text" value="<?=get_var('lname')?>" name="lname" placeholder="Last Name" > 
                    <input  type="text" value="<?=get_var('username')?>" name="username" placeholder="User Name"  > 
                    <input  type="email" value="<?=get_var('email')?>" name="email" placeholder="E-mail address"  >
                    <input  type="tel" value="<?=get_var('tpNumber')?>" name="tpNumber" placeholder="Telephone Number" > 
                    <input type="password" value="<?=get_var('password')?>" name="password" placeholder="Password"  > 
                    <input type="password" value="<?=get_var('password2')?>" name="password2" placeholder="Re-type Password"  > 
                  <!--  <button class="backbtn"><a href="<?=ROOT?>home">&times;</button>-->
                    <button class="btn">Submit</button>
                </form>
                    </div>
                </div>
            </div>
        </div> 
        <script type="text/javascript" src="<?=ASSETS?>js/sellerJs"></script>        
    </body>
</html>
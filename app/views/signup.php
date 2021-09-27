<!DOCTYPE html>
<html>
    <head>
        <title>
            SignUp Page
        </title>
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
                    <input  type="tel" value="<?=get_var('tpNumber')?>" name="tpNumber" placeholder="Telephone Number" pattern="[0-9]{10}" > 
                    <input type="password" value="<?=get_var('password')?>" name="password" placeholder="Password"  > 
                    <input type="password" value="<?=get_var('password2')?>" name="password2" placeholder="Re-type Password"  > 
                    <input type="checkbox" class="checkbox" name="conditions">I agree to <a href='#'>Terms of conditions and privacy policy</a>
                        <button class="btn">Submit</button>
                    <!--<button class="btn" type="submit"><a href="<?=ROOT?>login">Sign Up </button>-->
                        <!--<a href="<?=ROOT?>login"><button class="">Sign Up</button></a>-->
                    </form>
                    </div>
                </div>
            </div>
        </div> 
        <script type="text/javascript" src="<?=ASSETS?>js/sellerJs"></script>        
    </body>
</html>
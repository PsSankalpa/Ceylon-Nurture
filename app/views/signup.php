<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>
            <?php echo $data['page_title'] ?>
        </title>
        <?php $this->view("header",$data)?>
        <link rel="stylesheet" href="<?=ASSETS?>css/signupStyle.css">

    </head>
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

                    <form action="" method="post">
                    <input  type="text" value="<?=get_var('fname')?>" name="fname" placeholder="First Name" required > </br>
                    <input  type="text" value="<?=get_var('lname')?>" name="lname" placeholder="Last Name" required > </br>
                    <input  type="text" value="<?=get_var('username')?>" name="username" placeholder="User Name" required > </br>
                    <input  type="email" value="<?=get_var('email')?>" name="email" placeholder="E-mail address" required >
                    <input  type="tel" value="<?=get_var('tpNumber')?>" name="tpNumber" placeholder="Telephone Number" pattern="[0-9]{10}" required> 
                    <input type="password" value="<?=get_var('password')?>" name="password" placeholder="Password" required > 
                    <input type="password" value="<?=get_var('password2')?>" name="password2" placeholder="Re-type Password" required > 
                    <input type="checkbox" name="conditions">I agree to <a href='#'>Terms of conditions and privacy policy</a></form>
                        <button class="btn" type="submit"><a href="<?=ROOT?>login">Sign Up </button>
                    </form>
                    </div>
                </div>
            </div>
        </div>         
        <?php $this->view("footer",$data)?>
    </body>
</html>